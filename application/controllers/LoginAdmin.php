<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('loginadmin');
    }

    public function loginnow() {
        echo "loginnow method is called!";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Form is submitted!";

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                // Load the user model
                $this->load->model('user_model');

                // Call the method in the user model to verify login credentials
                $user = $this->user_model->verify_adminlogin($email, $password);
                
                //checks if the admin has id=1
                if ($user && $user->id == 1) {
                    // User authentication successful
                    $this->session->set_userdata('user_id', $user->id);
                    redirect('adminprofile');
                } else {
                    // User authentication failed
                    $this->session->set_flashdata('error', 'Invalid email or password.');
                    redirect('loginadmin');
                }
            }
        }

        // If no form submission or validation fails, load the login view
        $this->load->view('loginadmin');
    }


  public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data = array(
                'email' => $email,
                'password' => $hashed_password,
                'status' => '1'
            );

            // Load the user model
            $this->load->model('user_model');
            $this->user_model->insertuser($data);
            redirect(base_url('welcome/index'));
        }
    }

    
}


    

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
