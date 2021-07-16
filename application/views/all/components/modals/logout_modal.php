<!-- Log out modal -->
<div 
    class           = "modal" 
    id              = "logoutModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-sign-out-alt"></h5>
                <h5 class="modal-title">Log out</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    <div class="display-4 mr-3">
                        <img 
                            src="<?= base_url() ?>public/images/brand/warning.svg" 
                            alt="Warning" 
                            style="width: 8rem"
                            draggable="false"
                        >
                    </div>
                    <p>Are you sure you want to log out?</p>
                </div>
            </div>
            <div class="modal-footer bg-muted border-0 py-1">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="logoutBtn">
                    <span>Log out</span>
                    <i class="fas fa-sign-out-alt ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // When logout button is clicked
    $(document).on('click', '#logoutBtn', (e) => {
        var logoutBtn = $("#logoutBtn");

        // Make button disabled and add spinner
        logoutBtn.attr("disabled", true);
        logoutBtn.html(`<span class="spinner-border spinner-border-sm mx-3" role="status" aria-hidden="true"></span>`);
        
        // Make a request to logout using ajax
        e.preventDefault();
        requestLogout();
    });
</script>