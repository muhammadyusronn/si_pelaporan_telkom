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
}
