<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageHistory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the session library
        $this->load->library('session');
        // Load the User_model
        $this->load->model('User_model');
    }

public function index() {
    // Check if the user is logged in
    if ($this->session->userdata('user_id')) {
        // Get the user ID from the session
        $user_id = $this->session->userdata('user_id');
        // Fetch messages for the user from the database
        $data['message'] = $this->User_model->get_user_messages($user_id, 'message');
        $data['message2'] = $this->User_model->get_user_messages($user_id, 'message2');
        $data['message3'] = $this->User_model->get_user_messages($user_id, 'message3');
        $data['created_at'] = $this->User_model->get_user_messages($user_id, 'created_at');
        // Load the messagehistory view and pass the messages data
        $this->load->view('messagehistory', $data);
    } else {
        // Redirect the user to the login page or display an error message
        redirect('login');
    }
}


}
?>
