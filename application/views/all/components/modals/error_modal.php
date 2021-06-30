<!-- Connection Error Modal -->
<div 
    class="modal" 
    id="connErrorModal" 
    tabindex="-1" 
    data-backdrop="static"
    data-keyboard="false"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Error</h5>
            </div>
            <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img 
                            class="w-75" 
                            src="<?= base_url() ?>public/images/brand/server_down.svg" 
                            alt="Server Down"
                            draggable="false"
                        >
                    </div>                
                    <div class="text-center mt-4">
                        <h5 class="font-weight-normal">Oops! Something wrong just happened.</h5>
                        <div class="font-weight-bold">Error: <span id="connErrLog"></span></div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row w-100">
                    <div class="col-12 mb-2 mb-sm-0 col-sm-6 px-1">            
                        <button 
                            class   = "btn btn-primary btn-block h-100" 
                            onclick = "location.reload()"
                        >Refresh</button>
                    </div>
                    <div class="col-12 col-sm-6 px-1">
                        <a 
                            href   = "<?= base_url() ?>help" 
                            class  = "btn btn-secondary btn-block h-100" 
                            target = "_blank"
                        >Visit our help center</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fetch Error Modal -->
<div 
    class="modal" 
    id="fetchErrorModal" 
    tabindex="-1" 
    data-backdrop="static"
    data-keyboard="false"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Error</h5>
            </div>
            <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img 
                            class     = "w-75" 
                            src       = "<?= base_url() ?>public/images/brand/session_expired.svg" 
                            alt       = ""
                            draggable = "false"
                        >
                    </div>                
                    <div class="text-center mt-4">
                        <h5 class="font-weight-normal">Oops! Something wrong just happened.</h5>
                        <div class="font-weight-bold">Error: <span id="fetchErrLog"></span></div>
                    </div>
            </div>
            <div class="modal-footer">   
                <button 
                    class = "btn btn-danger btn-block" 
                    id    = "logoutBtnInErrorModal"
                >Log out</button>
            </div>
        </div>
    </div>
</div>

<script>
    // When logout button is clicked
    $(document).on('click', '#logoutBtnInErrorModal', (e) => {
        var logoutBtn = $("#logoutBtnInErrorModal");

        // Make button disabled and add spinner
        logoutBtn.attr("disabled", true);
        logoutBtn.html(`
            <span class="spinner-border spinner-border-sm mx-3" role="status" aria-hidden="true"></span>
        `);
        
        // Make a request to logout using ajax
        e.preventDefault();
        requestLogout();
    });
</script>