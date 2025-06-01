<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteUser extends CI_Controller {

    public function index($user_id) {
        $this->load->model('User_model');

        // Αν θες μόνο τον έναν χρήστη που πρόκειται να διαγραφεί:
        $user = $this->User_model->get_user_by_id($user_id); // Πρέπει να υπάρχει αυτή η μέθοδος στο User_model

        if (!$user) {
            show_error('Ο χρήστης δεν βρέθηκε.');
        }

       
        $data['user1'] = $user; // pass the user to view
        $data['user_id'] = $user_id;// Pass the user ID to the view
        $this->load->view('deleteuser', $data);
    }

    public function delete($user_id) {
        // Load the user model
        $this->load->model('User_model');

        // Delete the user from the database
        $success = $this->User_model->delete_user($user_id);

        if ($success) {
            // If the deletion was successful, redirect to a success page or appropriate location
            redirect('success_page');
        } else {
            // If the deletion failed, redirect to an error page or appropriate location
            redirect('error_page');
        }
    }
}
?>
