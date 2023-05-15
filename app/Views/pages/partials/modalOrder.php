                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Update Order</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form">
                                        <div class="form-group">
                                            <label for="inputName">Tanggal Selesai</label>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="masukkan nama">
                                            <input hidden type="text" id="id" name="id">
                                        </div>
                                        <div id="username-input" class="form-group">
                                            <label for="inputName">Harga</label>
                                            <input type="number" class="form-control" id="harga" name="harga" placeholder="20000">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Status Tracking</label>
                                            <select class="form-control" id="status_track" name="status_track">
                                                <option value="pending">Pending</option>
                                                <option value="dibatalkan">Dibatalkan</option>
                                                <option value="diterima">Diterima</option>
                                                <option value="sudah_sampai">Sudah Sampai</option>
                                                <option value="diproses">Diproses</option>
                                                <option value="sudah_jadi">Sudah Jadi</option>
                                                <option value="belum_lunas">Belum Lunas</option>
                                                <option value="lunas">Lunas</option>
                                                <option value="dikirim">Dikirim</option>
                                                <option value="selesai">Selesai</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button onclick="saveDataOrder()" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>