<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model');
	}

	public function index()
	{
		$this->load->view('signup');
	}

	public function signUp()
	{
		// username availability is checcked after submission
		$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[users.username]');

		if ($this->form_validation->run() == TRUE) {

            $data = array(
	        //assign user data into array elements
	        'username' => $this->input->post('username'),
	        'email' =>$this->input->post('email'),
	        'password' =>sha1($this->input->post('password'))
	    );

        $this->Register_model->insertUser($data);
        //set message to be shown when registration is completed
        $this->session->set_flashdata('success','User is registered!');
        redirect('Register/Signup');

		} else {
	        //return to the signup page again with validation errors
	        $this->load->view('signup');
	        }			
		}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */