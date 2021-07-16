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
        'account',
        'covid_cases',
        'vaccination',
        'info',
        'users'
    ];

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {

        // Check if the user is not a Super Admin based on session data
        if ($this->session->user_type !== 'Super Admin') {
            $this->Auth_model->page_not_found();
        } else {

            // Load the header template and other reusable views
            $this->load->view('all/templates/header', ['title' => $pageTitle]);
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
            $this->load->view('all/templates/footer', [
                'AJAX_files' => $this->AJAX_files,
                'dir'        => $this->dir,
            ]);
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

    // Dashboard
    public function registered_establishments() {
        $this->load_views('Registered Establishements', [['registered_establishments']]);
    }

    // COVID-19 Cases
    public function covid_cases() {
        $this->load_views('COVID-19 Cases', [['covid_cases']]);
    }

    // Heatmap
    public function heatmap_cases() {
        $this->load_views('COVID-19 Heatmap Cases', [['heatmap']]);
    }

    // User Management
    public function users(String $users_category) {
        if($users_category === 'citizens') {
            $this->load_views('User Management - Citizens', [
                ['components/modals/citizens_modals'],
                ['users', ['user_category' => 'Citizens']]
            ]);
        } else if($users_category === 'establishment-representatives') {
            $this->load_views('User Management - Establishment Representatives', [
                ['components/modals/representatives_modals'],
                ['users', ['user_category' => 'Establishment Representatives']]
            ]);
        } else if($users_category === 'health-officials') {
            $this->load_views('User Management - Health Officials', [
                ['components/modals/health_officials_modals'],
                ['users', ['user_category' => 'Health Officials']]
            ]);
        } else if($users_category === 'super-admins') {
            $this->load_views('User Management - Super Admins', [
                ['components/modals/super_admins_modals'],
                ['users', ['user_category' => 'Super Admins']]
            ]);
        } else {
            $this->Auth_model->page_not_found();
        }
    }

    // Register User
    public function register($user) {
        if($user === 'health-official') {
            $this->load_views('Register a Health Official', [['register_health_official']]);
        } else if($user === 'super-admin') {
            $this->load_views('Register a Super Admin', [['register_super_admin']]);
        } else {
            $this->Auth_model->page_not_found();
        }
    }

    // Vaccination Record
    public function vacc_records() {
        $this->load_views('Vaccination Records', [
            ['components/modals/vacc_records_modals'],
            ['vacc_records'],
        ]);
    }

    // Vaccination Appointments
    public function vacc_appointments() {
        $this->load_views('Vaccination Appointments', [
            ['components/modals/vacc_appointments_modals'],
            ['vacc_appointments']
        ]);
    }

    // Vaccines
    public function vaccines() {
        $this->load_views('Vaccines', [
            ['components/modals/vaccines_modals'],
            ['vaccines'],
        ]);
    }

    // Edit Information
    public function edit_info() {
        $this->load_views('Edit Information', [['edit_info']]);
    }

    // Account Settings
    public function account_settings() {
        $this->load_views('Account Settings', [
            ['components/modals/account_settings_modals'],
            ['account_settings']
        ]);
    }
}
