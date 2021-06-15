<!-- Header -->
<?php $this->load->view('_components/register_header', ['registrant' => 'Establishment Representative']) ?>

<!-- Register Representative - Step 2: Establishment details -->
<form 
    method  = "POST" 
    id      = "registerRepStep2Form"
    action  = "<?= base_url() ?>register/representative/step3"
>
    <div id="step1-Number">
        <div class="form-group">
            <label for="establishmentName">Name of your establishment</label>
            <input 
                type  = "text" 
                class = "form-control" 
                id    = "establishmentName" 
                name  = "establishmentName"
            >
        </div>

        <div class="form-group">
            <label for="establishmentType">Type of establishment</label>
            <select 
                class       = "selectpicker form-control border" 
                name        = "establishmentType" 
                id          = "establishmentType"
                title       = "Please select a type for establishment"
                data-style  = "btn-white"
            >
                <option value="Company">Company</option>
                <option value="Business">Business</option>
                <option value="Village/Household">Village/Household</option>
                <option value="LGU">LGU</option>
                <option value="Organizational">Organizational</option>
            </select>
        </div>

        <div class="form-row">
            <div class="col-6">
                <a 
                    href  = "<?= base_url() ?>register/representative" 
                    class = "btn btn-muted text-dark btn-block"
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
                </a>
            </div>
        </div>
    </div>
</form>

<!-- Footer -->
<?php $this->load->view('_components/register_footer') ?>
