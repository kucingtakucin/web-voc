<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends MY_Controller
{
    private $_path = 'backend/admin/peserta/'; // Contoh 'backend/admin/dashboard'

    public function __construct()
    {
        parent::__construct();
        check_group("admin");
        $this->load->model($this->_path . 'M_Peserta');
        $this->load->library(['upload', 'image_lib', 'datatables']);
    }

    public function index()
    {
        $this->templates->load([
            'title' => 'Peserta',
            'type' => 'backend', // auth, frontend, backend
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'index',
            'script' => $this->_path . 'index_js',
            'modals' => []
        ]);
    }

    public function data()
    {
        $this->datatables->setTable("{$this->M_Peserta->table} a");
        $this->datatables->setColumnOrder([null, 'a.nama', 'a.email', 'a.id_tim', 'b.id_lomba', null]);
        $this->datatables->setColumnSearch(['a.nama', 'a.email']);
        $this->datatables->setOrder(['a.id' => 'desc']);
        $this->datatables->generateTable(function () {
            $this->db->select('a.*, b.nama nama_tim, c.nama_lomba')
                ->join('tim b', 'b.id = a.id_tim')
                ->join('lomba c', 'c.id = a.id_lomba');
            $this->db->where('a.is_active', '1');

            // Keperluan filter
            if ($this->input->get('id_lomba')) {
                $this->db->where('a.id_lomba', $this->input->get('id_lomba'));
            }
            if ($this->input->get('id_tim')) {
                $this->db->where('a.id_tim', $this->input->get('id_tim'));
            }

            switch ($this->input->get('status')) {
                case 'semua':
                    break;
                case 'ketua':
                    $this->db->where('a.is_ketua', '1');
                    break;
                case 'solo':
                    $this->db->where('a.is_ketua IS NULL');
                    break;
                default:
                    break;
            }
        });
    }

    public function get_lomba()
    {
        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'data' => $this->db->get('lomba')->result()
            ]));
    }

    public function get_tim()
    {
        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'data' => $this->db->get('tim')->result()
            ]));
    }
}

/* End of file Home.php */
