<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * REGISTER CONTROLLER
 * ============================================================================= 
 */

class Register extends CI_Controller {

    /**
     * =============================================================================
     * CUSTOM-DEFINED METHODS
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "register";

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {

        // Load the header template
        $this->load->view('all/templates/header', ['title'=>$pageTitle]);

        // Load all of content views
        foreach($views as $view) {
            $viewPath = $this->dir . '/' . $view[0];
            $viewData = isset($view[1]) ? $view[1] : NULL;
            $this->load->view($viewPath, $viewData);
        }

        // Load the footer template
        $this->load->view('all/templates/footer');
    }

    /**
     * =============================================================================
     * VIEWS AND CONTROLLER METHODS
     * ============================================================================= 
     */

    // Index
    public function index() { redirect(); }

    // Register as Citizen page
    public function citizen(String $stepPage = NULL) {
        if ($stepPage == NULL) {
            redirect('register/citizen/step1_contactNumber');
        } else if ($stepPage == 'step1_contactNumber') {
            $this->load_views('Citizen', [['citizen/step1_contactNumber']]);
        } else if ($stepPage == 'step1_email') {
            $this->load_views('Citizen', [['citizen/step1_email']]);
        } else if ($stepPage == 'step1_verification') {
            $this->load_views('Citizen', [['citizen/step1_verification']]);
        } else if ($stepPage == 'step2') {
            $this->load_views('Citizen', [['citizen/step2']]);
        } else if ($stepPage == 'step3') {
            $this->load_views('Citizen', [['citizen/step3']]);
        } else if ($stepPage == 'step4') {
            $this->load_views('Citizen', [['citizen/step4']]);
        } else if ($stepPage == 'step5') {
            $this->load_views('Citizen', [['citizen/step5']]);
        } else if ($stepPage == 'success') {
            $this->load_views('Citizen', [['citizen/success']]);
        } else {
            $this->load->view('main/404');
        }
    }

    // Register as Representative page
    public function representative(String $stepPage = NULL) {
        if ($stepPage === NULL) {
            redirect('register/representative/step1_contactNumber');
        } else if ($stepPage === 'step1_contactNumber') {
            $this->load_views('Representative', [['representative/step1_contactNumber']]);
        } else if ($stepPage === 'step1_email') {
            $this->load_views('Representative', [['representative/step1_email']]);
        } else if ($stepPage === 'step1_verification') {
            $this->load_views('Representative', [['representative/step1_verification']]);
        } else if ($stepPage === 'step2') {
            $this->load_views('Representative', [['representative/step2']]);
        } else if ($stepPage === 'step3') {
            $this->load_views('Representative', [['representative/step3']]);
        } else if ($stepPage === 'step4') {
            $this->load_views('Representative', [['representative/step4']]);
        } else if ($stepPage === 'success') {
            $this->load_views('Representative', [['representative/success']]);
        } else {
            $this->load->view('main/404');
        }
    }
}