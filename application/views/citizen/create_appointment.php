<div class="container px-3 py-sm-3 py-sm-4">

    <!-- Title Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Create Appointment</h2>
            <div class="text-secondary">Fill up the required fields to submit a vaccination appointment</div>
        </div>
    </div>

    <!-- Form -->
    <div class="d-flex justify-content-center">
        <form class="col-12 col-sm-10 col-md-8" id="createVaccAppointment">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-header-text">
                        <i class="fas fa-info-circle mr-1"></i>
                        <span>Appointment Details</span>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Requested Date Field -->
                    <div class="form-group">
                        <label for="requestedDate">When do you want to get vaccinated?</label>
                        <input 
                            type        = "date" 
                            class       = "form-control" 
                            id          = "requestedDate"
                            name        = "requestedDate"
                            placeholder = "Select a date"
                        >
                    </div>

                    <!-- Preferred Vaccine Field -->
                    <div class="form-group">
                        <label for="preferredVaccine">What vaccine you prefer?</label>
                        <select 
                            class      = "selectpicker w-100" 
                            id         = "preferredVaccine"
                            name       = "preferredVaccine"
                            data-style = "border btn"
                            title      = "Select a vaccine"
                        >
                            <option value="vaccineID" data-tokens="Sample Token">Vaccine</option>
                            <option value="vaccineID" data-tokens="Sample Token">Vaccine</option>
                            <option value="vaccineID" data-tokens="Sample Token">Vaccine</option>
                            <option value="vaccineID" data-tokens="Sample Token">Vaccine</option>
                            <option value="vaccineID" data-tokens="Sample Token">Vaccine</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- User actions -->
            <div class="form-group text-center">
                <button 
                    class   = "btn btn-muted" 
                    type    = "button" 
                    onclick = "history.back()"
                >Cancel</button>
                <button 
                    class="btn btn-blue" 
                    type="submit"
                >
                    <i class="fas fa-file-signature mr-1"></i>
                    <span>Create</span>
                </button>
            </div>
        </form>
    </div>
</div>
