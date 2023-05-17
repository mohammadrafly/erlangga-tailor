<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'order';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'pesanan',
        'foto_kain',
        'pola_desain',
        'kategori',
        'jumlah',
        'jenis_kelamin',
        'ukuran',
        'catatan',
        'tanggal_selesai',
        'kode_pembayaran',
        'harga',
        'status_track',
        'updated_at',
        'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function relationOrderAndUser()
    {
        return $this->db->table('order')
                        ->select('
                            order.*,
                            users.alamat as alamat,
                            users.name as name,
                            users.nomor_hp as nomor_hp,
                        ')
                        ->join('users', 'order.id_user = users.id')
                        ->get()->getResultArray();
    }

    public function RangeDate($start, $end, $status = '')
    {
        $query = $this->db->table('order')
                        ->select('
                            order.*,
                            users.alamat as alamat,
                            users.name as name,
                            users.nomor_hp as nomor_hp,
                        ')
                        ->join('users', 'order.id_user = users.id')
                        ->where('order.created_at BETWEEN "'. date('Y-m-d', strtotime($start)). '" AND "'. date('Y-m-d', strtotime($end)).'"');
    
        if ($status !== '') {
            $query->where('status_track', $status);
        }
    
        $query->orderBy('order.created_at', 'DESC');
        
        $result = $query->get()->getResult();
        return $result;
    }  
}