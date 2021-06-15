<div class="container p-4">

    <!-- Form header -->
    <div class="my-4">
        <h2>Add representative</h2>
        <p class="text-secondary mb-0">Add new representative on your establishment by filling up the fields below</p>
    </div>
    
    <!-- Add Representative Form -->
    <form method="POST" id="addRepresentativeForm">
 
        <!-- General Information -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-list mr-1"></i>
                    <span>General Information</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">

                    <!-- First Name Field -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input 
                                class = "form-control" 
                                type  = "text" 
                                id    = "firstName" 
                                name  = "firstName"
                            >
                        </div>
                    </div>

                    <!-- Middle Name Field -->
                    <div class="col-lg-3">
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
                                class = "form-control" 
                                type  = "text" 
                                id    = "middleName" 
                                name  = "middleName"
                            >
                        </div>
                    </div>

                    <!-- Last Name Field -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input 
                                class = "form-control" 
                                type  = "text" 
                                id    = "lastName" 
                                name  = "lastName"
                            >
                        </div>
                    </div>

                    <!-- Suffix Field -->
                    <div class="col-lg-1">
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
                            <input 
                                class = "form-control" 
                                type  = "text" 
                                id    = "suffix" 
                                name  = "suffix"
                            >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input 
                        class = "form-control" 
                        type  = "text" 
                        id    = "position" 
                        name  = "position"
                    >
                </div>
            </div>
        </div>

        <!-- Account Information -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-user-lock mr-1"></i>
                    <span>Account Information</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="authDetails">Email or Contact Number</label>
                    <input 
                        type  = "text" 
                        class = "form-control" 
                        id    = "authDetails"
                        name  = "authDetails"
                    >
                </div>
            </div>
        </div>

        <!-- User Controls -->
        <div class="form-group text-center">
            <button 
                type  = "submit" 
                class = "btn btn-blue"
            >Add</button>
            <button 
                type    = "button" 
                class   = "btn btn-muted"
                onclick = "history.back()"
            >Cancel</button>
        </div>
    </form>
</div>