<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		is_logged_in();
	}

	public function index()
	{
		echo 'ini Dashboard Murid';
	}
}