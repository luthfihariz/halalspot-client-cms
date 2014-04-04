<?php
	
	
		public function checkSession(){
			if($this->session->userdata('loggedIn')){
				return true;
			}else{
				redirect('users/index');
			}
		}	
	

?>