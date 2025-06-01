<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load the User_model here
    }

   
   public function index() {
    // Check if the admin is logged in
    if ($this->session->userdata('user_id') == 1) {
        // Get the admin ID
        $admin_id = $this->session->userdata('user_id');

        // Get all users except the admin
        $users = $this->User_model->get_all_users_except_admin($admin_id);

        // Ensure we have at least two users to display
        if (count($users) >= 2) {
            // Extract the first two users
            $user1 = $users[0];
            $user2 = $users[1];
            $user3 = $users[2];

             // Get the created_at value for each user
            $created_at1 = $this->User_model->get_created_at($user1->id);
            $created_at2 = $this->User_model->get_created_at($user2->id);
            $created_at3 = $this->User_model->get_created_at($user3->id);
            

            // Pass the user data to the view
            $data['user1'] = $user1;
            $data['user2'] = $user2;
            $data['user3'] = $user3;
            $data['created_at1'] = $created_at1;
            $data['created_at2'] = $created_at2;
            $data['created_at3'] = $created_at3;
            
            // Load the customers view
            $this->load->view('customers', $data);
        } else {
            // Handle the case where there are not enough users to display
            echo "Not enough users to display.";
        }
    } else {
        // Redirect or show an error message if the logged-in user is not admin
        redirect('adminprofile'); // Redirect to admin profile page
    }
}



}
