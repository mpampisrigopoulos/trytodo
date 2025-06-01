<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditUser extends CI_Controller {

    public function index($user_id) {
        // Load the user model
        $this->load->model('User_model');

        // Retrieve the user information from the database
        $user = $this->User_model->get_user_by_id($user_id);

        if ($user) {
            // If user exists, pass the user data to the view
            $data['user'] = $user;
            $this->load->view('edituser', $data);
        } else {
            // If user does not exist, show an error message or redirect
            // Example: redirect to a page displaying an error message
            redirect('error_page');
        }
    }

public function update_user_info() {
    // Retrieve the user ID and updated information from the form submission
    $user_id = $this->input->post('user_id');
    $updated_data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        // Check if a new password is provided
        'password' => $this->input->post('password') ? password_hash($this->input->post('password'), PASSWORD_DEFAULT) : null
        
    );

    // Load the user model
    $this->load->model('User_model');

    // Retrieve the existing hashed password for the user
    $existing_user = $this->User_model->get_user_by_id($user_id);
    $existing_hashed_password = $existing_user->password;

    // If a new password is provided, hash it before updating
    if (!empty($updated_data['password'])) {
        $updated_data['password'] = password_hash($updated_data['password'], PASSWORD_DEFAULT);
    } else {
        // If no new password is provided, retain the existing hashed password
        $updated_data['password'] = $existing_hashed_password;
    }

    // Update the user's information in the database
    $success = $this->User_model->update_user_as_admin($user_id, $updated_data);

    // Set a success message
            $this->session->set_flashdata('success_message', 'The information has been updated.');

   redirect('edituser/index/' .$user_id);
}

}
?>
