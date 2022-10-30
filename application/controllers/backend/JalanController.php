<?php
class JalanController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JalanModel');
        $this->load->model('KecamatanModel');
        $this->load->model('KelurahanModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Pembangunan Jalan';
        if (isset($_POST['filter'])) {
            $filter = [
                'dis_id' => $this->POST('kecamatan'),
                'subdis_id' => $this->POST('kelurahan'),
                'tahun' => $this->POST('tahun'),
            ];
            $data['pembangunan'] = $this->JalanModel->get_pembangunan_by_filter($filter);
            $data['filter'] = true;
        } else {
            $data['pembangunan'] = $this->JalanModel->get_all_pembangunan();
        }
        $data['kecamatan'] = $this->KecamatanModel->get();
        $data['kelurahan'] = $this->KelurahanModel->get();
        $this->render('backend/jalan/data-jalan', $data);
    }

    public function create()
    {
        if (!isset($_POST['submit'])) {
            $data['title'] = 'Tambah Data Pembangunan Jalan';
            $data['pembangunan'] = $this->JalanModel->get_all_pembangunan();
            $data['kecamatan'] = $this->KecamatanModel->get();
            $data['kelurahan'] = $this->KelurahanModel->get();
            $this->render('backend/jalan/create-jalan', $data);
        } else {
            $data = [
                'prov_id' => $this->post('provinsi'),
                'city_id' => $this->post('kabupaten'),
                'dis_id' => $this->post('kecamatan'),
                'subdis_id' => $this->post('kelurahan'),
                'panjang_jalan' => $this->post('panjang'),
                'lebar_jalan' => $this->post('lebar'),
                'tebal_jalan' => $this->post('tebal'),
                'tahun' => $this->post('tahun'),
                'nama_kegiatan' => $this->post('kegiatan'),
                'user_id' =>  $this->data['token']['id_user']
            ];
            $this->db->trans_start();
            $this->JalanModel->insert($data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('pembangunan-jalan');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('pembangunan-jalan');
            }
        }
    }

    public function update($id = null)
    {
        if (isset($_POST['submit'])) {
            $data = $this->JalanModel->get(['id' => $id]);
            if ($data) {
                $this->db->trans_start();
                $data = [
                    'prov_id' => $this->post('provinsi'),
                    'city_id' => $this->post('kabupaten'),
                    'dis_id' => $this->post('kecamatan'),
                    'subdis_id' => $this->post('kelurahan'),
                    'panjang_jalan' => $this->post('panjang'),
                    'lebar_jalan' => $this->post('lebar'),
                    'tebal_jalan' => $this->post('tebal'),
                    'tahun' => $this->post('tahun'),
                    'nama_kegiatan' => $this->post('kegiatan'),
                    'user_id' =>  $this->data['token']['id_user']
                ];
                $insert = $this->JalanModel->update($id, $data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->flashmsg('Gagal mengubah data', 'danger');
                    redirect('pembangunan-jalan');
                } else {
                    $this->flashmsg('Sukses mengubah data', 'success');
                    redirect('pembangunan-jalan');
                }
            } else {
                $this->flashmsg('Gagal update data', 'danger');
                redirect('pembangunan-jalan');
            }
        } else {
            $data['title'] = 'Update Data Pembangunan Jalan';
            $data['jalan'] = $this->JalanModel->get(['id' => $id]);
            $data['kecamatan'] = $this->KecamatanModel->get();
            $data['kelurahan'] = $this->KelurahanModel->get();
            $this->render('backend/jalan/create-jalan', $data);
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->JalanModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('pembangunan-jalan');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('pembangunan-jalan');
        }
    }

    public function get_kelurahan($id = null)
    {
        $data = $this->KelurahanModel->get_kelurahan_by_kecamatan($id);
        echo json_encode($data);
    }

    public function get_grafik($tahun = null)
    {
        $data = $this->JalanModel->get_grafik_pembangunan($tahun);
        echo json_encode($data);
    }
}
