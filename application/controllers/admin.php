<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['title']		= 'Dashboard';
		// $data['menu_aktif']	= 'Home';
		$data['simbol']		= 'Darul Ghufron';
		$data['creator']	= 'Darul Ghufron';
		$data['link_web']	= 'https://www.darul-ghufron.com';
		$data['Blog']		= '';
		$data['license']	= '';

		$this->load->view('template_administrator/header', $data);
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('template_administrator/topbar', $data);
		$this->load->view('administrator/index', $data);
		$this->load->view('template_administrator/footer', $data);
	}

	public function edit_profil()
	{
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['title']		= 'Edit Profil';
		// $data['menu_aktif']	= 'Home';
		$data['simbol']		= 'Darul Ghufron';
		$data['creator']	= 'Darul Ghufron';
		$data['link_web']	= 'https://www.darul-ghufron.com';
		$data['Blog']		= '';
		$data['license']	= '';

		$this->load->view('template_administrator/header', $data);
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('template_administrator/topbar', $data);
		$this->load->view('administrator/edit_profil', $data);
		$this->load->view('template_administrator/footer', $data);
	}

	public function role_akses()
	{
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['role']	= $this->db->get('user_role')->result_array();
		$data['title']		= 'Role';
		// $data['menu_aktif']	= 'Home';
		$data['simbol']		= 'Darul Ghufron';
		$data['creator']	= 'Darul Ghufron';
		$data['link_web']	= 'https://www.darul-ghufron.com';
		$data['Blog']		= '';
		$data['license']	= '';

		$this->load->view('template_administrator/header', $data);
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('template_administrator/topbar', $data);
		$this->load->view('administrator/role_akses', $data);
		$this->load->view('template_administrator/footer', $data);
	}

	public function role_access($role_id)
	{
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['role']	= $this->db->get_where('user_role',['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu']	= $this->db->get('user_menu')->result_array();
		$data['title']		= 'Role Access';
		// $data['menu_aktif']	= 'Home';
		$data['simbol']		= 'Darul Ghufron';
		$data['creator']	= 'Darul Ghufron';
		$data['link_web']	= 'https://www.darul-ghufron.com';
		$data['Blog']		= '';
		$data['license']	= '';

		$this->load->view('template_administrator/header', $data);
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('template_administrator/topbar', $data);
		$this->load->view('administrator/lihat_role_access', $data);
		$this->load->view('template_administrator/footer', $data);
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data 	 = [
			'roleId' 	=> $role_id,
			'menuId'	=> $menu_id
		];
		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Hak akses berubah  </div>');	
	}
}
