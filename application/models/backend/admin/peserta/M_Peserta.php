<?php

class M_Peserta extends CI_Model
{
    public $table = 'peserta';

    public function get()
    {
        return $this->db->select('a.*, b.nama_lomba, c.nama nama_tim, c.asal_instansi')
            ->join('lomba b', 'b.id = a.id_lomba')
            ->join('tim c', 'c.id = a.id_tim')
            ->order_by('a.id_tim')
            ->get("{$this->table} a")->result();
    }

    public function insert($data = [])
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_where($where = [])
    {
        return $this->db->select('a.*, b.nama_lomba, c.nama nama_tim')
            ->join('lomba b', 'b.id = a.id_lomba')
            ->join('tim c', 'c.id = a.id_tim')
            ->get_where("{$this->table} a", $where)->row();
    }

    public function update($data = [], $id = null)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    // public function delete($table, $id = null)
    // {
    //     return $this->db->delete($table, ['id' => $id]);
    // }
}
