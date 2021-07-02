<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * CITIZEN CONTROLLER
 * ============================================================================= 
 */

class Citizen extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED METHODS
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "citizen";

    // AJAX Scripts
    private Array $AJAX_files = [
        'account',
        'health_status_logs',
        'info',
        'vaccination',
    ];

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views) {
        
        // Check the user type if Health Official based on session data
        if ($this->session->user_type !== 'Citizen') {
            $this->Auth_model->page_not_found();
        } else {

            // Load the header template and admin header views
            $this->load->view('all/templates/header', ['title'=>$pageTitle]);
            $this->load->view('all/components/modals/logout_modal');
            $this->load->view($this->dir . '/components/modals/scan_qrcode_modal');
            $this->load->view($this->dir . '/components/admin_header');
            $this->load->view($this->dir . '/components/modals/health_status_modals');
            
            // Load all the content views
            foreach($views as $view) {
                $viewPath = $this->dir . '/' . $view[0];
                $viewData = isset($view[1]) ? $view[1] : NULL;
                $this->load->view($viewPath, $viewData);
            }
            
            // Load the admin footer view, scripts, and footer template
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
    public function index() { redirect('c'); }

    // Profile
    public function profile() {        
        $this->load_views('Profile', [
            ['components/modals/citizen_qrcode_modal'],
            ['profile']
        ]);
    }

    // Edit Information
    public function edit_info() {        
        $this->load_views('Edit your information', [['edit_info']]);
    }

    // Account Settings
    public function account_settings() {        
        $this->load_views('Account Settings', [['account_settings']]);
    }

    // Health Status Logbook
    public function health_status() {
        $this->load_views('Health Status Logbook', [
            ['health_status'],
        ]);
    }

    // Visiting Logbook
    public function visiting_logbook() {
        $this->load_views('Visiting Logbook', [
            ['components/modals/visiting_log_modals'],
            ['visiting_logbook']
        ]);
    }

    // Vaccination Card
    public function vaccination_card() {
        $this->load_views('Vaccination Card', [['vacc_card']]);
    }

    // Vaccination Appointment 
    public function vaccination_appointments() {
        $this->load_views('Vaccination Appointments', [
            ['components/modals/appointments_modals.php'],
            ['vacc_appointments']
        ]);
    }

    // Create Appointment
    public function create_appointment() {
        $this->load_views('Create Appointment for Vaccination', [
            ['components/modals/create_appointment_modals'],
            ['create_appointment'],
        ]);
    }

    // Availbale Vaccines
    public function available_vaccines() {
        $this->load_views('Available Vaccines', [
            ['components/modals/vaccines_modals'],
            ['available_vaccines']
        ]);
    }
}