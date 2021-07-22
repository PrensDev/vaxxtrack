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
                        <label class="custom-control-label" for="fever">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/fever.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Fever</span>
                        </label>
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
                        <label class="custom-control-label" for="dryCough">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/dry_cough.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Dry Cough</span>
                        </label>
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
                        <label class="custom-control-label" for="soreThroat">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/sore_throat.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Sore Throat</span>
                        </label>
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
                        <label class="custom-control-label" for="breathShortness">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/breath_shortness.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Shortness of Breath</span>
                        </label>
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
                        <label class="custom-control-label" for="smellTasteLoss">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/smell_taste_loss.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Loss of Smell and Taste</span>
                        </label>
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
                        <label class="custom-control-label" for="fatigue">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/fatigue.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Fatigue</span>
                        </label>
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
                        <label class="custom-control-label" for="achesPain">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/aches_and_pain.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Aches and Pain</span>
                        </label>
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
                        <label class="custom-control-label" for="runnyNose">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/runny_nose.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Runny Nose</span>
                        </label>
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
                        <label class="custom-control-label" for="diarrhea">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/diarrhea.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Diarrhea</span>
                        </label>
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
                        <label class="custom-control-label" for="headache">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/headache.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Headache</span>
                        </label>
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

<!-- Update Health Status Today Modal -->
<div class="modal" id="updateCurrHealthStatModal" tabindex= "-1" data-backdrop="static"data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="updateHealthStatForm">
            <div class="modal-header">
                <h5 class="fas fa-notes-medical modal-title-icon"></h5>
                <h5 class="modal-title">Update Health Status</h5>
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

                <!-- Health Status Log ID (hidden) -->
                <input type="hidden" name="healthStatusLogID" id="healthStatusLogIDForToday">
                
                <!-- Temperature -->
                <div class="form-group">
                    <label for="temperatureForUpdate">Please insert your current temperature</label>
                    <div class="input-group">
                        <input 
                            type="number" 
                            class="form-control" 
                            id="temperatureForUpdate"
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
                    for="feverForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="feverForUpdate"
                            name="fever"
                        >
                        <label class="custom-control-label" for="feverForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/fever.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Fever</span>
                        </label>
                    </div>
                </label>

                <!-- Dry Cough -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="dryCoughForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="dryCoughForUpdate"
                            name="dryCough"
                        >
                        <label class="custom-control-label" for="dryCoughForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/dry_cough.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Dry Cough</span>
                        </label>
                    </div>
                </label>

                <!-- Sore Throat -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="soreThroatForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="soreThroatForUpdate"
                            name="soreThroat"
                        >
                        <label class="custom-control-label" for="soreThroatForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/sore_throat.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Sore Throat</span>
                        </label>
                    </div>
                </label>

                <!-- Shortness of Breath -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="breathShortnessForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="breathShortnessForUpdate"
                            name="breathShortness"
                        >
                        <label class="custom-control-label" for="breathShortnessForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/breath_shortness.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Shortness of Breath</span>
                        </label>
                    </div>
                </label>

                <!-- Loss of Smell and Taste -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="smellTasteLossForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="smellTasteLossForUpdate"
                            name="smellTasteLoss"
                        >
                        <label class="custom-control-label" for="smellTasteLossForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/smell_taste_loss.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Loss of Smell and Taste</span>
                        </label>
                    </div>
                </label>

                <!-- Fatigue -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="fatigueForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="fatigueForUpdate"
                            name="fatigue"
                        >
                        <label class="custom-control-label" for="fatigueForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/fatigue.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Fatigue</span>
                        </label>
                    </div>
                </label>

                <!-- Aches and Pain -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="achesPainForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="achesPainForUpdate"
                            name="achesPain"
                        >
                        <label class="custom-control-label" for="achesPainForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/aches_and_pain.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Aches and Pain</span>
                        </label>
                    </div>
                </label>

                <!-- Runny Nose -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="runnyNoseForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="runnyNoseForUpdate"
                            name="runnyNose"
                        >
                        <label class="custom-control-label" for="runnyNoseForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/runny_nose.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Runny Nose</span>
                        </label>
                    </div>
                </label>

                <!-- Diarrhea -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="diarrheaForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="diarrheaForUpdate"
                            name="diarrhea"
                        >
                        <label class="custom-control-label" for="diarrheaForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/diarrhea.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Diarrhea</span>
                        </label>
                    </div>
                </label>

                <!-- Headache -->
                <label 
                    class="form-group alert-warning p-2 mb-1 rounded-lg w-100"
                    for="headacheForUpdate"
                    role="button"
                >
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="headacheForUpdate"
                            name="headache"
                        >
                        <label class="custom-control-label" for="headacheForUpdate">
                            <img 
                                class="mx-2" 
                                src="<?= base_url() ?>public/images/brand/symptoms/headache.png" 
                                style="height: 2.5rem"
                                draggable="false"
                            >
                            <span>Headache</span>
                        </label>
                    </div>
                </label>
            </div>

            <div class="modal-footer border-0 d-flex justify-content-center justify-content-sm-between align-items-center">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="healthyForUpdate">
                        <label class="custom-control-label" for="healthyForUpdate">None of the above</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between justify-content-sm-end flex-grow-1">
                    <button class="btn btn-muted mr-sm-1" data-dismiss="modal">Cancel</button>
                    <button 
                        type="submit" 
                        class="btn btn-primary" 
                        id="saveHealthStatusForUpdate"
                        disabled
                    >
                        <span>Save</span>
                        <i class="fas fa-check ml-1"></i>
                    </button>
                </div>
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