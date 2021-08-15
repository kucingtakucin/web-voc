<div class="card">
    <div class="card-header">
        <h5 class="text-center">Kelola Data Peserta</h5>
        <p class="text-muted text-center mb-0"><?= sistem()->nama ?></p>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="filter_lomba">Lomba</label>
                    <select id="filter_lomba" name="filter_lomba" class="js-select2 form-control">
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group row">
                    <label for="filter_tim">Tim</label>
                    <select id="filter_tim" name="filter_tim" class="js-select2 form-control">
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="filter_status" id="status_semua" value="all" checked>
                        <label class="form-check-label" for="status_semua">
                            Semua
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="filter_status" id="status_ketua" value="ketua">
                        <label class="form-check-label" for="status_ketua">
                            Ketua
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="filter_status" id="status_solo" value="solo">
                        <label class="form-check-label" for="status_solo">
                            Solo Player
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="button" class="btn btn-success btn-pill float-right" id="tombol_export"><i class="fa fa-file-excel-o"></i> Export Data</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table_data" class="table table-striped table-hover">
                        <thead>
                        </thead>
                        <tbody id="table_body"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END Page Content -->