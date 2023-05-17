                        <div class="modal fade" id="dateRangeModal" tabindex="-1" role="dialog" aria-labelledby="dateRangeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dateRangeModalLabel">Select Date Range</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('dashboard/export/order')?>" method="post">
                                        <div class="modal-body">
                                            <!-- Date range selection inputs -->
                                            <div class="form-group">
                                                <label for="startDate">Start Date</label>
                                                <input type="date" class="form-control" id="startDate" name="startDate">
                                            </div>
                                            <div class="form-group">
                                                <label for="endDate">End Date</label>
                                                <input type="date" class="form-control" id="endDate" name="endDate">
                                            </div>
                                            <div class="form-group">
                                            <label for="inputName">Status Tracking</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Semua</option>
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Export</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>