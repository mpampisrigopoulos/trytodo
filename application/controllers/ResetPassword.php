<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {

    public function index($token = NULL) {
        if (!$token) {
            show_error('Μη έγκυρο αίτημα.');
        }

        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_token($token);

        if (!$user || strtotime($user['reset_token_expires']) < time()) {
            show_error('Το link έχει λήξει ή δεν είναι έγκυρο.');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Νέος Κωδικός', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Επιβεβαίωση Κωδικού', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['token'] = $token;
            $this->load->view('reset_password_form', $data);
        } else {
            $new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->User_model->update_password($user['email'], $new_password);
            // ✨ Εδώ καθαρίζουμε το token
            $this->User_model->clear_reset_token($user['email']);

            $this->session->set_flashdata('success', 'Ο κωδικός άλλαξε επιτυχώς.');
            redirect('login');
        }

    }
}
