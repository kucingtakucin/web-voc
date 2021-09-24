<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="needs-validation" id="form_detail" method="post" enctype="multipart/form-data" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">No WhatsApp</label>
                                <input type="number" id="no_hp" class="form-control" name="no_hp" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" class="form-control" name="status" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_lomba">Lomba</label>
                                <input type="text" id="id_lomba" class="form-control" name="id_lomba" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_tim">Tim</label>
                                <input type="text" id="id_tim" class="form-control" name="id_tim" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="asal_instansi">Asal Instansi</label>
                                <input type="text" id="asal_instansi" class="form-control" name="asal_instansi" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row wadah_pubg" style="display: none;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-12" for="id_pubg">ID PUBG</label>
                                <input type="text" id="id_pubg" class="form-control" name="id_pubg" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row wadah_ml" style="display: none;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-12" for="id_ml">ID ML</label>
                                <input type="text" id="id_ml" class="form-control" name="id_ml" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">Scan Kartu</div>
                                <a href="#" target="_blank" id="download_scan_kartu" class="btn btn-primary">
                                    <i class="fa fa-download"></i>
                                    Unduh dokumen
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">Bukti Transfer</div>
                                <a href="#" target="_blank" id="download_bukti_transfer" class="btn btn-primary">
                                    <i class="fa fa-download"></i>
                                    Unduh dokumen
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">Karya / Berkas Pendaftaran</div>
                                <a href="#" target="_blank" id="download_karya" class="btn btn-primary">
                                    <i class="fa fa-download"></i>
                                    Unduh dokumen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" data-original-title="" title="">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Pop In Modal -->