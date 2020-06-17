<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepsek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] 	= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
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
		$this->load->view('kepsek/index', $data);
		$this->load->view('template_administrator/footer', $data);
	
	}
}