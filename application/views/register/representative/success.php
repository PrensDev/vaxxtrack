<!-- Success Message -->
<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3">
            <div class="text-center mb-5">
                <h1 class="display-1 text-success">
                    <i class="bi-check-circle-fill"></i>
                </h1>
                <h1>Success!</h1>
                <p>You may now log in to your account</p>
            </div>

            <div class="row">
                <div class="col-6">
                    <a 
                        href  = "<?= base_url() ?>" 
                        class = "btn btn-muted text-dark btn-block"
                    >Back to Home page</a>
                </div>
                <div class="col-6">
                    <a 
                        href  = "<?= base_url() ?>login" 
                        class = "btn btn-success btn-block"
                    >
                        <span>Log in</span>
                        <i class="fas fa-sign-in-alt ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>