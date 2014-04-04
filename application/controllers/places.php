<?php

class Places extends CI_Controller {

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
		$this->load->view('places/places_view');
		$this->load->view('tpl_footer');		
	}		

	public function create()
	{				
		if($name = $this->input->post('places_name')){			

			$this->curl->create(API_PLACES);
			$this->curl->post(array(  
	    						'name' => $name,
	    						'formatted_addr' => $this->input->post('places_formatted_addr'),
	    						'city' => $this->input->post('places_city'),
	    						'country' => $this->input->post('places_country'),
	    						'email' => $this->input->post('places_email'),
	    						'website' => $this->input->post('places_website'),
	    						'phone' => $this->input->post('places_phone')
							));
			$result = json_decode($this->curl->execute());						

			redirect('/places/index','refresh');
		}else{
			$categories = json_decode(file_get_contents(API_CATEGORIES),true);
			$bodies = json_decode(file_get_contents(API_HALALBODIES),true);

			$data['categories'] = $categories['result']['categories'];
			$data['bodies'] = $bodies['result']['bodies'];
			$data['isEdit'] = false;

			$this->load->view('tpl_header_full');
			$this->load->view('places/places_add_view', $data);
			$this->load->view('tpl_footer_full');
		}
	}

	public function update($objectid=''){		
		if($name = $this->input->post('name')){

			$this->curl->create(API_PLACES.'/'.$objectid);
			$this->curl->put(array(  
	    						'name' => $name,
	    						'address' => $this->input->post('address'),
	    						'lat' => $this->input->post('lat'),
	    						'lng' => $this->input->post('lng'),
	    						'city' => $this->input->post('city'),
	    						'country' => $this->input->post('country'),
	    						'cc' => $this->input->post('cc'),
	    						'zipCode' => $this->input->post('zipCode'),
	    						'phone' => $this->input->post('phone'),
	    						'email' => $this->input->post('email'),
	    						'website' => $this->input->post('website'),
	    						'twitter' => $this->input->post('twitter'),
	    						'facebook' => $this->input->post('facebook'),
	    						'categoryId' => $this->input->post('categoryId'),
	    						'tags' => $this->input->post('tags'),
	    						'photoUrls' => $this->input->post('photoUrls'),
	    						'halalType' => $this->input->post('halalType'),
	    						'halalDisplayValue' => $this->input->post('halalDisplayValue'),
	    						'foursquareId' => $this->input->post('foursquareId'),
	    						'bodyId' => $this->input->post('bodyId')
							));			
			echo $result = $this->curl->execute();
		}			
	}

	public function edit($objectid='')
	{
		$resultPlace = json_decode(file_get_contents(API_PLACES.'/'.$objectid), true);
		$resultCategories = json_decode(file_get_contents(API_CATEGORIES),true);
		$resultBodies = json_decode(file_get_contents(API_HALALBODIES),true);

		$data['place'] = $resultPlace['result']['place'];
		$data['categories'] = $resultCategories['result']['categories'];
		$data['bodies'] = $resultBodies['result']['bodies'];
		$data['isEdit'] = true;

		$this->load->view('tpl_header_full');
		$this->load->view('places/places_add_view', $data);
		$this->load->view('tpl_footer_full');					
	}

	public function detail($objectid=''){
		$place = json_decode(file_get_contents(API_PLACES.'/'.$objectid), true);
	
		$this->load->view('tpl_header');
		$this->load->view('places/places_detail_view', $place);
		$this->load->view('tpl_footer');	
	}

	public function delete($objectid=''){
		
		$this->curl->create(API_PLACES.'/'.$objectid);
		$this->curl->delete(array());
		$result = json_decode($this->curl->execute());
			

		redirect('/places/index','refresh');
	}
}
?>