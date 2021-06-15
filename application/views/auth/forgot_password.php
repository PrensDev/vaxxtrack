<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3">
            <div class="text-center mb-5">
                <h3 class="font-weight-bold">Reset your password</span></h3>
                <p>Please provide the following fields</p>
            </div>

            <!-- Alert box for non-existing account -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span>
                    <i class="bi-exclamation-octagon mr-1 text-danger"></i>
                    <span>That account does not exist.</span>
                </span>
                <button class="close" data-dismiss="alert">
                    <i class="bi-x"></i>
                </button>
            </div>

            <form method="post" id="regRepresentativeForm" class="needs-validation" novalidate>
                <div id="step1-Number">
                    <div class="form-group">
                        <label for="userCredentials">Please enter your Contact Number or Email</label>
                        <input 
                            type    = "text" 
                            class   = "form-control"
                            id      = "userCredentials" 
                            name    = "userCredentials" 
                            required
                        >
                        <div class="invalid-feedback">This is a required field</div>
                    </div>

                    <a 
                        href    = "<?= base_url()?>auth/verification" 
                        class   = "btn btn-primary btn-block"
                    >
                        <span>Submit</span>
                        <i class="bi-arrow-right"></i>
                    </a>
                    <button 
                        class="btn btn-muted btn-block"
                    >I can't remember my account details</button>
                </div>
            </form>

            <div class="mt-5 text-center small">
                <a 
                    href    = "<?= base_url() ?>login" 
                    class   = "text-secondary"
                >Go to login page</a>
            </div>

            <hr>

            <?php $this->load->view("all/components/form_footer") ?> 
        </div>
    </div>
</div>