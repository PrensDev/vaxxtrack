<!-- Create Appointment Modal -->
<div class= "modal" id="createAppointmentModal" tabindex= "-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="createAppointmentForm">

            <div class="modal-header">
                <h5 class="fas fa-file-signature modal-title-icon"></h5>
                <h5 class="modal-title">Create Appointment</h5>
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
                    <label for="preferredVaccine">What vaccine do you prefer?</label>
                    <select 
                        class="selectpicker w-100" 
                        id="preferredVaccine"
                        name="preferredVaccine"
                        data-style="border btn"
                        data-size="3"
                        data-live-search="true"
                        title="Select a vaccine"
                    >
                        <option 
                            value="vaccineID" 
                            data-tokens="Sample Token"
                            data-subtext="Vaccine"
                        >Vaccine</option>
                        <option 
                            value="vaccineID" 
                            data-tokens="Sample Token"
                            data-subtext="Vaccine"
                        >Vaccine</option>
                        <option 
                            value="vaccineID" 
                            data-tokens="Sample Token"
                            data-subtext="Vaccine"
                        >Vaccine</option>
                        <option 
                            value="vaccineID" 
                            data-tokens="Sample Token"
                            data-subtext="Vaccine"
                        >Vaccine</option>
                        <option 
                            value="vaccineID" 
                            data-tokens="Sample Token"
                            data-subtext="Vaccine"
                        >Vaccine</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button 
                    type="button" 
                    class="btn btn-muted" 
                    data-dismiss="modal"
                >Cancel</button>
                <button 
                    type="submit" 
                    class="btn btn-blue" 
                >
                    <span>Create</span>
                    <i class="fas fa-plus ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>