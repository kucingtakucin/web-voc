<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{
    private $_path = 'frontend/pendaftaran/';
    private $_table = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/admin/tim/M_Tim');
        $this->load->model('backend/admin/peserta/M_Peserta');
        $this->load->library(['upload', 'image_lib']);
    }

    public function index()
    {
        $this->templates->load([
            'title' => 'Pendaftaran',
            'type' => 'frontend',
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'index',
            'script' => $this->_path . 'index_js',
            'modals' => [],
            'header' => $this->_path . 'header',
        ]);
    }

    public function individu()
    {
        $this->templates->load([
            'title' => 'Pendaftaran Lomba Individu',
            'type' => 'frontend',
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'individu/index',
            'script' => $this->_path . 'individu/index_js',
            'modals' => [],
            'header' => $this->_path . 'individu/header',
        ]);
    }

    public function kelompok()
    {
        $this->templates->load([
            'title' => 'Pendaftaran Lomba Kelompok',
            'type' => 'frontend',
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'kelompok/index',
            'script' => $this->_path . 'kelompok/index_js',
            'modals' => [],
            'header' => $this->_path . 'kelompok/header',
        ]);
    }

    public function get_lomba_kelompok()
    {
        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'data' => $this->db->get_where('lomba', ['kategori' => '1'])->result()
            ]));
    }

    public function get_lomba_individu()
    {
        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'data' => $this->db->get_where('lomba', ['kategori' => '0'])->result()
            ]));
    }

    public function daftar_individu()
    {
    }

    public function daftar_kelompok()
    {
        $this->upload->initialize([
            'upload_path' => './uploads/peserta/',
            'allowed_types' => 'jpg|jpeg|png|pdf|zip|rar',
            'max_size' => 10240,
            'encrypt_name' => true,
            'remove_spaces' => true
        ]);

        $data_upload = [];
        foreach ($_FILES as $key => $file) {        // Cek error
            switch ($file['error']) {
                case 1:
                    return $this->output->set_content_type('application/json')
                        ->set_status_header(404)
                        ->set_output(json_encode([
                            'status' => false,
                            'message' => 'The uploaded file exceeds the <i>upload_max_filesize</i> directive in <b>php.ini</b>'
                        ]));
                    break;
                case 2:
                    return $this->output->set_content_type('application/json')
                        ->set_status_header(404)
                        ->set_output(json_encode([
                            'status' => false,
                            'message' => 'Maaf, ukuran file anda terlalu besar! Maksimal <b>10MB</b>'
                        ]));
                    break;
                case 3:
                    return $this->output->set_content_type('application/json')
                        ->set_status_header(404)
                        ->set_output(json_encode([
                            'status' => false,
                            'message' => 'Maaf, file hanya terupload sebagian, silakan coba lagi!'
                        ]));
                default:
                    # code...
                    break;
            }
        }

        // Upload dokumen ketua saja
        foreach ($_FILES as $key => $file) {
            for ($i = 1; $i <= $this->input->post('increment'); $i++) {
                if ($key == "scan_kartu_anggota_$i") {
                    continue 2; // Anggota di skip
                }
            }

            if (($this->input->post('id_lomba') == '1' || $this->input->post('id_lomba') == '2') &&
                $key == 'unggah_karya'
            ) {
                $data_upload['unggah_karya'] = null;
                continue; // Unggah karya di skip kalau lomba pubg atau ml
            }

            if (!$this->upload->do_upload($key)) {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => $this->upload->display_errors()
                    ]));
            } else {
                $data_upload[$key] = $this->upload->data('file_name');
            }
        }

        // Buat tim
        $id_tim = $this->M_Tim->insert([
            'nama' => $this->input->post('nama_tim', true),
            'asal_instansi' => $this->input->post('asal_instansi', true),
            'id_lomba' => $this->input->post('id_lomba', true),
            'is_active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => get_user_id(),
        ]);

        // Tambah ketua
        $this->M_Peserta->insert(
            [
                'nama' => $this->input->post('nama_ketua', true),
                'email' => $this->input->post('email_ketua', true),
                'no_hp' => $this->input->post('no_wa_ketua', true),
                'is_ketua' => '1',
                'id_tim' => $id_tim,
                'id_lomba' => $this->input->post('id_lomba', true),
                'scan_kartu' => $data_upload['scan_kartu_ketua'],
                'bukti_transfer' => $data_upload['bukti_transfer'],
                'unggah_karya' => $data_upload['unggah_karya'],
                'is_active' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => get_user_id(),
            ]
        );

        // Tambah anggota
        for ($i = 1; $i <= $this->input->post('increment'); $i++) {
            if (!$this->upload->do_upload("scan_kartu_anggota_$i")) {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => $this->upload->display_errors()
                    ]));
            } else {
                $data_upload["scan_kartu_anggota_$i"] = $this->upload->data('file_name');
            }
            $this->M_Peserta->insert(
                [
                    'nama' => $this->input->post("nama_anggota_$i", true),
                    'email' => $this->input->post("email_anggota_$i", true),
                    'no_hp' => $this->input->post("no_wa_anggota_$i", true),
                    'is_ketua' => '0',
                    'id_tim' => $id_tim,
                    'id_lomba' => $this->input->post('id_lomba', true),
                    'scan_kartu' => $data_upload["scan_kartu_anggota_$i"],
                    'bukti_transfer' => null,
                    'unggah_karya' => null,
                    'is_active' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => get_user_id(),
                ]
            );
        }

        // Kirim email ke ketua
        $client = new GuzzleHttp\Client(['base_uri' => base_url()]);
        $client->request('POST', 'email', [
            'form_params' => [
                'to' => $this->input->post('email_ketua', true),
            ]
        ]);

        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Berhasil melakukan pendaftaran. Silakan cek email kamu ya!',
            ]));
    }

    private function _ujiemail()
    {
        $client = new GuzzleHttp\Client(['base_uri' => base_url()]);
        $response = $client->request('POST', 'email', [
            'form_params' => [
                'to' => 'adam.faizal.af6@student.uns.ac.id'
            ]
        ]);
        var_dump($response);
    }
}
