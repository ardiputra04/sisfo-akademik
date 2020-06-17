<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email',[
			'required'		=> 'Email tidak boleh kosong',
			'trim'			=> 'Email tidak boleh menggunakan space',
			'valid_email'	=> 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',[
			'required'		=> 'Password tidak boleh kosong',
			'trim'			=> 'Password tidak boleh menggunakan space',
			
		]);

		if( $this->form_validation->run() == false ){
		$data['title']		= 'Login Page';

		$this->load->view('template/Auth_header',$data);
		$this->load->view('Auth/login',$data);
		$this->load->view('template/Auth_footer',$data);			
		} else{
			$this->_login();
		}

	}

	private function _login()
	{
		$email 		= $this->input->post('email');
		$password	= $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $email])->row_array();
		
		//usernya ada
		if($user) {
			//jika usernya aktif
			if($user['is_active'] == 1 ){
				//cek passwordnya
				if(password_verify($password, $user['password'])){
					$data = [
						'email' 	=> $user['email'],
						'role_id'	=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] ==1) {
						redirect('admin');	
					} else if ($user['role_id'] ==2) {
						redirect('kepsek');
					}	else if ($user['role_id'] ==3) {
						redirect('guru');		
					} else {
						redirect('murid');
					}
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Password Salah  </div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Email belum aktif </div>');
					redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Email tidak terdaftar </div>');
			redirect('auth');
		}
	}

	public function Register()
	{
		$this->form_validation->set_rules('name','Name', 'required',[
			'required'			=>'Nama lengkap harus diisi'
		]);
		$this->form_validation->set_rules('tgl_lahir','Tgl Lahir', 'required',[
			'required'			=>'Tgl Lahir harus diisi'
		]);
		$this->form_validation->set_rules('no_telp','No Telp', 'required|trim|is_unique[user.no_telp]',[
			'is_unique'			=> 'No Telp sudah terdaftar',
			'required'			=> 'No Telp harus diisi',
			'trim'				=> 'Spcae tidak diperbolehkan'
		]);
		$this->form_validation->set_rules('tmpt_lahir','Tmpt Lahir', 'required',[
			'required'			=> 'Tempat Lahir harus diisi'
		]);
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique'			=> 'Email sudah terdaftar',
			'required'			=> 'Email harus diisi',
			'trim'				=> 'Space tidak diperbolehkan',
			'valid_email'		=> 'Email tidak valid'
		]);
		
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|max_length[20]|matches[password2]',[
				'matches' 		=> 'Password tidak sama dengan ulangi password !',
				'min_length'	=> 'Password minimal 5 karakter',
				'max_length'	=> 'Password maksimal 20 karakter',
				'required'		=> 'Password harus diisi',
				'trim'			=> 'Space tidak diperbolehkan'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
				'required'		=> 'Ulangi password harus diisi',
				'trim'			=> 'Space tidak diperbolehkan',
				'matches' 		=> 'Ualngi password tidak sama dengan password !'
		]);

		if( $this->form_validation->run() == false )
		{

		$data['title']		= 'Register Page';

		$this->load->view('template/Auth_header',$data);
		$this->load->view('Auth/register',$data);
		$this->load->view('template/Auth_footer',$data);
		} else{
			$data = [
				'name'			=> htmlspecialchars($this->input->post('name', true)),
				'tgl_lahir' 	=> htmlspecialchars($this->input->post('tgl_lahir', true)),
				'tmpt_lahir' 	=> htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'no_telp' 		=> htmlspecialchars($this->input->post('no_telp', true)),
				'email'			=> htmlspecialchars($this->input->post('email', true)),
				'image'			=> 'default.jpg',
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'		=> 1,
				'is_active'		=> 1,
				'date_created'	=> time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Selamat data user telah ditambahkan. </div>');
			redirect('Auth');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Anda berhasil keluar. </div>');
			redirect('Auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}