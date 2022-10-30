<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (isset($token)) {
			redirect('dash');
		}
		if (!isset($_POST['submit'])) {
			$data['title'] = 'Halaman Login';
			$this->load->view('backend/page-login', $data);
		} else {
			$nip = $this->POST('nip');
			$pass = $this->POST('password');
			$cek_user = $this->AdminModel->get(['nip' => $nip]);
			if (count($cek_user) == 0) {
				$this->flashmsg('Data tidak ditemukan', 'danger');
				redirect('login');
			} else {
				if ($cek_user[0]->level === 'Admin' || $cek_user[0] === 'Pimpinan') {
					if (password_verify($pass, $cek_user[0]->password)) {
						$data = [
							'nip'       => $nip,
							'password'  => $cek_user[0]->password
						];
						$user = $this->AdminModel->get($data);
						if (count($user) == 1) {
							$resource = [
								'id_user'    => $user[0]->id_user,
								'nip'        => $user[0]->nip,
								'level'      => $user[0]->level,
								'nama'       => $user[0]->nama,
								'kontak'     => $user[0]->kontak
							];
							$this->data['resess']     = $resource;
							$this->data['message']     = 'Auth success';
							$this->data['info']     = [
								'status'     => 'ok',
								'response'    => 200
							];
							$update = $this->AdminModel->update($user[0]->id_user, ['last_login' => date("Y-m-d H:i:s")]);
						} else {
							$this->data['message']     = 'Wrong username or password';
							$this->data['info']     = [
								'status'    => 'fail',
								'response'    => 502
							];
							$this->flashmsg($this->data['message'], 'danger');
							redirect('login');
						}
					} else {
						$this->data['message']     = 'Wrong username or password';
						$this->data['info']     = [
							'status'    => 'fail',
							'response'    => 502
						];
						$this->flashmsg($this->data['message'], 'danger');
						redirect('login');
					}
					if ($this->data['info']['status'] == 'ok') {
						$this->flashmsg($this->data['message'], 'success');
						$this->session->set_userdata(['token' => $this->data['resess']]);
						if ($this->data['resess']['level'] == 'Penilai') {
							echo 'halaman penilai';
						} else {
							redirect('dash');
						}
					} else {
						$this->flashmsg($this->data['message'], 'danger');
					}
				} else {
					$this->flashmsg('Forbidden Access', 'danger');
				}
			}
		}
	}
}
