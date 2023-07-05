<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollectionModel;
use App\Models\OrderModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrderController extends BaseController
{
    //for admin only
    public function index()
    {
        helper('number');
        $model = new OrderModel();

        //if method not POST then displaying pages
        if ($this->request->getMethod(true) !== 'POST') {
            $dataToUpdate = ['status_track' => 'pending'];
            $model->where('status_track', 'new')->set($dataToUpdate)->update();

            $newOrderCount = $model->where('status_track', 'new')->countAllResults();
            $hasNewData = ($newOrderCount > 0);

            $statusPending = ['pending', 'dibatalkan'];
            $statusReady = ['sudah_jadi', 'belum_lunas'];
            $statusProcessed = ['diterima', 'sudah_sampai', 'diproses'];
            $statusComplete = ['lunas', 'dikirim', 'selesai'];
            $data = [
                'hasNewData' => $hasNewData,
                'content' => $model->relationOrderAndUser(),
                'contentPending' => $model->relationOrderAndUserByField($statusPending),
                'contentReady' => $model->relationOrderAndUserByField($statusReady),
                'contentProcessed' => $model->relationOrderAndUserByField($statusProcessed),
                'contentComplete' => $model->relationOrderAndUserByField($statusComplete),
                'title' => 'Data Orders'
            ];
            //dd($data['contentPending']);
            //returning view from Folder Views/pages/dashboard
            return view('pages/dashboard/orderDashboard', $data);
        }
    }

    public function update($id = null)
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            //returning json response for ajax updating
            return $this->response->setJSON($model->find($id));
        }

        $currentDate = date('Y-m-d');
        $nextDay = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        $data = [
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'harga' => $this->request->getVar('harga'),
            'status_track' => $this->request->getVar('status_track'),
            'updated_at' => $nextDay
        ];

        if (!$model->update($id, $data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal melakukan update',
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil melakukan update',
        ]);
    }

    public function delete($id = null)
    {
        $model = new OrderModel();
        $model->where('id', $id)->delete($id);
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil melakukan delete'
        ]);
    }

    private function read_file($file_path) {
        $file_contents = file_get_contents($file_path);
        return $file_contents;
    }

    public function myOrder() 
    {
        helper('number');
        $model = new OrderModel();
        $json_file_path = WRITEPATH . 'data-toko.json';
        $json_data = $this->read_file($json_file_path);
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'content' => $model->where('id_user', session()->get('id'))->findAll(),
                'toko' => json_decode($json_data, true),
            ];
            return view('pages/home/order', $data);
        }

        $currentDate = date('Y-m-d');
        $nextDay = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        $id = $this->request->getVar('id[]');

        if (!$id) {
            return redirect()->to('customer/order')->with('error', 'pilih salah satu item untuk di checkout');
        }

        $data = array();
        $kode = $this->generate_code();
        for ($i = 0; $i < count($id); $i++) {
            $data[] = array(
                'id' => $id[$i],
                'kode_pembayaran' => $kode,
                'updated_at' => $nextDay
            );
        }
        $model->updateBatch($data, 'id');
        $dts = [
            'kode_pembayaran' => $kode,
            'toko' => json_decode($json_data, true),
        ];
        return view('pages/partials/successCheckout', $dts);
    }

    function generate_code() {
        $length = 10;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)]; 
        }
        return $random_string;
    }

    public function tanpaDesain()
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderTanpaDesain');
        }

        $model = new OrderModel();
        $fotoPola = $this->request->getFile('pola_desain');
        $fotoKain = $this->request->getFile('foto_kain');

        $currentDate = date('Y-m-d');
        $nextDay = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        if ($fotoKain->isValid() && !$fotoKain->hasMoved() && $fotoPola->isValid() && !$fotoPola->hasMoved()) {
            $fotoPolaNew = $fotoPola->getRandomName();
            $fotoKainNew = $fotoKain->getRandomName();
            $fotoPola->move('./uploads/foto/pola/', $fotoPolaNew);
            $fotoKain->move('./uploads/foto/kain/', $fotoKainNew);

            $data = [
                'pesanan' => 'tanpa_desain',
                'status_track' => 'new',
                'id_user' => session()->get('id'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'kategori' => $this->request->getVar('kategori'),
                'ukuran' => $this->request->getVar('ukuran'),
                'catatan' => $this->request->getVar('catatan'),
                'jumlah' => $this->request->getVar('jumlah'),
                'foto_kain' => $fotoKainNew,
                'pola_desain' => $fotoPolaNew,
                'created_at' => $nextDay,
                'updated_at' => $nextDay
            ];

            $model->insert($data);
            return redirect()->to('customer/tanpa-desain')->with('success', 'Berhasil melakukan order');
        }
    }    

    public function denganDesain()
    {
        $model = new OrderModel();
        $modelCollection = new CollectionModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'items' => $modelCollection->where('kategori', 'clothing')->findAll(),
            ];
            return view('pages/home/orderDenganDesain',$data);
        }

        $currentDate = date('Y-m-d');
        $nextDay = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        $fotoKain = $this->request->getFile('foto_kain');

        if ($fotoKain->isValid() && !$fotoKain->hasMoved()) {
            $fotoKainNew = $fotoKain->getRandomName();
            $fotoKain->move('./uploads/foto/kain/', $fotoKainNew);

            $data = [
                'pesanan' => 'dengan_desain',
                'status_track' => 'new',
                'id_user' => session()->get('id'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'kategori' => $this->request->getVar('kategori'),
                'ukuran' => $this->request->getVar('ukuran'),
                'catatan' => $this->request->getVar('catatan'),
                'jumlah' => $this->request->getVar('jumlah'),
                'foto_kain' => $fotoKainNew,
                'pola_desain' => $this->request->getVar('pola_desain'),
                'created_at' => $nextDay,
                'updated_at' => $nextDay
            ];

            $model->insert($data);
            return redirect()->to('customer/dengan-desain')->with('success', 'Berhasil melakukan order');
        }
    }

    public function perbaikan()
    {
        $model = new OrderModel();
        $modelCollection = new CollectionModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'items' => $modelCollection->where('kategori', 'perbaikan')->findAll(),
            ];
            return view('pages/home/orderPerbaikan', $data);
        }

        $currentDate = date('Y-m-d');
        $nextDay = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        $fotoKain = $this->request->getFile('foto_kain');

        if ($fotoKain->isValid() && !$fotoKain->hasMoved()) {
            $fotoKainNew = $fotoKain->getRandomName();
            $fotoKain->move('./uploads/foto/kain/', $fotoKainNew);

            $data = [
                'pesanan' => 'perbaikan',
                'status_track' => 'pending',
                'id_user' => session()->get('id'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'kategori' => $this->request->getVar('kategori'),
                'ukuran' => NULL,
                'catatan' => $this->request->getVar('catatan'),
                'jumlah' => $this->request->getVar('jumlah'),
                'foto_kain' => $fotoKainNew,
                'pola_desain' => NULL,
                'created_at' => $nextDay,
                'updated_at' => $nextDay
            ];

            $model->insert($data);
            return redirect()->to('customer/perbaikan')->with('success', 'Berhasil melakukan order');
        }
    }

    public function export()
    {
        $model = new OrderModel();
        $startDate = $this->request->getVar('startDate');
        $endDate = $this->request->getVar('endDate');
        $status = $this->request->getVar('status');

        $data = $model->RangeDate($startDate, $endDate, $status);
 
        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()->getStyle('D')->getNumberFormat()
                    ->setFormatCode('#,##0.00');
        $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
        $spreadsheet->getActiveSheet()->getStyle('A1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B')->getNumberFormat()
                    ->setFormatCode('0000000000000000');
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Laporan Order')
                    ->setCellValue('A2', 'Nama Customer')
                    ->setCellValue('B2', 'Jenis Kelamin')
                    ->setCellValue('C2', 'Jenis Pesanan')
                    ->setCellValue('D2', 'Kategori')
                    ->setCellValue('E2', 'Ukuran')
                    ->setCellValue('F2', 'Jumlah')
                    ->setCellValue('G2', 'Tanggal Selesai')
                    ->setCellValue('H2', 'Nomor HP')
                    ->setCellValue('I2', 'Alamat')
                    ->setCellValue('J2', 'Catatan')
                    ->setCellValue('K2', 'Kode Pembayaran')
                    ->setCellValue('L2', 'Harga')
                    ->setCellValue('M2', 'Waktu Transaksi');
        $column = 3;
        
        foreach ($data as $data) {        
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data->name)
                ->setCellValue('B' . $column, $data->jenis_kelamin)
                ->setCellValue('C' . $column, $data->pesanan)
                ->setCellValue('D' . $column, $data->kategori)
                ->setCellValue('E' . $column, $data->ukuran)
                ->setCellValue('F' . $column, $data->jumlah)
                ->setCellValue('G' . $column, $data->tanggal_selesai)
                ->setCellValue('H' . $column, $data->nomor_hp)
                ->setCellValue('I' . $column, $data->alamat)
                ->setCellValue('J' . $column, $data->catatan)
                ->setCellValue('K' . $column, $data->kode_pembayaran)
                ->setCellValue('L' . $column, $data->harga)
                ->setCellValue('M' . $column, $data->created_at);
        
            $column++;
        }
        
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Order '.$startDate.' - '.$endDate. ' ('.$status.')';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
