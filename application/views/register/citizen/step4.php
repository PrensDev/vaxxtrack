<?php $this->load->view('_components/register_header_2', ["registrant" => "Citizen"]); ?>

<form 
    method  = "POST" 
    id      = "registerCznStep4Form" 
    action  = "<?= base_url() ?>register/citizen/step5"
>
    <div id="step1-Number">

        <!-- Region & Province Field -->
        <div class="form-row">

            <!-- Region Field -->
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="region">Region</label>
                    <input 
                        type  = "text" 
                        class = "form-control" 
                        name  = "region"
                        id    = "region"
                    >
                </div>
            </div>

            <!-- Province Field -->
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="province">Province</label>
                    <input 
                        type  = "text" 
                        class = "form-control" 
                        name  = "province"
                        id    = "province"
                    >
                </div>
            </div>
        </div>

        <!-- City/Municipality & Barangay/District Field-->
        <div class="form-row">

            <!-- City/Municipality Field -->
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="cityMunicipality">City/Municipality</label>
                    <input 
                        type  = "text" 
                        class = "form-control" 
                        name  = "cityMunicipality"
                        id    = "cityMunicipality"
                    >
                </div>
            </div>

            <!-- Barangay/District Field -->
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="baranggayDistrict">Baranggay/District</label>
                    <input 
                        type  = "text" 
                        class = "form-control" 
                        name  = "baranggayDistrict"
                        id    = "baranggayDistrict"
                    >
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="street">Street</label>
            <input 
                type  = "text" 
                class = "form-control" 
                name  = "street"
                id    = "street"
            >
        </div>

        <div class="form-group">
            <label for="specificLocation">House/Building No. or Block & Lot No.</label>
            <input 
                type  = "text" 
                class = "form-control" 
                id    = "specificLocation"
                name  = "specificLocation"
            >
        </div>

        <div class="form-row">
            <div class="col-6">
                <a 
                    href  = "<?= base_url() ?>register/citizen" 
                    class = "btn btn-muted btn-block"
                >
                    <i class="bi-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="col-6">
                <button
                    type  = "submit" 
                    class = "btn btn-blue btn-block"
                >
                    <span>Submit</span>
                    <i class="bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('_components/register_footer'); ?>
