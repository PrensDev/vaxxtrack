<!-- Register Modal -->
<div 
    class     = "modal fade" 
    id        = "registerModal" 
    tabindex  = "-1"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-sign-in-alt"></h5>
                <h5 class="modal-title">Register As</h5>
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
                <p>Choose the destination you want to proceed</p>
                <div class="row px-2 mb-2">
                    <div class="col-6 px-1">
                        <a 
                            href  = "<?= base_url() ?>register/citizen" 
                            class = "btn btn-outline-blue btn-large w-100 py-2 h-100"
                        >
                            <img 
                                src       = "<?= base_url() ?>public/images/brand/citizens.png" 
                                alt       = "Citizens" 
                                class     = "rounded border border-4 border-white w-100"
                                draggable = "false"
                            >
                            <div class="mt-2">Citizen</div>
                        </a>
                    </div>
                    <div class="col-6 px-1">
                        <a 
                            href  = "<?= base_url() ?>register/representative" 
                            class = "btn btn-outline-danger btn-large w-100 py-2 h-100"
                        >
                            <img 
                                src       = "<?= base_url() ?>public/images/brand/buildings.jpg" 
                                alt       = "Establishments" 
                                class     = "rounded border border-4 border-white w-100"
                                draggable = "false"
                            >
                            <div class="mt-2 text-wrap">Establishment Representative</div>
                        </a>
                    </div>
                </div>
                <hr>
                <button class="btn btn-block btn-muted btn-sm" data-dismiss="modal">I have an account</button>
            </div>
        </div>
    </div>
</div>