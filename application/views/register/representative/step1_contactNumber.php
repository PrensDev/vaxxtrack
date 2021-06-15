<?php $this->load->view('_components/register_header', ["registrant" => "Establishment Representative"]); ?>

<!-- Register a Representative Form - Step1: Contact Number -->
<form 
    method  = "POST" 
    id      = "registerRepStep1ContactNoForm" 
    action  = "<?= base_url()?>register/representative/step1_verification"
>
    <div id="step1-Number">
        <div class="form-group">
            <label for="contactNumber">Contact Number</label>
            <input 
                type    = "text" 
                class   = "form-control"
                id      = "contactNumber" 
                name    = "contactNumber" 
            >
        </div>

        <button
            type    = "submit" 
            class   = "btn btn-blue btn-block"
        >
            <span>Submit</span>
            <i class="bi-arrow-right"></i>
        </button>
        <a 
            href    = "<?= base_url() ?>register/representative/step1_email"
            class   = "btn btn-muted btn-block text-dark" 
            id      = "useEmailBtn"
        >Use my email instead</a>
    </div>
</form>

<div class="mt-5 text-center small">
    <a 
        href    = "<?= base_url() ?>representative/login" 
        class   = "text-secondary"
    >I already have an account</a>
</div>

<?php $this->load->view("_components/register_footer") ?> 