<?php $this->load->view('_components/register_header', ["registrant" => "Citizen"]); ?>

<!-- Register Citizen - Step3 Form -->
<form 
    method  = "POST" 
    id      = "registerCznStep3Form" 
    action  = "<?= base_url() ?>register/citizen/step4"
>
    <div id="step3">

        <!-- Sex Field -->
        <div class="form-group">
            <label for="sex">Sex</label>
            <select 
                class       = "selectpicker form-control border" 
                name        = "sex" 
                id          = "sex"
                title       = "Choose your sex"
                data-style  = "btn-white"
            >
                <option value="F" data-icon="fas fa-venus icon-container text-danger">
                    <span>Female</span>
                </option>
                <option value="M" data-icon="fas fa-mars icon-container text-blue">
                    <span>Male</span>
                </option>
            </select>
        </div>

        <!-- Dare of Birth Field -->
        <div class="form-group">
            <label for="contact_number">Date of Birth</label>
            <input 
                type  = "date" 
                class = "form-control" 
                id    = "dateOfBirth"
                name  = "dateOfBirth"
            >
        </div>

        <!-- Civil Status Field -->
        <div class="form-group">
            <label for="civilStatus">Civil Status</label>
            <select 
                class       = "selectpicker form-control border" 
                name        = "civilStatus" 
                id          = "civilStatus"
                title       = "Choose your current civil status"
                data-style  = "btn-white"
            >
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Separated">Separated</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
                <option value="Civil Partnership">Civil Partnership</option>
                <option 
                    value        = "Former Civil Partner" 
                    data-subtext = "(in a civil partnership that has ended by death or been dissolved)"
                >Former Civil Partner</option>
            </select>
        </div>

        <!-- User Controls -->
        <div class="form-row">
            <div class="col-6">
                <a 
                    href  = "<?= base_url() ?>register/citizen/step2" 
                    class = "btn btn-muted btn-block"
                >
                    <i class="bi-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
            <div class="col-6">
                <button
                    href  = "submit" 
                    class = "btn btn-blue btn-block"
                >
                    <span>Submit</span>
                    <i class="bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</form>
<?php $this->load->view('_components/register_footer') ?>
