<?php
class ReportController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReportModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }
    public function index()
    {
        $data['title'] = 'Data Laporan';
        $data['laporan'] = $this->ReportModel->get_laporan();
        $this->render('backend/laporan/data-laporan', $data);
    }
}
