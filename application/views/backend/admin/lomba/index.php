<div class="card">
    <div class="card-header">
        <h5 class="text-center">Kelola Referensi Lomba</h5>
        <p class="text-muted text-center mb-0"><?= sistem()->nama ?></p>
    </div>


</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-pill float-right" id="tombol_tambah"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="table_data" class="table table-striped table-hover">
                    <thead>
                    </thead>
                    <tbody id="table_body"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- END Page Content -->