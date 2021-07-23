<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * HEALTH OFFICIAL CONTROLLER
 * ============================================================================= 
 */

class Health_Official extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED VARIABLES AND METHODS
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "health_official";

    // AJAX Scripts
    private Array $AJAX_files = [
        'account',
        'lab_report',
        'covid_cases',
        'contacts',
        'vaccination',
        'info',
    ];

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {

        // Check the user type if Health Official based on session data
        if ($this->session->user_type !== 'Health Official') {
            $this->Auth_model->page_not_found();
        } else {

            // Load the header template and admin header views
            $this->load->view('all/templates/header', ['title'=>$pageTitle]);
            $this->load->view('all/components/modals/logout_modal');
            $this->load->view($this->dir . '/components/admin_header');
            
            // Load all the content views
            foreach($views as $view) {
                $viewPath = $this->dir . '/' . $view[0];
                $viewData = isset($view[1]) ? $view[1] : NULL;
                $this->load->view($viewPath, $viewData);
            }
            
            // Load the admin footer views, scripts, and footer template
            $this->load->view('all/components/admin_footer');
            $this->load->view('all/templates/footer',  [
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

    // Dashboard
    public function dashboard() {
        $this->load_views('Dashboard', [['dashboard']]);
    }

    // Edit Information
    public function edit_info() {
        $this->load_views('Edit your information', [['edit_info']]);
    }

    // Account Settings
    public function account_settings() {
        $this->load_views('Account Settings', [
            ['components/modals/account_settings_modals'],
            ['account_settings']
        ]);
    }

    // COVID-19 Cases
    public function cases() {
        $this->load_views('COVID-19 Cases', [
            ['components/modals/case_modals'],
            ['cases'],
        ]);
    }

    // Add New Case
    public function add_new_case() {
        $this->load_views('Add New Case', [
            ['components/modals/add_case_modal'],
            ['add_new_case'],
        ]);
    }

    // Heatmap
    public function heatmap() {
        $this->load_views('COVID-19 Cases Heatmap', [['heatmap']]);
    }

    // Contacts
    public function contacts() {
        $this->load_views('COVID-19 Contacts', [
            ['components/modals/contacts_modals'],
            ['contacts']
        ]);
    }

    // Vaccination Records
    public function vaccination_records() {
        $this->load_views('Vaccination Records', [
            ['components/modals/vacc_record_modals'],
            ['vacc_records'],
        ]);
    }

    // Add Vaccination Record
    public function add_vacc_record() {
        $this->load_views('Add Vaccination Records', [
            ['components/modals/add_vacc_record_modals'],
            ['add_vacc_record'],
        ]);
    }

    // Vaccination Appointments
    public function vaccination_appointments() {
        $this->load_views('Vaccination Appointments', [
            ['components/modals/vacc_appointment_modals'],
            ['vacc_appointments'],
        ]);
    }

    // Vaccines
    public function vaccines() {
        $this->load_views('Vaccines', [
            ['components/modals/vaccines_modals'],
            ['vaccines']
        ]);
    }
}
