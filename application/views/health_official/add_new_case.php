<div class="container px-3 py-4">

    <!-- Dashboard Header -->
    <div class="my-4">
        <div>
            <h2 class="m-0">Add New Case</h2>
            <div class="text-secondary">Add new case by filling up the required field below</div>
        </div>
    </div>

    <!-- Case Form -->
    <form action="">

        <!-- Patient Form Card -->
        <div class="card mb-4">
            <div class="card-header flex-separated">
                <div class="card-header-text">
                    <i class="fas fa-user-tag mr-1"></i>
                    <span>Patient Details</span>
                </div>
                <div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#searchCitizenModal">
                    <i class="fas fa-search"></i>
                    <span class="d-none d-sm-inline ml-sm-1">Search for registered citizen</span>
                </div>
            </div>
            <div class="card-body">

                <!-- Patient's Full Name-->
                <h5 class="text-secondary">Full Name</h5>
                <div class="form-row">

                    <!-- First Name Field -->
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "firstName" 
                                name        = "firstName" 
                                placeholder = "Enter patient's first name"
                            >
                        </div>
                    </div>

                    <!-- Middle Name Field -->
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label for="middleName">Middle Name</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "middleName" 
                                name        = "middleName" 
                                placeholder = "Enter patient's middle name"
                            >
                        </div>
                    </div>

                    <!-- Patient's Last Name -->
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "lastName" 
                                name        = "lastName" 
                                placeholder = "Enter patient's first name"
                            >
                        </div>
                    </div>

                    <!-- Patient's Suffix Name -->
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="firstName">Suffix Name</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "firstName" 
                                name        = "firstName" 
                                placeholder = "Enter patient's suffix name"
                            >
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Patient's General Information -->
                <h5 class="text-secondary">General Information</h5>
                <div class="form-row">

                    <!-- Date of Birth Field -->
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label for="birthDate">Date of birth</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Sex Field -->
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label for="birthDate">Sex</label>
                            <select 
                                class       = "selectpicker form-control border" 
                                name        = "sex" 
                                id          = "sex"
                                title       = "Select the sex of the patient"
                                data-style  = "btn-white"
                            >
                                <option value="F" data-icon="fas fa-venus icon-container text-danger">
                                    <span>Female</span>
                                </option>
                                <option value="M" data-icon="fas fa-mars icon-container text-blue">
                                    <span>Male</span>
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Civil Status Field -->
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label for="birthDate">Civil Status</label>
                            <select 
                                class       = "selectpicker form-control border" 
                                name        = "civilStatus" 
                                id          = "civilStatus"
                                data-style  = "btn-white"
                                title       = "Choose your current civil status"
                            >
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Civil Partnership">Civil Partnership</option>
                                <option value="Former Civil Partner">Former Civil Partner</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Patient's Address -->
                <h5 class="text-secondary">Address</h5>
                <div class="form-row">

                    <!-- Region Field -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="region">Region</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "region" 
                                name        = "region" 
                                placeholder = "Enter region here"
                            >
                        </div>
                    </div>

                    <!-- Region Field -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "province" 
                                name        = "province" 
                                placeholder = "Enter province here"
                            >
                        </div>
                    </div>

                    <!-- Region Field -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="cityMunicipality">City/Municipality</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "cityMunicipality" 
                                name        = "cityMunicipality" 
                                placeholder = "Enter city/municipality here"
                            >
                        </div>
                    </div>

                    <!-- Region Field -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="branggayDistrict">Barangay/District</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "region" 
                                name        = "region" 
                                placeholder = "Enter region here"
                            >
                        </div>
                    </div>

                    <!-- Region Field -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "street" 
                                name        = "street" 
                                placeholder = "Enter street here"
                                >
                        </div>
                    </div>

                    <!-- Region Field -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="specificLocation">Specific Location</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "specificLocation" 
                                name        = "specificLocation" 
                                placeholder = "Enter specific location here"
                            >
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Reset Field -->
                <div class="form-group text-center">
                    <button class="btn btn-sm btn-danger" type="button">
                        <i class="fas fa-eraser mr-1"></i>
                        <span>Clear all field in this form</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- Case Information -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-info-circle mr-1"></i>
                    <span>Case Information</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="dateConfirmed">Case Code</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "dateConfirmed" 
                                name        = "dateConfirmed" 
                                placeholder = "Enter case code here"
                            >
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="dateConfirmed">Date Confirmed</label>
                            <input 
                                type        = "date" 
                                class       = "form-control" 
                                id          = "dateConfirmed" 
                                name        = "dateConfirmed" 
                                placeholder = "Enter when the case was confirmed"
                            >
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="dateConfirmed">Current Health Status</label>
                            <select 
                                class="selectpicker form-control" 
                                name="currentHealthStatus" 
                                id="currentHealthStatus" 
                                data-style="border"
                                data-size="6"
                                data-live-search="true"
                                title="Select the current health status of patient"
                            >
                                <optgroup label="Active">
                                    <option value="Asymptomatic" data-icon="fas fa-circle icon-container text-muted">
                                        <span>Asymptomatic</span>
                                    </option>
                                    <option value="Mild" data-icon="fas fa-circle icon-container text-info">
                                        <span>Mild</span>
                                    </option>
                                    <option value="Severe" data-icon="fas fa-circle icon-container text-warning">
                                        <span>Severe</span>
                                    </option>
                                    <option value="Critical" data-icon="fas fa-circle icon-container text-danger">
                                        <span>Critical</span>
                                    </option>
                                </optgroup>
                                <optgroup label="Recovered">
                                    <option value="Recovered" data-icon="fas fa-circle icon-container text-success">
                                        <span>Recovered</span>
                                    </option>
                                </optgroup>
                                <optgroup label="Died">
                                    <option value="Died" data-icon="fas fa-circle icon-container text-dark">
                                        <span>Died</span>
                                    </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Admitted to any healthcare facilities (e.g. hospital)</label>
                            <div class="d-flex align-items-center form-control border-0">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="isAdmitted" name="admitted" class="custom-control-input">
                                    <label class="custom-control-label" for="isAdmitted">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="isNotadmitted" name="admitted" class="custom-control-input">
                                    <label class="custom-control-label" for="isNotadmitted">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Actions -->
        <div class="form-group text-center mb-4">
            <button class="btn btn-muted">Cancel</button>
            <button class="btn btn-blue" type="submit">
                <i class="fas fa-plus mr-1"></i>
                <span>Add</span>
            </button>
        </div>

    </form>

</div>