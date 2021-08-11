<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="needs-validation" id="form_ubah" method="post" enctype="multipart/form-data" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title">Form Ubah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_lomba">Nama Lomba</label>
                                <input type="text" id="nama_lomba" class="form-control" name="nama_lomba" required autocomplete="off" placeholder="Masukkan Nama Lomba">
                                <div class="invalid-feedback text-danger">Please choose a unique and valid nama_lomba</div>
                                <div class="valid-feedback text-success">Looks good</div>
                            </div>
                        </div>
                    </div>
                    <div class="row anggota_maksimal" style="display: none;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_lomba">Anggota Maksimal</label>
                                <input type="text" id="anggota_maksimal" class="form-control" name="maks_anggota" autocomplete="off" placeholder="Masukkan Anggota Maksimal">
                                <div class="invalid-feedback text-danger">Please choose a unique and valid anggota maksimal</div>
                                <div class="valid-feedback text-success">Looks good</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="opening">Opening</label>
                                <input type="text" id="opening" class="form-control datepicker" name="opening" required onkeydown="return false" autocomplete="off">
                                <div class="invalid-feedback text-danger">Please choose a unique and valid opening</div>
                                <div class="valid-feedback text-success">Looks good</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="closing">Closing</label>
                                <input type="text" id="closing" class="form-control datepicker" name="closing" required onkeydown="return false" autocomplete="off">
                                <div class="invalid-feedback text-danger">Please choose a unique and valid closing</div>
                                <div class="valid-feedback text-success">Looks good</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select_kategori">Kategori</label>
                                <select name="kategori" id="select_kategori" class="form-control select_kategori" required>
                                    <option></option>
                                    <option value="0">Individu</option>
                                    <option value="1">Kelompok</option>
                                </select>
                                <div class="invalid-feedback text-danger">Please choose a unique and valid kategori</div>
                                <div class="valid-feedback text-success">Looks good</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                        <div class="valid-tooltip">Looks good</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="summernote form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="old_gambar" id="old_gambar">
                    <input type="hidden" name="old_gambar_thumb" id="old_gambar_thumb">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" data-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="submit" data-original-title="" title="">Submit Data</button>
                    <button class="btn btn-primary loader" type="button" disabled style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Pop In Modal -->