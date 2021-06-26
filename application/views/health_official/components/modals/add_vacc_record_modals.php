<!-- Search Registered Citizen Modal -->
<div 
    class           = "modal" 
    id              = "searchCitizenModal" 
    tabindex        = "-1" 
    aria-labelledby = "searchCitizenModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-user-tag modal-title-icon"></h5>
                <h5 class="modal-title">Search Registered Citizen</h5>
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
                <label for="searchCitizen">Type the ID or Name of Citizen here</label>
                <form class="form-row">
                    <div class="col-10 ml-0">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mr-0">
                        <button
                            class          = "btn btn-secondary btn-block"
                            data-toggle    = "tooltip"
                            data-placement = "bottom"
                            title          = "Scan QR Code"
                        >
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reset Fields -->
<div 
    class    = "modal" 
    id       = "resetCitizenFieldsModal" 
    tabindex = "-1" 
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-eraser modal-title-icon"></h5>
                <h5 class="modal-title">Clear Fields</h5>
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
                    <p id="resetMessage">Are you sure you want to clear fields for patient's information</p>
                </div>
            </div>
            <div class="modal-footer">
                <button 
                    type="button" 
                    class="btn btn-muted" 
                    data-dismiss="modal"
                >Cancel</button>
                <button 
                    type="button" 
                    class="btn btn-danger" 
                    id="resetCitizenFields"
                    data-dismiss="modal"
                >
                    <span>Clear</span>
                    <i class="fas fa-eraser ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>