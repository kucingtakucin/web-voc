<script>
    const BASE_URL = "<?= base_url($uri_segment) ?>"
    let datatable, id_data, get_data,
        tambah_data, ubah_data, hapus_data;

    /**
     * Keperluan DataTable, Datepicker, Summernote dan BsCustomFileInput
     */
    // ================================================== //
    datatable = $('#table_data').DataTable({
        serverSide: true,
        processing: true,
        ordering: true,
        destroy: true,
        autoWidth: false,
        ajax: {
            url: BASE_URL + 'data',
            type: 'GET',
            dataType: 'JSON',
            data: {}
        },
        columnDefs: [{
                targets: [0, 1, 2, 3], // Sesuaikan dengan jumlah kolom
                className: 'text-center'
            },
            {
                searchable: false,
                orderable: false,
                targets: 0
            }
        ],
        order: [
            [1, 'desc']
        ],
        columns: [{
            title: '#',
            name: '#',
            data: null,
            defaultContent: ''
        }, {
            title: 'Nama Tim',
            name: 'nama',
            data: 'nama',
        }, {
            title: 'Asal Instansi',
            name: 'asal_instansi',
            data: 'asal_instansi',
        }, {
            title: 'Lomba',
            name: 'nama_lomba',
            data: 'nama_lomba',
        }],
    })

    datatable.on('draw.dt', function() {
        let PageInfo = datatable.page.info();
        datatable.column(0, {
            page: 'current'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        clearBtn: true,
        todayBtn: true,
    }).change(function(event) {
        $(this).datepicker('hide')
    })
    // ================================================== //

    /**
     * Keperluan filter menggunakan select2
     */
    // ================================================== //
    $('#filter_lomba').select2({
        placeholder: 'Pilih Lomba',
        width: '100%',
        ajax: {
            url: BASE_URL + 'get_lomba',
            dataType: 'JSON',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term, // search term
                };
            },
            processResults: function(response) {
                let myResults = [];
                response.data.map(item => {
                    myResults.push({
                        'id': item.id,
                        'text': item.nama_lomba
                    });
                })
                return {
                    results: myResults
                };
            }
        }
    }).on('select2:select', function(event) {
        datatable.ajax.url(BASE_URL + 'data?' + (
            new URLSearchParams({
                id_lomba: event.params.data.id
            }).toString()
        )).draw();
    })

    // ================================================== //

    /**
     * Keperluan CRUD
     */
    // ================================================== //
    // ... //
    // ================================================== //

    /**
     * Keperluan event click tombol dan submit form
     */
    // ================================================== //
    // ... //

    // ================================================== //

    /**
     * Keperluan input select2 didalam form
     */
    // ================================================== //
    // ... //
    // ================================================== //
</script>