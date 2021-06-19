<div class="container px-3 py-4">
    
    <?php $this->load->view('all/components/header_title', [
        'title' => 'Vaccination Appointments',
        'subtitle' => 'Manage the list of vaccination appointments here'
    ]); ?>

    <!-- Vaccination Appointments Summary -->
    <?php $this->load->view('all/components/vaccinated_summary'); ?>

</div>