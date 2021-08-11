<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Lomba extends MY_Controller
{
    private $_path = 'backend/admin/lomba/'; // Contoh 'backend/admin/dashboard'

    public function __construct()
    {
        parent::__construct();
        check_group("admin");
        $this->load->model($this->_path . 'M_Lomba');
        $this->load->library(['upload', 'image_lib', 'datatables']);
    }

    public function index()
    {
        $this->templates->load([
            'title' => 'Lomba',
            'type' => 'backend', // auth, frontend, backend
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'index',
            'script' => $this->_path . 'index_js',
            'modals' => [
                $this->_path . 'modal/modal_tambah',
                $this->_path . 'modal/modal_ubah',
            ]
        ]);
    }

    public function data()
    {
        $this->datatables->setTable("{$this->M_Lomba->table} a");
        $this->datatables->setColumnOrder([null, null, 'a.nama_lomba', 'a.deskripsi', null, null, 'a.kategori', null]);
        $this->datatables->setColumnSearch(['a.nama_lomba', 'a.nama', 'a.kategori']);
        $this->datatables->setOrder(['a.nama_lomba' => 'asc']);
        $this->datatables->generateTable(function () {
            $this->db->select('a.*');
            $this->db->where('a.is_active', '1');

            // Keperluan filter
        });
    }

    public function insert()
    {
        $config['upload_path'] = './uploads/lomba/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = true;
        $config['remove_spaces'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("gambar")) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => $this->upload->display_errors()
                ]));
        }

        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->upload->data('full_path');
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 400;
        $config['height'] = 300;

        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => $this->image_lib->display_errors()
                ]));
        }

        $this->M_Lomba->insert(
            [
                'nama_lomba' => $this->input->post('nama_lomba', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'opening' => $this->input->post('opening', true),
                'closing' => $this->input->post('closing', true),
                'kategori' => $this->input->post('kategori', true),
                'maks_anggota' => $this->input->post('maks_anggota', true),
                'gambar' => $this->upload->data('file_name'),
                'gambar_thumb' => $this->upload->data('raw_name') . '_thumb' . $this->upload->data('file_ext'),
                'is_active' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => get_user_id(),
            ]
        );

        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Created successfuly'
            ]));
    }

    public function get_where()
    {
        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Found',
                'data' => $this->M_Lomba->get_where(
                    [
                        'a.id' => $this->input->post('id', true),
                        'a.is_active' => '1'
                    ]
                )
            ]));
    }

    public function update()
    {
        $config['upload_path'] = './uploads/lomba/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = true;
        $config['remove_spaces'] = true;
        $this->upload->initialize($config);
        if ($_FILES['gambar']['error'] !== 4) {
            if (file_exists("./uploads/lomba/{$this->input->post('old_gambar')}")) {
                chmod("./uploads/lomba/{$this->input->post('old_gambar')}", 0777);
                chmod("./uploads/lomba/{$this->input->post('old_gambar_thumb')}", 0777);
                unlink("./uploads/lomba/{$this->input->post('old_gambar')}");
                unlink("./uploads/lomba/{$this->input->post('old_gambar_thumb')}");
            }

            if (!$this->upload->do_upload("gambar")) {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => $this->upload->display_errors()
                    ]));
            }

            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->upload->data('full_path');
            $config['create_thumb'] = true;
            $config['maintain_ratio'] = true;
            $config['width'] = 400;
            $config['height'] = 300;

            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => $this->image_lib->display_errors()
                    ]));
            }
        }

        $this->M_Lomba->update(
            [
                'nama_lomba' => $this->input->post('nama_lomba', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'opening' => $this->input->post('opening', true),
                'closing' => $this->input->post('closing', true),
                'kategori' => $this->input->post('kategori', true),
                'maks_anggota' => $this->input->post('maks_anggota', true),
                'gambar' => $_FILES['gambar']['error'] === 4
                    ? $this->input->post('old_gambar') : $this->upload->data('file_name'),
                'gambar_thumb' => $_FILES['gambar']['error'] === 4
                    ? $this->input->post('old_gambar_thumb') : $this->upload->data('raw_name') . '_thumb' . $this->upload->data('file_ext'),
                'is_active' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => get_user_id(),
            ],
            $this->input->post('id', true)
        );

        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Updated successfuly'
            ]));
    }

    public function delete()
    {
        $data = $this->M_Lomba->get_where([
            'a.id' => $this->input->post('id', true),
            'a.is_active' => '1'
        ]);
        if (file_exists("./uploads/lomba/{$data->gambar}")) {
            chmod("./uploads/lomba/{$data->gambar}", 0777);
            chmod("./uploads/lomba/{$data->gambar_thumb}", 0777);
            unlink("./uploads/lomba/{$data->gambar}");
            unlink("./uploads/lomba/{$data->gambar_thumb}");
        }

        $this->M_Lomba->update(
            [
                'is_active' => '0',
                'deleted_at' => date('Y-m-d H:i:s'),
                'deleted_by' => get_user_id()
            ],
            $this->input->post('id', true)
        );

        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Deleted successfuly',
            ]));
    }
}

/* End of file Home.php */
