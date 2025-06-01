<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuccessPage extends CI_Controller {

    public function index() {
        // Load the myprofile view
        $this->load->view('successpage');
    }
}