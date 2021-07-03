<!-- Connection Error Modal -->
<div 
    class="modal" 
    id="successRegisterModal" 
    tabindex="-1" 
    data-backdrop="static"
    data-keyboard="false"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registration is Successful!</h5>
            </div>
            <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img 
                            class="w-75" 
                            src="<?= base_url() ?>public/images/brand/success.svg" 
                            alt="Server Down"
                            draggable="false"
                        >
                    </div>                
                    <div class="text-center mt-4">
                        <h5>You may now login to your account!</h5>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row w-100">
                    <div class="col-12 mb-2 mb-sm-0 col-sm-6 px-1">            
                        <a 
                            class = "btn btn-primary btn-block h-100" 
                            href  = "<?= base_url() ?>login"
                        >Go to Login</a>
                    </div>
                    <div class="col-12 mb-2 mb-sm-0 col-sm-6 px-1">            
                        <a 
                            class   = "btn btn-secondary btn-block h-100" 
                            href  = "<?= base_url() ?>"
                        >Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
