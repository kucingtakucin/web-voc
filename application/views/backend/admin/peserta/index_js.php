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
                targets: [0, 1, 2, 3, 4, 5, 6], // Sesuaikan dengan jumlah kolom
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
            title: 'Nama Lengkap',
            name: 'nama',
            data: 'nama',
        }, {
            title: 'Email',
            name: 'email',
            data: 'email',
        }, {
            title: 'Tim',
            name: 'nama_tim',
            data: 'nama_tim',
        }, {
            title: 'Lomba',
            name: 'nama_lomba',
            data: 'nama_lomba',
        }, {
            title: 'Status',
            name: 'is_ketua',
            data: 'is_ketua',
            render: (is_ketua) => {
                return is_ketua ? (is_ketua == '1' ? 'Ketua' : 'Anggota') : 'Solo Player'
            }
        }, {
            title: 'Aksi',
            name: 'id',
            data: 'id',
            render: (id) => {
                let tombol_detail = $('<button>', {
                    type: 'button',
                    class: 'btn btn-info tombol_detail',
                    'data-id': id,
                    html: $('<i>', {
                        class: 'fa fa-eye'
                    }).prop('outerHTML'),
                    title: 'Detail Data'
                })

                return $('<div>', {
                    role: 'group',
                    class: 'btn-group btn-group-sm',
                    html: [tombol_detail]
                }).prop('outerHTML')
            }
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

    $('.summernote').summernote()

    bsCustomFileInput.init()
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

    $('#filter_tim').select2({
        placeholder: 'Pilih Tim',
        width: '100%',
        ajax: {
            url: BASE_URL + 'get_tim',
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
                        'text': item.nama
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
                id_tim: event.params.data.id
            }).toString()
        )).draw();
    })

    $('#status_semua').change(function() {
        datatable.ajax.url(BASE_URL + 'data?' + (
            new URLSearchParams({
                status: $(this).val()
            }).toString()
        )).draw();
    })
    $('#status_ketua').change(function() {
        datatable.ajax.url(BASE_URL + 'data?' + (
            new URLSearchParams({
                status: $(this).val()
            }).toString()
        )).draw();
    })

    $('#status_solo').change(function() {
        datatable.ajax.url(BASE_URL + 'data?' + (
            new URLSearchParams({
                status: $(this).val()
            }).toString()
        )).draw();
    })

    // ================================================== //

    /**
     * Keperluan CRUD
     */
    // ================================================== //
    get_data = (form) => {
        let formData = new FormData();
        formData.append('id', $(form).data('id'));

        fetch(BASE_URL + 'get_where', {
            method: 'POST',
            body: formData,
        }).then(response => {
            if (response.ok) return response.json()
            throw new Error(response.statusText)
        }).then(response => {
            let row = response.data;
            id_data = row.id;
            $('#modal_detail').modal('show');
            $('#form_detail input[name=nama_lengkap]').val(row.nama);
            $('#form_detail input[name=email]').val(row.email);
            $('#form_detail input[name=no_hp]').val(row.angkatan);
            $('#form_detail input[name=status]').val(row.is_ketua ? (row.is_ketua == '1' ? 'Ketua' : 'Anggota') : 'Solo Player');
            $('#form_detail input[name=no_hp]').val(row.no_hp);
            $('#form_detail input[name=id_tim]').val(row.nama_tim);
            $('#form_detail input[name=id_lomba]').val(row.nama_lomba);

            if (row.id_pubg) {
                $('.wadah_pubg').fadeIn(750)
                $('.wadah_ml').fadeOut(750)
                $('#id_pubg').val(row.id_pubg)
            } else if (row.id_ml) {
                $('.wadah_ml').fadeIn(750)
                $('.wadah_pubg').fadeOut(750)
                $('#id_ml').val(row.id_ml)
            } else {
                $('.wadah_pubg').fadeOut(750)
                $('.wadah_ml').fadeOut(750)
                $('#id_pubg').val(null)
                $('#id_ml').val(null)
            }

            $('#download_scan_kartu').prop('href', "<?= base_url('uploads/peserta/') ?>" + row.scan_kartu)
            if (row.is_ketua && row.is_ketua == '1' || !row.is_ketua) {
                $('#download_bukti_transfer').addClass('btn-primary')
                $('#download_bukti_transfer').removeClass('btn-secondary')
                $('#download_bukti_transfer').prop('disabled', false)

                $('#download_karya').addClass('btn-primary')
                $('#download_karya').removeClass('btn-secondary')
                $('#download_karya').prop('disabled', false)

                $('#download_bukti_transfer').prop('href', "<?= base_url('uploads/peserta/') ?>" + row.bukti_transfer)

                if (row.id_lomba == '1' || row.id_lomba == '2') {
                    $('#download_karya').removeClass('btn-primary')
                    $('#download_karya').addClass('btn-secondary')
                    $('#download_karya').prop('disabled', true)
                } else {
                    $('#download_karya').prop('href', "<?= base_url('uploads/peserta/') ?>" + row.unggah_karya);
                }
            } else {
                $('#download_bukti_transfer').removeClass('btn-primary')
                $('#download_bukti_transfer').addClass('btn-secondary')
                $('#download_bukti_transfer').prop('disabled', true)

                $('#download_karya').removeClass('btn-primary')
                $('#download_karya').addClass('btn-secondary')
                $('#download_karya').prop('disabled', true)
            }
        }).catch(error => {
            console.error(error)
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                showConfirmButton: false,
                timer: 1500
            })
        })
    }

    // ================================================== //

    /**
     * Keperluan event click tombol dan submit form
     */
    // ================================================== //
    $('#table_data').on('click', '.tombol_detail', function(event) {
        event.preventDefault()
        get_data(this);
    });

    $('#tombol_export').click(function() {
        location.replace(BASE_URL + 'export_excel')
    })

    // ================================================== //

    /**
     * Keperluan input select2 didalam form
     */
    // ================================================== //
    // ... //

    // ================================================== //
</script>