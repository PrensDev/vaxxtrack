<!-- QR Scanner Modal -->
<div 
    class           = "modal" 
    id              = "scanQRCodeModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "scanQRCodeModal" 
    aria-hidden     = "true"
>
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-camera"></h5>
                <h5 class="modal-title">Scan</h5>
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

                <!-- Visiting Purpose Field -->
                <form>
                    <div class="form-group">
                        <label for="position">Purpose of visiting</label>
                        <select 
                            name        = "visitPurpose" 
                            id          = "visitPurpose" 
                            class       = "selectpicker form-control border"
                            data-style  = "btn btn-outline-primary"
                        >
                            <optgroup label="GENERAL">
                                <option value="Visiting" selected>Visiting</option>
                            </optgroup>
                            <optgroup label="BUSINESS">
                                <option value="Customer">Customer</option>
                                <option value="Employee">Employee</option>
                                <option value="Meeting">Meeting</option>
                            </optgroup>
                            <optgroup label="RESIDENTIAL">
                                <option value="Resident">Resident</option>
                            </optgroup>
                            <optgroup label="OTHERS">
                                <option value="Organizational Member">Organizational Member</option>
                                <option value="Others">Others</option>
                            </optgroup>
                        </select>
                    </div>
                </form>

                <!-- QR Code Scanner -->
                <div class="mt-4 mb-3 d-flex justify-content-center align-items-center">
                    <!-- <video id="QRCodeScanner"></video> -->
                    <div id="QRCodeReader" width="600px"></div>
                </div>
                <p>Use this camera to scan QR Code of someone who are going to visit your establishment</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-block">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="module">
    // Scanner Instance
    let scanner = new Html5QrcodeScanner("QRCodeReader", { fps: 30, qrbox: 250 }, false);

    // On success scan
    const onScanSuccess = (qrMessage) => {
        console.log(`Data: ${ qrMessage }`);
    }

    // On failed scan
    const onScanFailure = (error) => {
        // console.warn(`QR error = ${error}`);
    }

    // Render the scanner
    scanner.render(onScanSuccess, onScanFailure);
</script>