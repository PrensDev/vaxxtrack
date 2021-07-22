<!-- QR Scanner Modal -->
<div class="modal" id="QRCodeScannerModal" tabindex="-1" data-backdrop="static">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-camera"></h5>
                <h5 class="modal-title">Scan</h5>
                <button 
                    class="btn btn-sm btn-white-muted" 
                    type="button" 
                    data-dismiss="modal" 
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Visiting Purpose Field -->
                <div class="form-group">
                    <label for="position">Purpose of visiting</label>
                    <select 
                        name="visitPurpose" 
                        id="visitPurpose" 
                        class="selectpicker form-control border"
                        data-style="btn btn-outline-primary"
                        data-size="6"
                        data-live-search="true"
                        title="Select a purpose of visit"
                    >
                        <optgroup label="General">
                            <option 
                                value="Visiting" 
                                data-subtext="Default"
                                selected
                            >Visiting</option>
                        </optgroup>
                        <optgroup label="Business">
                            <option value="Customer">Customer</option>
                            <option value="Employee">Employee</option>
                            <option value="Meeting">Meeting</option>
                        </optgroup>
                        <optgroup label="Residential">
                            <option value="Resident">Resident</option>
                        </optgroup>
                        <optgroup label="Others">
                            <option value="Organizational Member">Organizational Member</option>
                            <option value="Others">Others</option>
                        </optgroup>
                    </select>
                </div>

                <!-- QR Code Scanner -->
                <div class="my-5 mb-3 d-flex justify-content-center align-items-center">
                    <!-- <video id="QRCodeScanner"></video> -->
                    <div id="reader" width="600px"></div>
                </div>
                <p>Use this camera to scan QR Code of someone who are going to visit your establishment</p>
            </div>
            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>

<!-- Scripts for QR Scanner Modal -->
<script type="module">
    $('#QRCodeScannerModal').on('show.bs.modal', () => {

        const URLParams = location.pathname.split('/');
        const establishmentID = URLParams[URLParams.length-1]; 

        // Scanner Instance
        let scanner = new Html5QrcodeScanner("reader", { fps: 25, qrbox: 250 }, false);
    
        // On success scan
        const onScanSuccess = (citizenID) => {
            console.log(`Data: ${ citizenID }`);
            $.ajax({
                url: `${ REPRESENTATIVE_API_ROUTE }add-visiting-log`,
                type: 'POST',
                headers: AJAX_HEADERS,
                data: {
                    citizen_ID: citizenID,
                    establishment_ID: establishmentID,
                    purpose: $('#visitPurpose').val(),
                },
                dataType: 'json',
                success: result => {
                    if(result) {
                        reloadDataTable('#visitingLogsDT');
                        $('#QRCodeScannerModal').modal('hide');
                    } else {
                        console.log('No result');
                    }
                }
            })
            .fail(() => console.error('There was an error in creating a visiting log'));
        }
    
        // On failed scan
        const onScanFailure = (error) => {
            // console.warn(`QR error = ${error}`);
        }
    
        // Render the scanner
        scanner.render(onScanSuccess, onScanFailure);
    });
</script>

<!-- View Visiting Log Details Modal -->
<div class="modal fade" id="viewVisitLogModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-list"></h5>
                <h5 class="modal-title">Visiting Log Details</h5>
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
                <table class="table">
                    <tr>
                        <th>Visitor's Details</th>
                        <td id="visitorDetails"></td>
                    </tr>
                    <tr>
                        <th>Entry Log</th>
                        <td id="entryLog"></td>
                    </tr>
                    <tr>
                        <th>Purpose</th>
                        <td id="purposeOfVisit"></td>
                    </tr>
                    <tr>
                        <th>Temperature</th>
                        <td id="visitorTemp"></td>
                    </tr>
                    <tr>
                        <th>Health Status</th>
                        <td id="healthStatus"></td>
                    </tr>
                    <tr>
                        <th>Allow to enter?</th>
                        <td id="allowedToEnter"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>

<!-- Delete Visiting Log Modal -->
<div class="modal" id="deleteVisitingLogModal" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <form id="deleteVisitingLogForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Delete Visiting Log</h5>
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
                <div class="d-sm-flex">
                    <div class="flex-center mb-3 mb-sm-0 mr-sm-3">
                        <img 
                            src="<?= base_url() ?>public/images/brand/warning.svg" 
                            alt="Warning" 
                            style="width: 8rem"
                            draggable="false"
                        >
                    </div>
                    <div>
                        
                        <!-- Visiting Log ID -->
                        <div class="form-group d-none">
                            <input 
                                type="hidden" 
                                class="form-control" 
                                id="visitingLogIDForDelete" 
                                name="visitingLogID"
                            >
                        </div>

                        <p>Are you sure you want to delete this record?</p>

                        <!-- Confirmation -->
                        <div class="form-group">
                            <label class="mb-0" for="confirmDeleteForVaccRecord">Type "CONFIRM" to continue</label>
                            <div class="small text-danger mb-3">Note: You cannot retrieved this record again forever if you are going to continue to delete this</div>
                            <input type="hidden" id="confirmRef"value="CONFIRM">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="confirmDeleteForVaccRecord"
                                name="confirm"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-muted border-0 py-1">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">
                    <span>Delete</span>
                    <i class="fas fa-trash-alt ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>
