<!-- View Vaccine Details Modal -->
<div 
    class           = "modal fade" 
    id              = "viewVaccineDetailsModal"
    tabindex        = "-1"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-syringe"></h5>
                <h5 class="modal-title">Vaccine Details</h5>
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
                <table class="table">
                    <tr>
                        <th>Vaccine</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="mr-2">
                                    <i class="fas fa-syringe text-secondary"></i>
                                </div>
                                <div>
                                    <div 
                                        id="productName"
                                        data-toggle="tooltip"
                                        title="Product Name"
                                    >
                                        <div class="text-secondary font-italic">No data</div>
                                    </div>
                                    <div 
                                        class="small text-secondary" 
                                        id="vaccineName"
                                        data-toggle="tooltip"
                                        title="Vaccine Name"
                                    >
                                        <div class="text-secondary font-italic">No data</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td id="vaccineType">
                            <div class="text-secondary font-italic">No data</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Manufacturer</th>
                        <td id="manufacturer">
                            <div class="text-secondary font-italic">No data</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Shots Details</th>
                        <td id="shotsDetails">
                            <div class="text-secondary font-italic">No data</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td id="description">
                            <div class="text-secondary font-italic">No data</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Added</th>
                        <td>
                            <div id="vaccDateAdded">
                                <div class="text-secondary font-italic">No data</div>
                            </div>
                            <div id="vaccTimeAdded"></div>
                            <div class="small text-secondary" id="vaccDateAddedHumanized"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Updated</th>
                        <td>
                            <div id="vaccDateUpdated">
                                <div class="text-secondary font-italic">No data</div>
                            </div>
                            <div id="vaccTimeUpdated"></div>
                            <div class="small text-secondary" id="vaccDateUpdatedHumanized"></div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>

<!-- Edit Vaccine Details -->
<div 
    class           = "modal" 
    id              = "editVaccineDetailsModal"
    data-backdrop   = "static"
    tabindex        = "-1"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="editVaccineDetailsForm">

            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-syringe"></h5>
                <h5 class="modal-title">Edit Vaccine Details</h5>
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

                <!-- Vaccine ID -->
                <div class="form-group d-none">
                    <label for="vaccineIDInputForEdit">Vaccine ID</label>
                    <input 
                        class="form-control"
                        type="text"
                        id="vaccineIDInputForEdit"
                        name="vaccineID"
                        placeholder="Vaccine ID should be here"
                    >
                </div>


                <!-- Vaccine Name -->
                <div class="form-group">
                    <label for="vaccineNameInputForEdit">Vaccine Name</label>
                    <input 
                        class="form-control"
                        type="text"
                        id="vaccineNameInputForEdit"
                        name="vaccineName"
                        placeholder="Type the vaccine name here"
                    >
                </div>

                <!-- Product Name -->
                <div class="form-group">
                    <label for="productNameInputForEdit">Product Name</label>
                    <input
                        class="form-control" 
                        type="text"
                        id="productNameInputForEdit"
                        name="productName"
                        placeholder="Type the product name here"
                    >
                </div>

                <!-- Type -->
                <div class="form-group">
                    <label for="typeInputForEdit">Vaccine Type</label>
                    <input 
                        class="form-control"
                        type="text"
                        id="typeInputForEdit"
                        name="type"
                        placeholder="Type the vaccine type here"
                    >
                </div>

                <!-- Manufacturer -->
                <div class="form-group">
                    <label for="manufacturerInputForEdit">Manufacturer</label>
                    <input
                        class="form-control" 
                        type="text"
                        id="manufacturerInputForEdit"
                        name="manufacturer"
                        placeholder="Type the manufacturer here"
                    >
                </div>

                <!-- Shots Details -->
                <div class="form-group">
                    <label for="shotsDetailsInputForEdit">Shots Details</label>
                    <input
                        class="form-control" 
                        type="text"
                        id="shotsDetailsInputForEdit"
                        name="shotsDetails"
                        placeholder="Type the shots details here"
                    >
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="descriptionInputForEdit">Description</label>
                    <textarea 
                        class="form-control"
                        id="descriptionInputForEdit" 
                        name="description" 
                        rows="5"
                        placeholder="Type description here"
                    ></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button 
                    class="btn btn-muted" 
                    type="button"
                    data-dismiss="modal"
                >Cancel</button>
                <button 
                    class="btn btn-blue" 
                    type="submit"
                >   
                    <span>Save</span>
                    <i class="fas fa-check ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Add Vaccine -->
<div 
    class           = "modal" 
    id              = "addVaccineModal"
    data-backdrop   = "static"
    tabindex        = "-1"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="addVaccineForm">

            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-syringe"></h5>
                <h5 class="modal-title">Add Vaccine</h5>
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

                <!-- Vaccine ID -->
                <div class="form-group d-none">
                    <label for="vaccineIDInputForAdd">Vaccine ID</label>
                    <input 
                        class="form-control"
                        type="text"
                        id="vaccineIDInputForAdd"
                        name="vaccineID"
                        placeholder="Vaccine ID should be here"
                    >
                </div>

                <!-- Vaccine Name -->
                <div class="form-group">
                    <label for="vaccineNameInputForAdd">Vaccine Name</label>
                    <input 
                        class="form-control"
                        type="text"
                        id="vaccineNameInputForAdd"
                        name="vaccineName"
                        placeholder="Type the vaccine name here"
                    >
                </div>

                <!-- Product Name -->
                <div class="form-group">
                    <label for="productNameInputForAdd">Product Name</label>
                    <input
                        class="form-control" 
                        type="text"
                        id="productNameInputForAdd"
                        name="productName"
                        placeholder="Type the product name here"
                    >
                </div>

                <!-- Type -->
                <div class="form-group">
                    <label for="typeInputForAdd">Vaccine Type</label>
                    <input 
                        class="form-control"
                        type="text"
                        id="typeInputForAdd"
                        name="type"
                        placeholder="Type the vaccine type here"
                    >
                </div>

                <!-- Manufacturer -->
                <div class="form-group">
                    <label for="manufacturerInputForAdd">Manufacturer</label>
                    <input
                        class="form-control" 
                        type="text"
                        id="manufacturerInputForAdd"
                        name="manufacturer"
                        placeholder="Type the manufacturer here"
                    >
                </div>

                <!-- Shots Details -->
                <div class="form-group">
                    <label for="shotsDetailsInputForAdd">Shots Details</label>
                    <input
                        class="form-control" 
                        type="text"
                        id="shotsDetailsInputForAdd"
                        name="shotsDetails"
                        placeholder="Type the shots details here"
                    >
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="descriptionInputForAdd">Description</label>
                    <textarea 
                        class="form-control"
                        id="descriptionInputForAdd" 
                        name="description" 
                        rows="5"
                        placeholder="Type description here"
                    ></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button 
                    class="btn btn-muted" 
                    type="button"
                    data-dismiss="modal"
                >Cancel</button>
                <button 
                    class="btn btn-blue" 
                    type="submit"
                >   
                    <span>Save</span>
                    <i class="fas fa-check ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Remove Vaccine modal -->
<div 
    class           = "modal" 
    id              = "removeVaccineModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
>
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="removeVaccineForm">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Remove Vaccine</h5>
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
                <div class="d-flex">
                    <div class="display-4 mr-3">
                        <img 
                            src="<?= base_url() ?>public/images/brand/warning.svg" 
                            alt="Warning" 
                            style="width: 8rem"
                            draggable="false"
                        >
                    </div>
                    <p>Are you sure you want to remove this vaccine?</p>
                </div>

                <!-- Vaccine ID -->
                <div class="form-group d-none">
                    <input type="text" name="vaccineID">
                </div>
            </div>
            <div class="modal-footer bg-muted border-0 py-1">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button 
                    type="submit" 
                    class="btn btn-danger" 
                    id="removeVaccineModal"
                >
                    <span>Remove</span>
                    <i class="fas fa-trash-alt ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>