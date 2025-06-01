<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LostMyPassword extends CI_Controller {

    public function index() {
        $this->load->library('form_validation');
        $this->load->model('User_model');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('lostmypassword');
        } else {
            $email = $this->input->post('email');
            $user = $this->User_model->get_user_by_email($email);

            if ($user) {
                // Δημιουργία token
                $token = md5(uniqid(rand(), true));
                $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

                // Αποθήκευση token στη βάση
                $this->User_model->save_reset_token($email, $token, $expires);

                // Αποστολή email
                $reset_link = base_url("resetpassword/{$token}");

                $this->load->library('email');
                $this->email->from('your_email@gmail.com', 'TryToDo App');
                $this->email->to($email);
                $this->email->subject('Επαναφορά Κωδικού');
                $this->email->message("
                    <p>Λάβαμε αίτημα για επαναφορά του κωδικού σας.</p>
                    <p>Πατήστε τον παρακάτω σύνδεσμο για να δημιουργήσετε νέο κωδικό (ισχύει για 1 ώρα):</p>
                    <p><a href='{$reset_link}'>Επαναφορά Κωδικού</a></p>
                ");

                if (!$this->email->send()) {
                    log_message('error', 'Σφάλμα αποστολής email: ' . $this->email->print_debugger(['headers']));
                }

                $this->load->view('successpage'); 
            } else {
                $this->session->set_flashdata('error', 'Δεν βρέθηκε λογαριασμός με αυτό το email.');
                $this->load->view('lostmypassword');
            }
        }
    }
}
