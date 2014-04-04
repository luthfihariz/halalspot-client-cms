<?

class Users extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index(){
		$this->checkSession();
		$this->load->view('login');
	}

	public function login(){
		$this->checkSession();
		if($username = $this->input->post('username')){
			$pwd = $this->input->post('pwd');
			$matchUsername = "admin";
			$matchPwd = "hsdb12345";

			if($username==$matchUsername || $pwd==$matchPwd){
				$session  = array(
					'username' => $username,
					'loggedIn' => true,
					);
				$this->session->set_userdata($session);
				redirect('places/index');
			}else{
				$data = array(
					'error' => true,
					);
				$this->load->view('login', $data);
			}
		}
	}

	public function logout(){
		$session  = array(
					'username' => '',
					'loggedIn' => false,
					);
		$this->session->unset_userdata($session);
		$this->load->view('login');
	}

	public function checkSession(){
		if($this->session->userdata('loggedIn')){
			redirect('places/index');			
		}else{
			return true;
		}
	}


}

?>