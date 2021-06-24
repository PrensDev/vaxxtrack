<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * AUTH CONTROLLER
 * ============================================================================= 
 */

class Auth extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED CONTROLLER
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "auth";

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {
        
        // Load the header template
        $this->load->view('all/templates/header', ['title'=>$pageTitle]);

        // Load the content views
        foreach($views as $view) {
            $viewPath = $this->dir . '/' . $view[0];
            $viewData = isset($view[1]) ? $view[1] : NULL;
            $this->load->view($viewPath, $viewData);
        }

        // Load the footer templates
        $this->load->view('all/templates/footer');
    }

    /**
     * =============================================================================
     * * VIEWS AND CONTROLLER METHODS
     * ============================================================================= 
     */

    // oAuth - For user authentication
    public function oAuth() {

        // Get url parameters
        $params = $this->input->get();
        
        // Check if parameters are null
        if ($params == null) {
            $this->Auth_model->page_not_found();
        } else {

            // Save parameter data to session
            $this->session->set_userdata([
                'token'     => $params['token'],
                'user_ID'   => $params['user_ID'],
                'user_type' => $params['user_type']
            ]);

            // Get the user_type from session
            $user_type = $this->session->user_type;

            // Redirect to page according to user_type
            if ($user_type === 'Citizen')         redirect('c');
            if ($user_type === 'Representative')  redirect('r');
            if ($user_type === 'Health Official') redirect('h');
            if ($user_type === 'Super Admin')     redirect('admin');
        }
    }

    // Forgot password
    public function forgot_password() {
        $this->load_views('Forgot Password', [['forgot_password']]);
    }

    // Verification
    public function verification() {
        $this->load_views('Verify your account', [['verification']]);
    }

    // Confirm Password
    public function confirm_password() {
        $this->load_views('Confirm Password', [['confirm_password']]);
    }

    // Success
    public function success() {
        $this->load_views('Success', [['success']]);
    }

    // 403: Forbidden display
    public function forbidden() {
        $this->Auth_model->forbidden();
    }

    // 404: Page not Found display
    public function page_not_found() {
        $this->Auth_model->page_not_found();
    }
    
    // Log out
    public function logout() {
        if($this->session->has_userdata('user_type') && $this->input->post('request') === 'logout')
            session_destroy();
        else
            $this->page_not_found();
    }
}