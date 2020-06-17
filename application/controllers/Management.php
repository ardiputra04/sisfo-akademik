<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['title']		= 'Menu Akses management';
		$data['menu_aktif']	= 'Home';
		$data['simbol']		= 'Darul Ghufron';
		$data['creator']	= 'Darul Ghufron';
		$data['link_web']	= 'https://www.darul-ghufron.com';
		$data['Blog']		= '';
		$data['license']	= '';

		$data['menu']		= $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu','required',[
			'required'		=> 'Nama menu harus diisi'
		]);
		if($this->form_validation->run() == false )
		{
		$this->load->view('template_administrator/header', $data);
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('template_administrator/topbar', $data);
		$this->load->view('Menu/Menu_akses_management', $data);
		$this->load->view('template_administrator/footer', $data);	

		} else {
			$this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Akses menu berhasil ditambahkan  </div>');
					redirect('Management');
		}
		
	}

	public function subMenu()

	{
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['title']		= 'Sub Menu management';
		$data['menu_aktif']	= 'Home';
		$data['simbol']		= 'Darul Ghufron';
		$data['creator']	= 'Darul Ghufron';
		$data['link_web']	= 'https://www.darul-ghufron.com';
		$data['Blog']		= '';
		$data['license']	= '';

		$this->load->model('ModelAkses','MyModel');
		$data['subMenu']	= $this->MyModel->getSubMenu();
		$data['menu']		= $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Judul','required',[
			'required'		=> 'Judul harus diisi'
		]);
		$this->form_validation->set_rules('menu_id', 'Menu','required',[
			'required'		=> 'Menu harus dipilih'
		]);
		$this->form_validation->set_rules('url', 'Url','required',[
			'required'		=> 'URL harus diisi'
		]);
		$this->form_validation->set_rules('icon', 'Icon','required',[
			'required'		=> 'Nama icon harus diisi'
		]);
		

		if ($this->form_validation->run() == false) {
			$this->load->view('template_administrator/header',$data);
			$this->load->view('template_administrator/sidebar',$data);
			$this->load->view('template_administrator/topbar',$data);
			$this->load->view('Menu/subMenu',$data);
			$this->load->view('template_administrator/footer',$data);# code...
		} else {
			$data = [
				'title' 	=>$this->input->post('title'),
				'menu_id'	=>$this->input->post('menu_id'),
				'url' 		=>$this->input->post('url'),
				'icon' 		=>$this->input->post('icon'),
				'is_active' =>$this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Akses Sub menu berhasil ditambahkan  </div>');
					redirect('Menu/subMenu');
		}

		
	}

}