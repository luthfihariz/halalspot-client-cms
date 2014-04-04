<?
class Categories extends CI_Controller{
	
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
	
	public function index(){
		$categories = json_decode(file_get_contents(API_CATEGORIES),true);

		$this->load->view('tpl_header');
		$this->load->view('categories/categories_view', $categories);
		$this->load->view('tpl_footer');
	}

	public function create(){

		$this->load->view('tpl_header');
		$this->load->view('categories/categories_add_view');
		$this->load->view('tpl_footer');
	}	

	public function delete($objectid=''){

		$this->curl->create(API_CATEGORIES.'/'.$objectid);
		$this->curl->delete(array());
		$result = json_decode($this->curl->execute());
	}

	public function edit($objectid=''){
		if($name = $this->input->post('name') != null){
			$this->curl->create(API_CATEGORIES.'/'.$objectid);
			$this->curl->put(array(
					'name' => $this->input->post('name'),
					'short_name' => $this->input->post('short_name'),
					'foursquare_id' => $this->input->post('foursquare_id')
				));
			$result = json_decode($this->curl->execute());				
		}
		
	}

}

?>