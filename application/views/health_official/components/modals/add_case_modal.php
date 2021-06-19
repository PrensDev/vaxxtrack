<!-- Update Health Status Modal -->
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