<div class="container px-3 py-4">

    <!-- Form header -->
    <div class="my-4">
        <h2 class="m-0">Edit information</h2>
        <p class="text-secondary mb-0">Edit your information here by providing the appropriate fields</p>
    </div>
    
    <!-- Edit Info Form -->
    <form id="editInfoForm">

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
                                <div class="font-weight-semibold text-secondary small">Health Official</div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    id          = "firstName" 
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
                                    id          = "middleName" 
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
                                    id          = "lastName" 
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
            </div>
        </div>

        <!-- User Controls -->
        <div class="form-group text-center">
            <button 
                type    = "button" 
                class   = "btn btn-muted"
                onclick = "history.back()"
            >Cancel</button>
            <button 
                type  = "submit" 
                class = "btn btn-blue"
            >
                <span>Save</span>
                <i class="fas fa-check ml-1"></i>
            </button>
        </div>
    </form>
</div>