<div class="container px-3 py-sm-3 py-sm-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Add Vaccination Record</h2>
            <div class="text-secondary">Add new record of vaccination by filling up the required fields</div>
        </div>
    </div>

    <!-- Form -->
    <form id="addVaccinationRecordForm">

        <!-- Patient's Information -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-user mr-1"></i>
                    <span>Patient's Information</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                
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
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="birthDate">Date of birth</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
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
                    </div>
                    
                    <hr>

                    <!-- User Action for this field -->
                    <div class="form-group text-center">
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-eraser mr-1"></i>
                            <span>Clear this field</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vaccination Information -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-syringe mr-1"></i>
                    <span>Vaccination Details</span>
                </div>
            </div>
            <div class="card-body">
                
                <!-- Vaccine Used and Date of Vaccination Field -->
                <div class="form-row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="vaccineUsed">Vaccine Used</label>
                            <select 
                                name             = "vaccineUsed" 
                                id               = "vaccineUsed" 
                                class            = "selectpicker form-control" 
                                data-style       = "border form-control"
                                data-live-search = "true"
                            >
                                <option 
                                    value       ="vaccineID"
                                    data-token  = ""
                                >Pfizer BioNTech</option>
                                <option 
                                    value       ="vaccineID"
                                    data-token  = ""
                                >Pfizer BioNTech</option>
                                <option 
                                    value       ="vaccineID"
                                    data-token  = ""
                                >Pfizer BioNTech</option>
                                <option 
                                    value       ="vaccineID"
                                    data-token  = ""
                                >Pfizer BioNTech</option>
                                <option 
                                    value       ="vaccineID"
                                    data-token  = ""
                                >Pfizer BioNTech</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="vaccinationDate">Date of Vaccination</label>
                            <input type="date" class="form-control" id="vaccinationDate" name="vaccinationDate">
                        </div>
                    </div>
                </div>

                <!-- Vaccinated By Field -->
                <div class="form-group">
                    <label for="vaccinatedBy">Vaccinated By</label>
                    <input 
                        type        = "text" 
                        class       = "form-control" 
                        id          = "vaccinatedBy" 
                        name        = "vaccinatedBy" 
                        placeholder = "Enter the person who vaccinated the patient"
                    >
                </div>

                <!-- Vaccinated In Field -->
                <div class="form-group">
                    <label for="vaccinatedIn">Vaccinated In</label>
                    <input 
                        type        = "text" 
                        class       = "form-control" 
                        id          = "vaccinatedIn" 
                        name        = "vaccinatedIn" 
                        placeholder = "Enter the place where vaccination took place"
                    >
                </div>

                <!-- Remarks Field -->
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea 
                        class       = "form-control" 
                        id          = "remarks" 
                        name        = "remarks" 
                        placeholder = "Type some remarks here"
                        rows        = "5" 
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- User Action -->
        <div class="form-group text-center">
            <button class="btn btn-muted">Cancel</button>
            <button class="btn btn-blue">Add</button>
        </div>
    </form>
</div>