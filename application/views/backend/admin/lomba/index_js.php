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
                targets: [0, 1, 2, 3, 4, 5, 6, 7], // Sesuaikan dengan jumlah kolom
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
            },
            {
                title: 'Gambar',
                name: 'gambar_thumb',
                data: 'gambar_thumb',
                render: (gambar_thumb) => {
                    return $('<img>', {
                        src: `<?= BASE_URL() ?>uploads/lomba/${gambar_thumb}`,
                        class: "img-thumbnail rounded-lg",
                        alt: 'gambar'
                    }).prop('outerHTML')
                }
            }, {
                title: 'Nama Lomba',
                name: 'nama_lomba',
                data: 'nama_lomba',
            }, {
                title: 'Deskripsi',
                name: 'deskripsi',
                data: 'deskripsi',
            }, {
                title: 'Opening',
                name: 'opening',
                data: 'opening',
            }, {
                title: 'Closing',
                name: 'closing',
                data: 'closing',
            }, {
                title: 'Max',
                name: 'maks_anggota',
                data: 'maks_anggota',
                render: (maks_anggota) => {
                    return maks_anggota ? maks_anggota + ' Orang' : '-'
                }
            }, {
                title: 'Kategori',
                name: 'kategori',
                data: 'kategori',
                render: (kategori) => {
                    return kategori == '1' ? 'Kelompok' : 'Individu'
                }
            }, {
                title: 'Aksi',
                name: 'id',
                data: 'id',
                render: (id) => {
                    let tombol_ubah = $('<button>', {
                        type: 'button',
                        class: 'btn btn-success tombol_ubah',
                        'data-id': id,
                        html: $('<i>', {
                            class: 'fa fa-edit'
                        }).prop('outerHTML'),
                        title: 'Ubah Data'
                    })

                    let tombol_hapus = $('<button>', {
                        type: 'button',
                        class: 'btn btn-danger tombol_hapus',
                        'data-id': id,
                        html: $('<i>', {
                            class: 'fa fa-trash'
                        }).prop('outerHTML'),
                        title: 'Hapus Data'
                    })

                    return $('<div>', {
                        role: 'group',
                        class: 'btn-group btn-group-sm',
                        html: [tombol_ubah, tombol_hapus]
                    }).prop('outerHTML')
                }
            }
        ],
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
    // ... //

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
            $('#modal_ubah').modal('show');
            $('#form_ubah input[name=nama_lomba]').val(row.nama_lomba);
            $('#form_ubah textarea[name=deskripsi]').summernote('code', row.deskripsi);
            $('#form_ubah input[name=opening]').val(row.opening);
            $('#form_ubah input[name=closing]').val(row.closing);
            $('#form_ubah input[name=kategori]').val(row.kategori);
            $('#form_ubah input[name=maks_anggota]').val(row.maks_anggota);

            let kategori = row.kategori == '1' ? 'Kelompok' : 'Individu'
            $('#form_ubah .select_kategori').val(row.kategori)
                .change()
                .trigger('select2:select')
            // .append(new Option(kategori, row.kategori, true, true))
            // .trigger('change')
            // .trigger({
            //     type: 'select2:select',
            // })

            $('#form_ubah input[name=old_gambar]').val(row.gambar)
            $('#form_ubah input[name=old_gambar_thumb]').val(row.gambar_thumb)
            if (row.gambar) {
                $('#lihat').removeClass('text-danger')
                $('#lihat').addClass('text-success')
                $('#lihat').html(`<a href="<?= BASE_URL() ?>uploads/lomba/${row.gambar}" target="_blank">Lihat file</a>`)
            } else {
                $('#lihat').addClass('text-danger')
                $('#lihat').removeClass('text-success')
                $('#lihat').html('File belum ada')
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

    tambah_data = (form) => {
        let formData = new FormData(form);

        fetch(BASE_URL + 'insert', {
            method: 'POST',
            body: formData
        }).then(response => {
            $('#form_tambah button[type=submit]').hide();
            $('#form_tambah button.loader').show();
            if (response.ok) return response.json()
            throw new Error(response.statusText)
        }).then(response => {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: response.message,
                showConfirmButton: false,
                timer: 1500
            })
            datatable.ajax.reload();
        }).catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                showConfirmButton: false,
                timer: 1500
            })
        }).finally(() => {
            $('#form_tambah button[type=submit]').show();
            $('#form_tambah button.loader').hide();
            $('#form_tambah').trigger('reset');
            $('#form_tambah select').val(null).trigger('change')
            $('#form_tambah').removeClass('was-validated')
            $('#modal_tambah').modal('hide');
        })
    }

    ubah_data = (form) => {
        let formData = new FormData(form);
        formData.append('id', id_data);

        fetch(BASE_URL + 'update', {
            method: 'POST',
            body: formData
        }).then(response => {
            $('#form_ubah button[type=submit]').hide();
            $('#form_ubah button.loader').show();
            if (response.ok) return response.json()
            throw new Error(response.statusText)
        }).then(response => {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: response.message,
                showConfirmButton: false,
                timer: 1500
            })
            datatable.ajax.reload();
        }).catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                showConfirmButton: false,
                timer: 1500
            })
        }).finally(() => {
            $('#form_ubah button[type=submit]').show();
            $('#form_ubah button.loader').hide();
            $('#form_ubah').trigger('reset');
            $('#form_ubah select').val(null).trigger('change')
            $('#form_ubah').removeClass('was-validated')
            $('#modal_ubah').modal('hide');
        })
    }

    hapus_data = (form) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append('id', $(form).data('id'));

                fetch(BASE_URL + 'delete', {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    if (response.ok) return response.json()
                    throw new Error(response.statusText)
                }).then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    datatable.ajax.reload();
                }).catch(error => {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                })
            }
        })
    }
    // ================================================== //

    /**
     * Keperluan event click tombol dan submit form
     */
    // ================================================== //
    $('#tombol_tambah').click(event => {
        event.preventDefault();
        $('#modal_tambah').modal('show');
    });

    $('#table_data').on('click', '.tombol_ubah', function(event) {
        event.preventDefault()
        get_data(this);
    });

    $('#table_data').on('click', '.tombol_hapus', function(event) {
        event.preventDefault()
        hapus_data(this);
    });

    $('#form_tambah').submit(function(event) {
        event.preventDefault()
        if (this.checkValidity()) {
            tambah_data(this);
        }
    });

    $('#form_ubah').submit(function(event) {
        event.preventDefault();
        if (this.checkValidity()) {
            ubah_data(this);
        }
    });
    // ================================================== //

    /**
     * Keperluan input select2 didalam form
     */
    // ================================================== //
    const select2_in_form = (status) => {
        $(`#form_${status} .select_kategori`).select2({
            placeholder: 'Pilih kategori lomba',
            width: '100%',
            dropdownParent: $(`#modal_${status}`),
        }).on('select2:select', function(event) {
            if ($(this).val() == '1') {
                $(`#form_${status} .anggota_maksimal`).fadeIn(750)
                $(`#form_${status} .anggota_maksimal`).prop('required', true)

            } else {
                $(`#form_${status} .anggota_maksimal`).fadeOut(750)
                $(`#form_${status} .anggota_maksimal`).prop('required', false)
            }
        })
    }

    $('#modal_tambah').on('show.bs.modal', () => {
        select2_in_form('tambah')
    })

    $('#modal_ubah').on('show.bs.modal', () => {
        select2_in_form('ubah')
    })
    // ================================================== //
</script>