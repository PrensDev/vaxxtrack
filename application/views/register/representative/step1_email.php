<!-- Header -->
<?php $this->load->view('_components/register_header', ["registrant" => "Establishment Representative"]); ?>

<!-- Register Representative - Step 1: Email -->
<form 
    method  = "POST" 
    id      = "registerRepStep1EmailForm" 
    action  = "<?= base_url() ?>register/representative/step1_verification"
>
    <div id="step1-Number">
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type    = "text" 
                class   = "form-control"
                id      = "email" 
                name    = "email" 
            >
        </div>

        <div class="form-group">
            <button
                type  = "submit" 
                class = "btn btn-blue btn-block"
            >
                <span>Submit</span>
                <i class="bi-arrow-right"></i>
            </button>
            <a 
                href  = "<?= base_url() ?>register/representative/step1_contactNumber"
                class = "btn btn-muted btn-block text-dark" 
                id    = "useContactBtn"
            >Use my contact number instead</a>
        </div>
    </div>
</form>

<!-- Link for users have account -->
<div class="mt-5 text-center small">
    <a 
        href    = "<?= base_url() ?>" 
        class   = "text-secondary"
    >I already have an account</a>
</div>

<!-- Footer -->
<?php $this->load->view("_components/register_footer") ?> 