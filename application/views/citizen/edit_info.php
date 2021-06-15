<div class="container px-3 py-sm-3 py-sm-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Edit your information</h2>
            <div class="text-secondary">Change the fields you want to update with</div>
        </div>
    </div>

    <!-- Edit Representative Form -->
    <form id="editRepInfoForm">
 
        <!-- General Information -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 p-0">

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="mr-2">
                                <div class="icon-container-circle">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            </div>
                            <div>
                                <div class="font-weight-semibold h5 mb-0" id="userFullNamePreviewForEdit"></div>
                                <div class="font-weight-semibold text-secondary small">Establishment Representative</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Name Field -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-header-text">
                            <i class="fas fa-id-card-alt mr-1"></i>
                            <span>Your Full Name</span>
                        </div>
                    </div>
                    <div class="card-body">

                            <!-- First Name Field -->
                            <div class="form-group">
                                <label for="firstName">First name</label>
                                <input 
                                    class       = "form-control" 
                                    type        = "text" 
                                    id          = "firstNameInput" 
                                    name        = "firstName"
                                    placeholder = "e.g. Juan"
                                >
                            </div>

                            <!-- Middle Name Field -->
                            <div class="form-group">
                                <label for="middleName" class="d-flex justify-content-between">
                                    <span>Middle name</span>
                                    <div
                                        class           = "d-inline text-muted ml-1"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Middle name is not required"
                                    >
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                </label>
                                <input 
                                    class       = "form-control" 
                                    type        = "text" 
                                    id          = "middleNameInput" 
                                    name        = "middleName"
                                    placeholder = "e.g. Simon"
                                >
                            </div>

                            <!-- Last Name Field -->
                            <div class="form-group">
                                <label for="lastName">Last name</label>
                                <input 
                                    class       = "form-control" 
                                    type        = "text" 
                                    id          = "lastNameInput" 
                                    name        = "lastName"
                                    placeholder = "e.g. Dela Cruz"
                                >
                            </div>

                            <!-- Suffix Field -->
                            <div class="form-group">
                                <label for="suffix" class="d-flex justify-content-between">
                                    <span>Suffix</span>
                                    <div
                                        class           = "d-inline text-muted ml-1"
                                        data-toggle     = "tooltip"
                                        data-placement  = "top"
                                        title           = "Leave it blank if your name doesn't have suffix"
                                    >
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                </label>
                                <select 
                                    name       = "suffixName" 
                                    id         = "suffixName" 
                                    class      = "selectpicker w-100"
                                    data-style = "border"
                                    title      = "Select if you have a suffix name"
                                >
                                    <option value="Jr.">Jr. (Junior)</option>
                                    <option value="Sr.">Sr. (Senior)</option>
                                    <option value="III">III (The Third)</option>
                                </select>
                            </div>
                    </div>
                </div>

                <!-- General Information Field -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-header-text">
                            <i class="fas fa-info-circle mr-1"></i>
                            <span>General Information</span>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Birth Date Field -->
                        <div class="form-group">
                            <label for="birthDate">Date of Birth</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>

                        <!-- Sex Field -->
                        <div class="form-group">
                            <label for="sex">Sex</label>
                            <select 
                                name       = "sex" 
                                id         = "sex" 
                                class      = "selectpicker w-100"
                                data-style = "border"
                                title      = "Select your sex"
                            >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <!-- Civil Status Field -->
                        <div class="form-group">
                            <label for="civilStatus">Civil Status</label>
                            <select 
                                name       = "civilStatus" 
                                id         = "civilStatus" 
                                class      = "selectpicker w-100"
                                data-style = "border"
                                title      = "Select your current civil status"
                            >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Address Field -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-header-text">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            <span>Address</span>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Region Field -->
                        <div class="form-group">
                            <label for="birthDate">Region</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>

                        <!-- Province Field -->
                        <div class="form-group">
                            <label for="birthDate">Province</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>

                        <!-- City/Municipality Field -->
                        <div class="form-group">
                            <label for="birthDate">City/Municipality</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>

                        <!-- Barangay Field -->
                        <div class="form-group">
                            <label for="birthDate">Barangay</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>

                        <!-- Street Field -->
                        <div class="form-group">
                            <label for="birthDate">Street</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>

                        <!-- Specific Location Field -->
                        <div class="form-group">
                            <label for="birthDate">Specific Location</label>
                            <input 
                                class       = "form-control" 
                                type        = "text" 
                                id          = "birthDate" 
                                name        = "birthDate"
                                placeholder = "e.g. Juan"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Controls -->
        <div class="form-group text-center">
            <button 
                type  = "submit" 
                class = "btn btn-blue"
            >Save</button>
            <button 
                type    = "button" 
                class   = "btn btn-muted"
                onclick = "history.back()"
            >Cancel</button>
        </div>
    </form>
</div>