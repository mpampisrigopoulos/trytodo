<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the session library
        $this->load->library('session');
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        // Απενεργοποίηση cache
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        // Load the myprofile view
        $this->load->view('myprofile');
    }

    public function update_profile() {
        // Load the form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('name', 'First Name');
        $this->form_validation->set_rules('lastname', 'Last Name');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('password', 'Password',);

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the myprofile view with validation errors
            $this->load->view('myprofile');
        } else {
        // Form validation passed, prepare data for update
        $data = array('status'=>'1');

        // Check if first name is provided, then include it in data
        if ($this->input->post('name')) {
            $data['first_name'] = $this->input->post('name');
        }

        // Check if last name is provided, then include it in data
        if ($this->input->post('lastname')) {
            $data['last_name'] = $this->input->post('lastname');
        }

        // Check if email is provided, then include it in data
        if ($this->input->post('email')) {
            $data['email'] = $this->input->post('email');
        }

        // Check if password is provided, then include it in data
        if ($this->input->post('password')) {
            $data['password'] = $this->input->post('password');
        }

        // Load the user model
        $this->load->model('User_model');

        // Retrieve user ID from session
        $user_id = $this->session->userdata('user_id');

        // Update user information
        $this->User_model->update_user($user_id, $data);

        // Set a success message
            $this->session->set_flashdata('success_message', 'The information has been updated.');


        // Redirect to My Profile page or show a success message
        redirect('myprofile');
    }
    }
}
?>
