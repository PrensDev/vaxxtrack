<?php

class Auth_model extends CI_Model {
    
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

    // 403: Forbidden display
    public function forbidden() {
        set_status_header(403);
        $this->load_views('Error: 403 - Forbidden', [['error/403']]);
    }

    // 404: Page not found display
    public function page_not_found() {
        set_status_header(404);
        $this->load_views('Error: 404 - Page Not Found', [['error/404']]);
    }
}