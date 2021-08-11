<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tim extends MY_Controller
{
    private $_path = 'backend/admin/tim/'; // Contoh 'backend/admin/dashboard'

    public function __construct()
    {
        parent::__construct();
        check_group("admin");
        $this->load->model($this->_path . 'M_Tim');
        $this->load->library(['upload', 'image_lib', 'datatables']);
    }

    public function index()
    {
        $this->templates->load([
            'title' => 'Tim',
            'type' => 'backend', // auth, frontend, backend
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'index',
            'script' => $this->_path . 'index_js',
            'modals' => []
        ]);
    }

    public function data()
    {
        $this->datatables->setTable("{$this->M_Tim->table} a");
        $this->datatables->setColumnOrder([null, 'a.nama', 'a.asal_instansi', 'a.id_lomba', null]);
        $this->datatables->setColumnSearch(['a.nama', 'a.asal_instansi']);
        $this->datatables->setOrder(['a.id' => 'desc']);
        $this->datatables->generateTable(function () {
            $this->db->select('a.*, b.nama_lomba')
                ->join('lomba b', 'b.id = a.id_lomba');
            $this->db->where('a.is_active', '1');

            // Keperluan filter
            if ($this->input->get('id_lomba')) {
                $this->db->where('a.id_lomba', $this->input->get('id_lomba'));
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
}

/* End of file Home.php */
