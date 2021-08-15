<div class="card">
    <div class="card-header">
        <h5 class="text-center">Kelola Data Tim</h5>
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

        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">

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