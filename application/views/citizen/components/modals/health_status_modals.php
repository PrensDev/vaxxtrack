<!-- Health Status Modal -->
<div 
    class="modal" 
    id="healthStatusModal" 
    tabindex= "-1" 
    data-backdrop="static"
    data-keyboard="false"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="healthStatusForm">

            <div class="modal-header">
                <h5 class="modal-title">Health Check</h5>
            </div>

            <div class="modal-body">
                
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


