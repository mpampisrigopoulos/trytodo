<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewAccount extends CI_Controller {

    public function index() {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the form view
            $this->load->view('newaccount');
        } else {
            // If validation succeeds, insert data into the database
            $this->load->model('User_model');

            $data = array(
                'first_name' => $this->input->post('name'),
                'last_name' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            // Call the method in your model to insert data
            if ($this->User_model->create_user($data)) {

                $this->load->library('email');           // Αυτόματα φορτώνει το config από email.php
                $this->email->from('kappakouppas@gmail.com', 'TryToDo App');
                $this->email->to($data['email']);
                $this->email->subject('Επιβεβαίωση Εγγραφής');
                $this->email->message("<p>Καλώς ήρθατε στο TryToDo!</p><p>Ο λογαριασμός σας δημιουργήθηκε με επιτυχία.</p>");

              if (!$this->email->send()) {
                  log_message('error', 'Σφάλμα αποστολής email: ' . $this->email->print_debugger(['headers']));
                }

                // Redirect to success page or any other page
                redirect('successpage');
            } else {
                // If insertion fails, show an error message or redirect to an error page
                redirect('error_page');
            }
        }
    }
}
?>
