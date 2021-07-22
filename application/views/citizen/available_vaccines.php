<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Available Vaccines',
        'subtitle' => 'Check the list of available vaccines'
    ]); ?>
    
    <div id="alertContainer"></div>
    
    <!-- Vaccine List -->
    <div class="form-row" id="vaccineList">
        <div class="col-12 p-5 text-secondary text-center">No vaccine are available yet</div>
    </div>
</div>