<?php $this->load->view('_components/register_header', ["registrant" => "Citizen"]); ?>

<!-- Alert box for wrong verification code -->
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="accountNotFoundAlert">
    <span>
        <i class="bi-exclamation-octagon mr-1 text-danger"></i>
        <span>Invalid verification code</span>
    </span>
    <button class="close" data-dismiss="alert">
        <i class="bi-x"></i>
    </button>
</div>

<form 
    method = "post" 
    id     = "registerCznStep1VerificationForm" 
    class  = "needs-validation"
    action = "<?= base_url() ?>register/citizen/step2"
>
    <div id="step1-Number">
        <div class="form-group mb-5">
            <label for="verificationCode">Enter the verification code we sent</label>
            <b>juandelacruz@gmail.com</b>
            <input 
                type  = "number" 
                class = "form-control" 
                name  = "verificationCode"
                id    = "verificationCode" 
                min   = 100000
                max   = 999999
                required
            >
        </div>
        <p class="mt-3">The code will expired in <b id="timeleft">03:00</b></p>

        <button
            type  = "submit" 
            class = "btn btn-success btn-block"
        >
            <span>Submit</span>
        </button>
        <a 
            href  = "<?= base_url() ?>register/citizen"
            class = "btn btn-muted btn-block" 
            id="useEmailBtn"
        >                
            <i class="bi-arrow-left"></i>
            <span>Back</span>
        </a>
    </div>
</form>

<?php $this->load->view('_components/register_footer') ?>