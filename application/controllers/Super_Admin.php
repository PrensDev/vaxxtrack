<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * SUPER ADMIN CONTROLLER
 * ============================================================================= 
 */

class Super_Admin extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED METHODS AND VARIABLES
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "super_admin";

    // AJAX Scripts
    private Array $AJAX_files = [
        'info',
    ];

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {

        // Check if the user is not a Super Admin based on session data
        if ($this->session->user_type !== 'Super Admin') {
            $this->Auth_model->page_not_found();
        } else {

            // Load the header template and other reusable views
            $this->load->view('all/templates/header', ['title'=>$pageTitle]);
            $this->load->view('all/components/modals/logout_modal');
            $this->load->view($this->dir . '/components/admin_header');
            
            // Load all the content views
            foreach($views as $view) {
                $viewPath = $this->dir . '/' . $view[0];
                $viewData = isset($view[1]) ? $view[1] : NULL;
                $this->load->view($viewPath, $viewData);
            }
            
            // Load the footer template and admin footer views
            $this->load->view('all/components/admin_footer');
            $this->load->view('all/templates/scripts', [
                'AJAX_files' => $this->AJAX_files,
                'dir'        => $this->dir,
            ]);
            $this->load->view('all/templates/footer');
        }
        
    }

    /**
     * =============================================================================
     * * VIEWS AND CONTROLLER METHODS
     * ============================================================================= 
     */

    // Index
    public function index() { redirect('admin'); }

    // Dashboard
    public function dashboard() {
        $this->load_views('Dashboard', [['dashboard']]);
    }

    // Heatmap
    public function heatmap_cases() {
        $this->load_views('Heatmap Cases', [['heatmap']]);
    }

    // User Management
    public function users(String $users_category) {
        if($users_category === 'citizens') {
            $this->load_views('User Management - Citizens', [
                ['users', ['user_category' => 'Citizens']]
            ]);
        } else if($users_category === 'establishment-representatives') {
            $this->load_views('User Management - Establishment Representatives', [
                ['users', ['user_category' => 'Establishment Representatives']]
            ]);
        } else if($users_category === 'health-officials') {
            $this->load_views('User Management - Health Officials', [
                ['users', ['user_category' => 'Health Officials']]
            ]);
        } else if($users_category === 'super-admins') {
            $this->load_views('User Management - Super Admins', [
                ['users', ['user_category' => 'Super Admins']]
            ]);
        } else {
            $this->Auth_model->page_not_found();
        }
    }

    // Edit Information
    public function edit_info() {
        $this->load_views('Edit Information', [['edit_info']]);
    }

    // Account Settings
    public function account_settings() {
        $this->load_views('Account Settings', [['account_settings']]);
    }
}
