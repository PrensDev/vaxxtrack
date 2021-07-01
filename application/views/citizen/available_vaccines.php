<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Available Vaccines',
        'subtitle' => 'Check the list of available vaccines'
    ]); ?>
    
    <!-- Vaccine List -->
    <div class="form-row" id="vaccineList">
        
        <div class="col-md-6 mb-4">
            <div class="card bg-success pl-1 h-100">
                <div class="card-body bg-white rounded-lg d-flex">
                    <div class="mr-3">
                        <div class="alert-success text-success flex-center rounded-lg" style="width: 4rem; height: 4rem;">
                            <h2><i class="fas fa-syringe"></i></h2>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="mb-1">Powerful Vaccine</h5>
                        <table class="table table-borderless table-sm small">
                            <tr>
                                <td>Vaccine Name</td>
                                <td class="font-weight-normal">PowerVax</td>
                            </tr>
                            <tr>
                                <td>Manufacturer</td>
                                <td class="font-weight-normal">The Manufacturer</td>
                            </tr>
                            <tr>
                                <td>Shots Details</td>
                                <td class="font-weight-normal">2 shots</td>
                            </tr>
                        </table>

                        <div class="mt-3 text-right">
                            <button class="btn btn-sm btn-success">More details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>