<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3">
            <div class="text-center mb-5">
                <h3 class="font-weight-bold">Reset your password</span></h3>
                <p>Please provide the following fields</p>
            </div>

<!-- Form form verification code -->
<form method="post" id="regCitizenForm" class="needs-validation" novalidate>
    <div id="step1-Number">
        <div class="form-group mb-5">
            <label for="verificationCode">Enter the verification code we sent to:</label>
            <h6 class="center">juandelacruz@gmail.com</h6>
            <input 
                type  = "number" 
                class = "form-control" 
                name  = "verificationCode"
                id    = "verificationCode" 
                min   = 100000
                max   = 999999
                required
            >
            <div class="invalid-feedback">This is a required field</div>

            <p class="mt-3">The code will expired in 03:00</p>
        </div>

        <div class="form-group">
            <a 
                href  = "<?= base_url() ?>auth/success" 
                class = "btn btn-success btn-block"
            >
                <span>Submit</span>
                <i class="bi-arrow-right ml-1"></i>
            </a>
            <a 
                href  = "<?= base_url() ?>auth/forgot_password"
                class = "btn btn-muted btn-block text-dark" 
                id    = "useEmailBtn"
            >                
                <i class="bi-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>
    </div>
</form>

<!-- Footer -->
<?php $this->load->view('_components/register_footer') ?>