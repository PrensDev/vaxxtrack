<!-- Header -->
<?php $this->load->view('_components/register_header', ['registrant' => 'Establishment Representative']); ?>

<!-- Form for Representative details -->
<form 
    method  = "POST" 
    id      = "repStep3Form" 
    action  = "<?= base_url() ?>register/representative/step4"
    novalidate
>
    <div id="step3">

        <!-- First Name Field -->
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input 
                type  = "text" 
                class = "form-control" 
                name  = "firstName" 
                id    = "firstName" 
            >
        </div>
        
        <!-- Middle Name Field -->
        <div class="form-group">
            <label for="contact_number">Middle Name</label>
            <input 
                type  = "text" 
                class = "form-control" 
                name  = "middleName" 
                id    = "middleName" 
            >
        </div>

        <!-- Last Name Field -->
        <div class="form-group">
            <label for="contact_number">Last Name</label>
            <input
                type  = "text" 
                class = "form-control" 
                name  = "lastName" 
                id    = "lastName" 
            >
        </div>

        <!-- Position Field -->
        <div class="form-group">
            <label for="position">Position</label>
            <input 
                type  = "text" 
                class = "form-control" 
                name  = "position" 
                id    = "position" 
            >
        </div>

        <!-- Buttons -->
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
                </button>
            </div>
        </div>
    </div>
</form>

<!-- Footer -->
<?php $this->load->view('_components/register_footer') ?>
