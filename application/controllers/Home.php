<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * HOME CONTROLLER
 * ============================================================================= 
 */

class Home extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED METHODS
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "home";
    
    // AJAX Scripts
    private Array $AJAX_files = ['login'];

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {

        // Load the header template
        $this->load->view('all/templates/header', ['title'=>$pageTitle]);

        // Load all the content views
        foreach($views as $view) {
            $viewPath = $this->dir . '/' . $view[0];
            $viewData = isset($view[1]) ? $view[1] : NULL;
            $this->load->view($viewPath, $viewData);
        }

        // Load the scripts and footer template
        $this->load->view('all/templates/footer', [
            'AJAX_files' => $this->AJAX_files,
            'dir'        => $this->dir,
        ]);
    }

    /**
     * =============================================================================
     * * VIEWS AND CONTROLLER METHODS
     * ============================================================================= 
     */

    // Index page
    public function index() {
        if($this->session->has_userdata('user_type')) {
            $user_type = $this->session->user_type;
            if($user_type === 'Citizen')         redirect('c');
            if($user_type === 'Representative')  redirect('r');
            if($user_type === 'Health Official') redirect('h');
            if($user_type === 'Super Admin')     redirect('admin');
        } else {
            $this->load_views('Welcome to C19CTAVMS', [
                ['components/main_navbar'],
                ['index'],
                ['components/main_footer'],
            ]);
        }
    }

    // Data Privacy
    public function data_privacy() {
        $this->load_views('Data Privacy', [
            ['components/main_navbar'],
            ['data_privacy'],
            ['components/main_footer'],
        ]);
    }

    // About Us
    public function about_us() {
        $this->load_views('About Us', [
            ['components/main_navbar'],
            ['about_us'],
            ['components/main_footer'],
        ]);
    }

    // Terms and Conditions
    public function terms_and_conditions() {
        $this->load_views('Terms and Conditions', [
            ['components/main_navbar'],
            ['terms_and_conditions'],
            ['components/main_footer'],
        ]);
    }

    // Login
    public function login() {
        if($this->session->has_userdata('user_type')) {
            $user_type = $this->session->user_type;
            if($user_type === 'Citizen')         redirect('c');
            if($user_type === 'Representative')  redirect('r');
            if($user_type === 'Health Official') redirect('h');
            if($user_type === 'Super Admin')     redirect('admin');
        } else {
            $this->load_views('Login', [
                ['components/modals/register_modal'],
                ['login'],
            ]);
        }
    }

    // Sessioned Alert
    public function alert() {
        if($this->input->is_ajax_request()) {
            $theme = $this->input->post('theme');
            $message = $this->input->post('message');

            $this->session->set_flashdata('alert', true);
            $this->session->set_flashdata('alertTheme', $theme);
            $this->session->set_flashdata('alertMessage', $message);
        } else {
            $this->Auth_model->page_not_found();
        }
    }

}