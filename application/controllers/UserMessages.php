<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMessages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the session library
        $this->load->library('session');
        // Load the User_model
        $this->load->model('User_model');
    }

    public function index() {
        // Check if the admin is logged in
        if ($this->session->userdata('user_id') == 1) {
            // Get the admin ID
            $admin_id = $this->session->userdata('user_id');

            // Get all users except the admin
            $users = $this->User_model->get_all_users_except_admin($admin_id);

            

            // Ensure we have at least one user to display
            if (!empty($users)) {
                // Pass the users data to the view
                $data['users'] = $users;
                // Load the usermessages view
                $this->load->view('usermessages', $data);
            } else {
                // Handle the case where there are no users
                echo "No users found.";
            }
        } else {
            // Redirect or show an error message if the logged-in user is not admin
            redirect('adminprofile'); // Redirect to admin profile page
        }
    }

    public function show_user_messages($user_id) {
        // Fetch messages for the selected user from the database
        $data['message'] = $this->User_model->get_user_messages($user_id, 'message');
        $data['message2'] = $this->User_model->get_user_messages($user_id, 'message2');
        $data['message3'] = $this->User_model->get_user_messages($user_id, 'message3');
        $data['created_at'] = $this->User_model->get_user_messages($user_id, 'created_at');

        // Get user info (first_name and last_name)
    $user = $this->User_model->get_user_by_id($user_id);
    if ($user) {
        $data['username'] = $user->first_name . ' ' . $user->last_name;
    } else {
        $data['username'] = 'Unknown User';
    }

        // Load the usermessages view and pass the messages data
        $this->load->view('usermessages', $data);
    }
}
?>
