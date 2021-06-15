<div class="container py-4">
    <h3>Edit representative</h3>
    <p class="text-secondary">Add new representative on your establishment by filling up the fields below</p>
    
    <form action="">

        <!-- General Information -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-header-text">
                    <i class="fas fa-list mr-1"></i>
                    <span>General Information</span>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName">
                </div>
                <div class="form-group">
                    <label for="middleName">Middle Name</label>
                    <input class="form-control" type="text" id="middleName" name="middleName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input class="form-control" type="text" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label for="lastName">Suffix Name</label>
                    <input class="form-control" type="text" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label for="lastName">Position</label>
                    <input class="form-control" type="text" id="lastName" name="lastName">
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
                    <input type="text" class="form-control" id="authDetails">
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <button 
                type="submit" 
                class="btn btn-blue"
                data-toggle="modal"
                data-target="saveChangesModal"
                
            >Add</button>
            <button type="button" class="btn btn-muted">Cancel</button>
        </div>
    </form>
</div>