<?php

class Halalbodies extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->checkSession();
	}

	public function checkSession(){
		if($this->session->userdata('loggedIn')){
			return true;
		}else{
			redirect('users/index');
		}
	}

	public function index()
	{	

		$this->load->view('tpl_header');
		$this->load->view('halalbodies/halalbodies_view');
		$this->load->view('tpl_footer');
	}

	public function delete($objectid="")
	{
		$this->curl->create(API_HALALBODIES.'/'.$objectid);
		$this->curl->delete(array());
		$this->curl->execute();

	}

	public function edit()
	{
		//upload file here
		$dir = '/home/luthfihariz/dev/pymongotest/static/halal_logo/';
		$file = $dir.$_FILES['halalLogo']['name'];

		$objectid = $this->input->post('bid');
		
		$this->curl->create(API_HALALBODIES.'/'.$objectid);
		$this->curl->put(array(
				'name' => $this->input->post('name'),
				'shortName' => $this->input->post('shortName'),
				'overview' => $this->input->post('overview'),
				'country' => $this->input->post('country'),
				'halalLogo' => $_FILES['halalLogo']['name'],
				'address' => $this->input->post('address'),
				'website' => $this->input->post('website'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'email' => $this->input->post('email'),
				'pic' => $this->input->post('pic')
			));
		$this->curl->execute();
		move_uploaded_file($_FILES['halalLogo']['tmp_name'], $file);
		redirect('halalbodies/index','refresh');
	}

	public function create()
	{
		if($this->input->post('name')){			
			//upload file here
			$dir = '/home/luthfihariz/dev/pymongotest/static/halal_logo/';
			$file = $dir.$_FILES['halalLogo']['name'];			

			$this->curl->create(API_HALALBODIES.'/'.$objectid);
			$this->curl->post(array(
					'name' => $this->input->post('name'),
					'shortName' => $this->input->post('shortName'),
					'overview' => $this->input->post('overview'),
					'country' => $this->input->post('country'),
					'halalLogo' => $_FILES['halalLogo']['name'],
					'address' => $this->input->post('address'),
					'website' => $this->input->post('website'),
					'phone' => $this->input->post('phone'),
					'fax' => $this->input->post('fax'),
					'email' => $this->input->post('email'),
					'pic' => $this->input->post('pic')
				));
			$this->curl->execute();
			move_uploaded_file($_FILES['halalLogo']['tmp_name'], $file);
			redirect('halalbodies/index','refresh');
		}
	}	

}?>