<?php

use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends MY_Controller
{
    private $_path = 'backend/admin/peserta/'; // Contoh 'backend/admin/dashboard'

    public function __construct()
    {
        parent::__construct();
        check_group("admin");
        $this->load->model($this->_path . 'M_Peserta');
        $this->load->library(['datatables']);
    }

    public function index()
    {
        $this->templates->load([
            'title' => 'Peserta',
            'type' => 'backend', // auth, frontend, backend
            'uri_segment' => $this->_path,
            'page' => $this->_path . 'index',
            'script' => $this->_path . 'index_js',
            'modals' => [
                $this->_path . 'modal/modal_detail'
            ]
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
                ->join('tim b', 'b.id = a.id_tim', 'left')
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
                    $this->db->where('a.is_ketua IS NULL AND a.id_tim IS NULL');
                    break;
                default:
                    break;
            }
        });
    }

    public function get_where()
    {
        return $this->output->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status' => true,
                'message' => 'Found',
                'data' => $this->M_Peserta->get_where(
                    [
                        'a.id' => $this->input->post('id', true),
                        'a.is_active' => '1'
                    ]
                )
            ]));
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

    public function export_excel()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->setTitle('Data Peserta Lomba');
        $spreadsheet->getProperties()->setCreator('Administrator VOC')
            ->setLastModifiedBy('Administrator VOC')
            ->setTitle('Data Peserta Lomba')
            ->setSubject('Data Peserta Lomba')
            ->setDescription('Data Peserta Lomba')
            ->setKeywords('data peserta lomba voc');

        $spreadsheet->getActiveSheet()->getStyle('B5:I5')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFA65');

        $spreadsheet->getActiveSheet(0)
            ->setCellValue('D2', 'DATA PESERTA LOMBA VOC')
            ->getStyle('D2')
            ->getFont()->setBold(true);

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B5', '#')
            ->getStyle('B5')
            ->getFont()->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C5', 'NAMA LENGKAP')
            ->getStyle('C5')
            ->getFont()
            ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('D5', 'EMAIL')
            ->getStyle('D5')
            ->getFont()
            ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('E5', 'NO HP')
            ->getStyle('E5')
            ->getFont()
            ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('F5', 'STATUS')
            ->getStyle('F5')
            ->getFont()
            ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('G5', 'ASAL INSTANSI')
            ->getStyle('G5')
            ->getFont()
            ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('H5', 'TIM')
            ->getStyle('H5')
            ->getFont()
            ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('I5', 'LOMBA')
            ->getStyle('I5')
            ->getFont()
            ->setBold(true);

        $spreadsheet->getActiveSheet(0)->getStyle('B5:I5')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet(0)->getStyle('B5:I5')
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(30);

        $columns = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];

        foreach ($columns as $column) {
            $spreadsheet->getActiveSheet()
                ->getColumnDimension($column)
                ->setAutoSize(true);
            $spreadsheet->getActiveSheet()
                ->getStyle("{$column}5")
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));
        }

        $data = $this->M_Peserta->get();

        $no = 0;
        $awal = 6;
        foreach ($data as $datum) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B' . $awal, ++$no);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('C' . $awal, $datum->nama);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D' . $awal, $datum->email);
            $spreadsheet->setActiveSheetIndex(0)->setCellValueExplicit('E' . $awal, "{$datum->no_hp}", DataType::TYPE_STRING);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('F' . $awal, $datum->is_ketua
                ? ($datum->is_ketua == '1'
                    ? 'Ketua' :  'Anggota') : 'Solo Player');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('G' . $awal, $datum->asal_instansi);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('H' . $awal, $datum->nama_tim);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('I' . $awal, $datum->nama_lomba);

            foreach ($columns as $column) {
                $spreadsheet->getActiveSheet()
                    ->getStyle($column . $awal)
                    ->getBorders()
                    ->getOutline()
                    ->setBorderStyle(Border::BORDER_THIN)
                    ->setColor(new Color('000000'));
            }
            $awal++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data_peserta_lomba.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        return $writer->save('php://output');
    }
}

/* End of file Home.php */
