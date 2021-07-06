<!-- QR Scanner Modal -->
<div class="modal" id="scanQRCodeModal" tabindex="-1" data-backdrop="static">
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
                <div class="form-group">
                    <label for="position">Please select the right purpose of visit first before scan</label>
                    <select 
                        name="visitPurpose" 
                        id="visitPurpose" 
                        class="selectpicker form-control border"
                        data-style="btn btn-outline-primary"
                        data-size="6"
                        data-live-search="true"
                        title="Select the purpose of visit"
                    >
                        <optgroup label="General">
                            <option 
                                value="Visiting" 
                                data-subtext="Default"
                                data-tokens="General Default" 
                                selected
                            >Visiting</option>
                        </optgroup>
                        <optgroup label="Business">
                            <option value="Customer" data-tokens="Business">Customer</option>
                            <option value="Employee" data-tokens="Business">Employee</option>
                            <option value="Meeting" data-tokens="Business">Meeting</option>
                        </optgroup>
                        <optgroup label="Residential">
                            <option value="Resident">Resident</option>
                        </optgroup>
                        <optgroup label="Others">
                            <option value="Organizational Member" data-tokens="Others">Organizational Member</option>
                            <option value="Others" data-tokens="Others">Others</option>
                        </optgroup>
                    </select>
                </div>

                <!-- QR Code Scanner -->
                <div class="mt-4 mb-3 flex-center">
                    <div id="QRCodeReader"></div>
                </div>
                <p>Use this camera to scan QR Code of someone who are going to visit your establishment</p>
            </div>

            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>

<script type="module">
    $('#scanQRCodeModal').on('show.bs.modal', () => {

        // Scanner Instance
        let scanner = new Html5QrcodeScanner("QRCodeReader", { fps: 30, qrbox: 250 }, false);

        // On success scan
        const onScanSuccess = (qrcode) => {

            // Get the current health status record
            $.ajax({
                url: `${ CITIZEN_API_ROUTE }health-status-logs/today`,
                type: 'GET',
                headers: AJAX_HEADERS,
                success: (result) => {
                    if(result) {
                        const resultData = result.data[0];

                        const data = {
                            health_status_log_ID: resultData.health_status_log_ID,
                            temperature: resultData.temperature,
                            establishment_ID: qrcode,
                            purpose: $('#visitPurpose').val()
                        }

                        // Add visiting log
                        $.ajax({
                            url: `${ CITIZEN_API_ROUTE }add-visiting-log`,
                            type: 'POST',
                            headers: AJAX_HEADERS,
                            data: data,
                            dataType: 'json',
                            success: result => {
                                if(result) {

                                    // Clear the scanner to stop scanning
                                    scanner.clear();

                                    // Hide the Scan QR Code Modal
                                    $('#scanQRCodeModal').modal('hide');

                                    // Show success alert
                                    showAlert('success', 'Success! Your visit to an establishment has been recorded')
                                } else {
                                    console.log('No result was found');
                                }
                            }
                        })
                        .fail(() => console.error('Error'));
                    } else {
                        console.log('No result was found');
                    }
                }
            })
            .fail(() => console.log('There was an error in getting today\'s health status log'));
        }

        // On failed scan
        const onScanFailure = (error) => {
            // console.warn(`QR error = ${error}`);
        }

        // Render the scanner
        scanner.render(onScanSuccess, onScanFailure);
    });
</script>