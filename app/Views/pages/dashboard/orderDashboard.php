<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                                <button class="btn btn-success" data-toggle="modal" data-target="#dateRangeModal">Export to Excel</button>
                            </div>
                        </div>
                        <?= $this->include('pages/partials/modalRangeDate') ?>
                        <?= $this->include('pages/partials/modalOrder') ?>
                        <?= $this->include('pages/partials/modalDetail') ?>
                        <div class="card-body">
                            <div>
                                <ul class="nav nav-tabs mt-4" id="orderTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending & Dibatalkan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="processed-tab" data-toggle="tab" href="#processed" role="tab" aria-controls="processed" aria-selected="false">Diterima, Sudah Sampai, Diproses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ready-tab" data-toggle="tab" href="#ready" role="tab" aria-controls="ready" aria-selected="false">Sudah Jadi, Belum Lunas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Lunas, Dikirim, Selesai</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-4" id="orderTabContent">
                                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="pendingTable" width="100%" cellspacing="0">
                                                <?= $this->include('pages/partials/tablePending') ?>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="processed" role="tabpanel" aria-labelledby="processed-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="processedTable" width="100%" cellspacing="0">
                                                <?= $this->include('pages/partials/tableProcessed') ?>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="ready" role="tabpanel" aria-labelledby="ready-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="readyTable" width="100%" cellspacing="0">
                                                <?= $this->include('pages/partials/tableReady') ?>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="completedTable" width="100%" cellspacing="0">
                                                <?= $this->include('pages/partials/tableComplete') ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?= $this->endSection() ?>