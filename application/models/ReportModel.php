<?php
class ReportModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'laporan';
        $this->data['primary_key'] = 'laporan_id';
    }
    public function get_laporan()
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->join('pelanggan', 'laporan.laporan_pelanggan = pelanggan.pelanggan_id');
        return $this->db->get()->result();
    }

    public function get_laporan_by_id($id = null)
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->join('pelanggan', 'laporan.laporan_pelanggan = pelanggan.pelanggan_id');
        $this->db->where('laporan_id', $id);
        return $this->db->get()->result();
    }
}
