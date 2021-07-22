<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * =============================================================================
 * * REGISTER CONTROLLER
 * ============================================================================= 
 */

class Register extends CI_Controller {

    /**
     * =============================================================================
     * * CUSTOM-DEFINED METHODS
     * ============================================================================= 
     */

    // Directory Folder of Views
    private String $dir = "register";

    // AJAX Scripts
    private Array $AJAX_files = ['register'];

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
        $this->load->view('all/templates/footer', [
            'AJAX_files' => $this->AJAX_files,
            'dir'        => 'home',
        ]);
    }

    /**
     * =============================================================================
     * * VIEWS AND CONTROLLER METHODS
     * ============================================================================= 
     */

    // Index
    public function index() { redirect(); }

    // Register as Citizen
    public function citizen() {
        $this->load_views('Citizen Registration', [
            ['components/modals/register_modals'],
            ['citizen'],
        ]);
    }

    // Register as Establishment Representative
    public function representative() {
        $this->load_views('Establishment Representative Registration', [
            ['components/modals/register_modals'],
            ['representative']
        ]);
    }
}