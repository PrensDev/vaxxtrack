<?php $this->load->view('all/components/register_header', ["registrant" => "Citizen"]); ?>

<form 
    id     = "registerCznStep1ContactNoForm" 
    class  = "needs-validation"
    action = "<?= base_url()?>register/citizen/step1_verification"
>
    <div id="step1-Number">
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input 
                type  = "text" 
                class = "form-control" 
                id    = "contactNumber"
                name  = "contactNumber"
            >
        </div>

        <button
            type  = "submit" 
            class = "btn btn-blue btn-block"
        >
            <span>Submit</span>
            <i class="bi-arrow-right"></i>
        </button>
        <a 
            href="<?= base_url() ?>register/citizen/step1_email"
            class="btn btn-muted btn-block" 
            id="useEmailBtn"
        >Use my email instead</a>
    </div>
</form>

<div class="mt-5 text-center small">
    <a 
        href    = "<?= base_url() ?>login" 
        class   = "text-secondary"
    >I already have an account</a>
</div>

<?php $this->load->view('all/components/register_footer') ?>