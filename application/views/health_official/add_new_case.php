<div class="container px-3 py-4">

    <!-- Dashboard Header -->
    <div class="my-4">
        <div>
            <h2 class="m-0">Add New Case</h2>
            <div class="text-secondary">Add new case by filling up the required field below</div>
        </div>
    </div>

    <!-- Case Form -->
    <form id="addCaseForm">

        <!-- Patient's Information -->
        <div class="card mb-4">
            <div class="card-header flex-separated">
                <div class="card-header-text">
                    <i class="fas fa-user mr-1"></i>
                    <span>Patient's Information</span>
                </div>
                <div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#searchCitizenModal">
                    <i class="fas fa-search"></i>
                    <span class="d-none d-sm-inline ml-sm-1">Search for registered citizen</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                
                    <!-- Patient ID Field (Hidden) -->
                    <div class="">
                        <div class="form-group">
                            <label for="firstName">Patient ID</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "patientID" 
                                name        = "patientID" 
                                placeholder = "Patient ID should display here"
                                readonly
                            >
                        </div>
                    </div>

                    <!-- Patient's Full Name-->
                    <h5 class="text-info font-weight-bold">Full Name</h5>
                    <div class="form-row">

                        <!-- First Name Field -->
                        <div class="col-lg-3">
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
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="middleName" class="d-flex justify-content-between">
                                    <span>Middle Name</span>
                                    <div
                                        class           = "d-inline text-muted ml-1"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Leave it blank if citizen doesn't have middle name"
                                    >
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                </label>
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
                        <div class="col-lg-3">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="suffix" class="d-flex justify-content-between">
                                    <span>Suffix</span>
                                    <div
                                        class           = "d-inline text-muted ml-1"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Leave it blank if citizen's name doesn't have suffix"
                                    >
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                </label>
                                <select 
                                    name       = "suffixName" 
                                    id         = "suffixName" 
                                    class      = "selectpicker w-100"
                                    data-style = "border"
                                    title      = "Select a suffix name"
                                >
                                    <option value="Jr.">Jr. (Junior)</option>
                                    <option value="Sr.">Sr. (Senior)</option>
                                    <option value="III">III (The Third)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Patient's General Information -->
                    <h5 class="text-info font-weight-bold">General Information</h5>
                    <div class="form-row">

                        <!-- Date of Birth -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="birthDate">Date of birth</label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    id="birthDate"
                                    name="birthDate"
                                >
                            </div>
                        </div>

                        <!-- Sex -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select 
                                    class       = "selectpicker form-control" 
                                    name        = "sex" 
                                    id          = "sex"
                                    title       = "Select the biological sex of the patient"
                                    data-style  = "form-control border"
                                >
                                    <option 
                                        value="Female" 
                                        data-icon="fas fa-venus icon-container text-danger"
                                    >
                                        <span>Female</span>
                                    </option>
                                    <option 
                                        value="Male" 
                                        data-icon="fas fa-mars icon-container text-blue"
                                    >
                                        <span>Male</span>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    <!-- Patient's Address -->
                    <h5 class="text-info font-weight-bold">Address</h5>
                    <div class="form-row">

                        <!-- Region Field -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="region">Region</label>
                                <input 
                                    type        = "text" 
                                    class       = "form-control" 
                                    id          = "patientRegion" 
                                    name        = "patientRegion" 
                                    placeholder = "Enter region here"
                                >
                            </div>
                        </div>

                        <!-- Province Field -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input 
                                    type        = "text" 
                                    class       = "form-control" 
                                    id          = "patientProvince" 
                                    name        = "patientProvince" 
                                    placeholder = "Enter province here"
                                >
                            </div>
                        </div>

                        <!-- City Field -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="cityMunicipality">City/Municipality</label>
                                <input 
                                    type        = "text" 
                                    class       = "form-control" 
                                    id          = "patientCity" 
                                    name        = "patientCity" 
                                    placeholder = "Enter city/municipality here"
                                >
                            </div>
                        </div>

                        <!-- Baranggay Field -->
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="branggayDistrict">Barangay/District</label>
                                <input 
                                    type        = "text" 
                                    class       = "form-control" 
                                    id          = "patientBarangay" 
                                    name        = "patientBarangay" 
                                    placeholder = "Enter region here"
                                >
                            </div>
                        </div>

                        <!-- Street Field -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input 
                                    type        = "text" 
                                    class       = "form-control" 
                                    id          = "patientStreet" 
                                    name        = "patientStreet" 
                                    placeholder = "Enter street here"
                                    >
                            </div>
                        </div>

                        <!-- Specific Location Field -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="specificLocation">Specific Location</label>
                                <input 
                                    type        = "text" 
                                    class       = "form-control" 
                                    id          = "patientSpecificLocation" 
                                    name        = "patientSpecificLocation" 
                                    placeholder = "Enter specific location here"
                                >
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Reset this field -->
                    <div class="form-group text-center">
                        <button 
                            class="btn btn-sm btn-danger" 
                            type="button"
                            data-toggle="modal"
                            data-target="#resetPatientInfoFieldsModal"
                        >
                            <i class="fas fa-eraser mr-1"></i>
                            <span>Clear this field</span>
                        </button>
                    </div>
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

                    <!-- Case Code -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="dateConfirmed">Case Code</label>
                            <input 
                                type        = "text" 
                                class       = "form-control" 
                                id          = "caseCode" 
                                name        = "caseCode" 
                                placeholder = "Enter case code here"
                            >
                        </div>
                    </div>

                    <!-- Date Confirmed -->
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

                    <!-- Current Health Status -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="dateConfirmed">Current Health Status</label>
                            <select 
                                class            = "selectpicker form-control" 
                                name             = "currentHealthStatus" 
                                id               = "currentHealthStatus" 
                                data-style       = "border"
                                data-size        = "6"
                                data-live-search = "true"
                                title            = "Select the current health status of patient"
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

                    <!-- If Admitted to any healthcare facilitiies -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Admitted to any healthcare facilities (e.g. hospital)</label>
                            <div class="d-flex align-items-center form-control border-0">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="isAdmitted" name="admitted" value=1 class="custom-control-input">
                                    <label class="custom-control-label" for="isAdmitted">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="isNotadmitted" name="admitted" value=0 class="custom-control-input">
                                    <label class="custom-control-label" for="isNotadmitted">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Removal Type -->
                    <div class="col-12 col-lg-6" id="removalTypeSelect" style="display: none">
                        <div class="form-group">
                            <label for="removalType">Removal Type</label>
                            <select 
                                class            = "selectpicker form-control" 
                                name             = "removalType" 
                                id               = "removalType" 
                                data-style       = "border"
                                data-size        = "6"
                                data-live-search = "true"
                                title            = "Select the current health status of patient"
                            >
                                <option value="Recovered" data-icon="fas fa-circle icon-container text-success">
                                    <span>Recovered</span>
                                </option>
                                <option value="Died" data-icon="fas fa-circle icon-container text-dark">
                                    <span>Died</span>
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Removal Date -->
                    <div class="col-12 col-lg-6" id="removalDateSelect" style="display: none">
                        <div class="form-group">
                            <label for="removalDate">Date of Removal</label>
                            <input 
                                type        = "date" 
                                class       = "form-control" 
                                id          = "removalDate" 
                                name        = "removalDate" 
                                placeholder = "Enter when the case was confirmed"
                            >
                        </div>
                    </div>

                    <!-- If patient is pregnant -->
                    <div class="col-12 col-lg-6" id="ifPatientIsPregnant" style="display: none">
                        <div class="form-group">
                            <label>Is the patient pregnant?</label>
                            <div class="d-flex align-items-center form-control border-0">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="isPregnant" name="pregnant" value=1 class="custom-control-input">
                                    <label class="custom-control-label" for="isPregnant">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="isNotPregnant" name="pregnant" value=0 class="custom-control-input">
                                    <label class="custom-control-label" for="isNotPregnant">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Actions -->
        <div class="form-group text-center mb-4">
            <button class="btn btn-muted" type="button" onclick="history.back()">Cancel</button>
            <button class="btn btn-blue" type="submit">
                <i class="fas fa-plus mr-1"></i>
                <span>Add</span>
            </button>
        </div>

    </form>

</div>