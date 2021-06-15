<!-- QR Code Modal -->
<div 
    class           = "modal" 
    id              = "citizenQRCodeModal" 
    tabindex        = "-1" 
    aria-labelledby = "citizenQRCodeModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-qrcode modal-title-icon"></h5>
                <h5 class="modal-title">Your QR Code</h5>
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
            <div class="modal-body" id="QRCodeContainer">
                <div class="d-flex align-items-center justify-content-center" id="QRCodeContainer">
                    <div class="border rounded p-4" id="citizenQRCodeInModal"></div>
                </div>
                <p class="mt-3 mb-1 text-center">Use this QR Code when entering to any establishment for the purpose of COVID-19 Contact Tracing</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>