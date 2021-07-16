<!-- Health Check Modal -->
<div class="modal" id="healthStatusModal" tabindex= "-1" data-backdrop="static"data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="healthStatusForm">
            <div class="modal-header">
                <h5 class="fas fa-notes-medical modal-title-icon"></h5>
                <h5 class="modal-title">Health Check</h5>
            </div>

            <div class="modal-body">
                
                <!-- Temperature -->
                <div class="form-group">
                    <label for="temperature">Please insert your current temperature</label>
                    <div class="input-group">
                        <input 
                            type="number" 
                            class="form-control" 
                            id="temperature"
                            name="temperature"
                            min="30.0"
                            max="42.0"
                            step="0.1"
                        >
                        <div 
                            class="input-group-append"
                            data-toggle="tooltip"
                            title="in degree Celsius"
                        >
                            <div class="input-group-text font-weight-semibold">&deg;C</div>
                        </div>
                    </div>
                </div>

                <p class="font-weight-semibold">Do you experience one of the following:</p>

                <!-- Fever -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="fever"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="fever"
                            name="fever"
                        >
                        <label class="custom-control-label" for="fever">Fever</label>
                    </div>
                </label>

                <!-- Dry Cough -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="dryCough"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="dryCough"
                            name="dryCough"
                        >
                        <label class="custom-control-label" for="dryCough">Dry Cough</label>
                    </div>
                </label>

                <!-- Sore Throat -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="soreThroat"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="soreThroat"
                            name="soreThroat"
                        >
                        <label class="custom-control-label" for="soreThroat">Sore Throat</label>
                    </div>
                </label>

                <!-- Shortness of Breath -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="breathShortness"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="breathShortness"
                            name="breathShortness"
                        >
                        <label class="custom-control-label" for="breathShortness">Shortness of Breath</label>
                    </div>
                </label>

                <!-- Loss of Smell and Taste -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="smellTasteLoss"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="smellTasteLoss"
                            name="smellTasteLoss"
                        >
                        <label class="custom-control-label" for="smellTasteLoss">Loss of Smell and Taste</label>
                    </div>
                </label>

                <!-- Fatigue -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="fatigue"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="fatigue"
                            name="fatigue"
                        >
                        <label class="custom-control-label" for="fatigue">Fatigue</label>
                    </div>
                </label>

                <!-- Aches and Pain -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="fatigue"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="achesPain"
                            name="achesPain"
                        >
                        <label class="custom-control-label" for="achesPain">Aches and Pain</label>
                    </div>
                </label>

                <!-- Runny Nose -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="runnyNose"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="runnyNose"
                            name="runnyNose"
                        >
                        <label class="custom-control-label" for="runnyNose">Runny Nose</label>
                    </div>
                </label>

                <!-- Diarrhea -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="diarrhea"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="diarrhea"
                            name="diarrhea"
                        >
                        <label class="custom-control-label" for="diarrhea">Diarrhea</label>
                    </div>
                </label>

                <!-- Headache -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="headache"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="headache"
                            name="headache"
                        >
                        <label class="custom-control-label" for="headache">Headache</label>
                    </div>
                </label>
            </div>

            <div class="modal-footer border-0 flex-separated">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="healthy">
                        <label class="custom-control-label" for="healthy">None of the above</label>
                    </div>
                </div>
                <button 
                    type="submit" 
                    class="btn btn-primary" 
                    id="saveHealthStatus"
                    disabled
                >
                    <span>Save</span>
                    <i class="fas fa-check ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!-- View Health Status Log Modal -->
<div class="modal fade" id="viewHealthStatusLogModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon far fa-file-alt"></h5>
                <h5 class="modal-title">Health Status Log Details</h5>
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
                <table class="table border-bottom w-100">
                    <tr>
                        <th>Date & Time Recorded</th>
                        <td id="recordedDatetime"></td>
                    </tr>
                    <tr>
                        <th>Temperature</th>
                        <td id="recordedTemp"></td>
                    </tr>
                    <tr>
                        <th>Health Status</th>
                        <td id="recordedHealthStatus">
                    </tr>
                    <tr>
                        <th>Overall Status</th>
                        <td id="overallStatus"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer p-3 bg-white"></div>
        </div>
    </div>
</div>