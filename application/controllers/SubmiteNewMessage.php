 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubmiteNewMessage extends CI_Controller {

     public function __construct() {
        parent::__construct();
        // Load the session library
        $this->load->library('session');
    }

    public function index() {
        // Load the form view
        $this->load->view('submitenewmessage');
    }

 public function submit_message() {
    // Check if the user is logged in
    if ($this->session->userdata('user_id')) {
        // Get the user ID from the session
        $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->library('form_validation');

            // Set validation rules for the message field
            $this->form_validation->set_rules('message', 'Message', 'required');

            if ($this->form_validation->run() == TRUE) {
                // If validation passes, update the message in the database
                $this->load->model('User_model');

                $message = $this->input->post('message');

               if ($this->User_model->insert_next_message($user_id, $message)) {
                        $this->session->set_flashdata('success_message', 'Το μήνυμα αποθηκεύτηκε επιτυχώς.');
                    } else {
                        $this->session->set_flashdata('success_message', 'Έχετε ήδη εισάγει 3 μηνύματα. Δεν μπορείτε να προσθέσετε άλλο.');
                    }

                    redirect('submitenewmessage');
            }
        }
    } else {
        // Redirect the user to the login page or display an error message
        redirect('login');
    }
}


}
?>

