<!-- View Representative Modal -->
<div class="modal fade" id="viewRepresentativeModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-tie"></h5>
                <h5 class="modal-title">Representative Details</h5>
                <button 
                    class           ="btn btn-sm btn-muted" 
                    type            ="button" 
                    class           ="close" 
                    data-dismiss    ="modal" 
                    aria-label      ="Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>Dela Cruz, Juan</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>Dean</td>
                    </tr>
                    <tr>
                        <th>Account</th>
                        <td>juandelacruz@email.com</td>
                    </tr>
                    <tr>
                        <th>Added at</th>
                        <td>May 1, 2021</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>May 1, 2021</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                <a 
                    href    = "<?= base_url() ?>r/edit-representative/1/1"
                    class   = "btn btn-blue">
                    <i class="fas fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Remove Representative Modal -->
<div class="modal" id="removeRepresentativeModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Remove representative</h5>
                <button 
                    class        = "btn btn-sm btn-muted" 
                    type         = "button" 
                    class        = "close" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove this representative?</p>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>Dela Cruz, Juan</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>Dean</td>
                    </tr>
                    <tr>
                        <th>Account</th>
                        <td>juandelacruz@email.com</td>
                    </tr>
                    <tr>
                        <th>Added at</th>
                        <td>May 1, 2021</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>May 1, 2021</td>
                    </tr>
                </table>
                <p>Type "<b>CONFIRM</b>" in the field below if you want to continue</p>

                <div class="form-group">
                    <input type="text" class="form-control">
                </div>

                <p class="text-danger small font-italic">Once you submit, you can never undo this action.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" disabled>Remove</button>
            </div>
        </div>
    </div>
</div>

<!-- Establishment Modals -->
<?php $this->load->view('representative/components/modals/establishment_modals') ?>

<!-- Main Content -->
<div class="container px-3 py-4">

    <?php $this->load->view('representative/components/establishment_details') ?>

    <!-- Alert box for new representative -->
    <div class="alert alert-info alert-dismissible fade show mb-4" role="alert" id="accountNotFoundAlert">
        <span>
            <i class="fas fa-exclamation mr-1 text-secondary"></i>
            <span>New representative is successfully added.</span>
        </span>
        <button class="close" data-dismiss="alert">
            <i class="bi-x"></i>
        </button>
    </div>

    <!-- Representatives -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-users"></i>
                <span>Representatives</span>
            </div>
        </div>
        <div class="card-body py-2">
            <div class="d-flex align-items-center justify-content-between mt-2 mb-4">
                <span>You have 5 representatives, including yourself</span>
                <a href="<?= base_url() ?>r/add-representative/1" class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus mr-1"></i>
                    <span>Add new representative</span>
                </a>
            </div>

            <!-- Representative List -->
            <div class="row">
                <?php for($i=0;$i<5;$i++) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-02 my-2">
                        <div class="text-center border px-4 py-2 rounded">
                            <div class="display-1 mb-2">
                                <i class="fas fa-user-tie text-muted"></i>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <h5 class="text-uppercase mb-1">Juan Dela Cruz</h5>
                                    <small>Added May 1, 2021</small>
                                </div>
                                <div>
                                    <span class="badge alert-blue text-blue text-uppercase text-blue p-2">
                                        <i class="fas fa-user-tie mr-1"></i>
                                        <span>Manager</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-4">

                                <!-- View details button -->
                                <div class="col px-1">
                                    <div
                                        data-toggle    = "tooltip"
                                        data-placement = "top"
                                        title          = "View"
                                    >
                                        <div 
                                            class       = "btn btn-sm btn-block btn-outline-secondary border-0"
                                            data-toggle = "modal"
                                            data-target = "#viewRepresentativeModal"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit details button -->
                                <div class="col px-1">
                                    <a 
                                        href           = "#" 
                                        class          = "btn btn-sm btn-block btn-outline-blue border-0"
                                        data-toggle    = "tooltip"
                                        data-placement = "top"
                                        title          = "Edit Details"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>

                                <!-- Remove representative button -->
                                <div class="col px-1">
                                    <div
                                        data-toggle    = "tooltip"
                                        data-placement = "top"
                                        title          = "Remove"
                                    >
                                        <div 
                                            class       = "btn btn-sm btn-block btn-outline-danger border-0"
                                            data-toggle = "modal"
                                            data-target = "#removeRepresentativeModal"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>