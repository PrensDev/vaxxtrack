<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * REPRESENTATIVE CONTROLLER
 * ============================================================================= 
 */

class Representative extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED METHODS AND VARIABLES
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "representative";

    // AJAX Scripts
    private Array $AJAX_files = [
        'account',
        'establishment',
        'info',
    ];

    // Load Views Method
    // This load the header and the footer templates automatically when called
    private function load_views(String $pageTitle, Array $views, Array $data = NULL) {
        
        // Check if user is not Representative based on session data
        if ($this->session->user_type !== 'Representative') {
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

    // Index Page
    public function index() { redirect('r'); }

    // Dashboard
    public function dashboard() {
        $this->load_views('Dashboard', [['dashboard']]);
    }

    // Establishment
    public function establishment($establishment_ID = NULL) {
        if($establishment_ID === NULL) {
            $this->Error_model->page_not_found();
        } else {
            $this->load_views('Establishment', [
                ['components/modals/establishment_modals'],
                ['components/modals/visiting_logs_modals'],
                ['visiting_logs']
            ]);
        }
    }
    
    // Add establishment
    public function add_establishment() {
        $this->load_views('Add Establishment', [['add_establishment']]);
    }

    // Edit establishment
    public function edit_establishment($establishment_ID = NULL) {
        if($establishment_ID === NULL) {
            $this->Auth_model->page_not_found();
        } else {
            $this->load_views('Edit Establishment', [['edit_establishment']]);
        }
    }

    // Manage representatives
    public function manage_representatives($establishment_ID = NULL) {
        if($establishment_ID === NULL) {
            $this->Auth_model->page_not_found();
        } else {
            $this->load_views('Manage Representatives', [['manage_representatives']]);
        }
    }

    // Add representative
    public function add_representative($establishment_ID = NULL) {
        if($establishment_ID === NULL) {
            $this->Auth_model->page_not_found();
        } else {
            $this->load_views('Add Representative', [['add_representative']]);
        }
    }

    // Edit representative
    public function edit_representative($establishment_ID = NULL, $representative_ID = NULL) {
        if($establishment_ID === NULL || $representative_ID === NULL) {
            $this->Auth_model->page_not_found();
        } else {
            $this->load_views('Edit Representative', [['edit_representative']]);
        }
    }

    // Edit Infromation
    public function edit_info() {
        $this->load_views('Edit Information', [['edit_info']]);
    }

    // Account Settings
    public function account_settings() {
        $this->load_views('Account Settings', [
            ['components/account_settings_modal'],
            ['account_settings']
        ]);
    }
}