<!-- QR Scanner Modal -->
<div 
    class           = "modal" 
    id              = "scanModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "scanModal" 
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
                <form action="">
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
                    <div id="reader" width="600px"></div>
                </div>
                <p>Use this camera to scan QR Code of someone who are going to visit your establishment</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-block">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View Visiting Log Details Modal -->
<div
    class           = "modal" 
    id              = "viewVisitLogModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "viewVisitLogModal" 
    aria-hidden     = "true"
>
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
                        <th>Name</th>
                        <td>Dela Cruz, Juan</td>
                    </tr>
                    <tr>
                        <th>Entry Log</th>
                        <td>Today, May 1, 2021<br>11:24:12 AM</td>
                    </tr>
                    <tr>
                        <th>Purpose</th>
                        <td>Visiting</td>
                    </tr>
                    <tr>
                        <th>Temperature</th>
                        <td>
                            <span>37.1&deg;C</span>
                            <i 
                                class          = "fas fa-exclamation-triangle text-warning ml-1"
                                data-toggle    = "tooltip"
                                data-placement = "top"
                                title          = "High Temperature"    
                            ></i>
                        </td>
                    </tr>
                    <tr>
                        <th>Health Status</th>
                        <td>
                            <button
                                class       = "btn btn-muted btn-block"
                                data-toggle = "collapse"
                                data-target = "#symptomsDetails"
                            >
                                <i class="fas fa-exclamation-triangle text-warning mr-1"></i>
                                <span>With Symptoms</span>
                            </button>
                            <div class="collapse" id="symptomsDetails">
                                <div class="card card-body">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <td><i class="fas fa-exclamation text-danger"></i></td>
                                            <td>High Fever</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-exclamation text-danger"></i></td>
                                            <td>Loss of Taste and Smell</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-exclamation text-danger"></i></td>
                                            <td>Fatigue</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Allow to enter?</th>
                        <td>
                            <span class="text-danger font-weight-bold text-uppercase">Not Allowed</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <a 
                    href    = "<?= base_url() ?>r/edit_representative/1/1"
                    class   = "btn btn-blue">
                    <i class="fas fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>
            </div>
        </div>
    </div>
</div>