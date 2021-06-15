<div class="container px-3 py-sm-3 py-sm-4">

    <!-- Profile Header -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="m-0">Your Visiting Logboook</h2>
            <div class="text-secondary">Track the establishments you visited here</div>
        </div>
        
        <div class="card d-none d-md-block">
            <div class="card-body text-monospace">
                <span id="clockDate"></span>,
                <span id="clockTime"></span>
                <span id="clockSession"></span>
            </div>
        </div>
    </div>

    <!-- Visiting Records -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-book mr-1"></i>
                <span>Visiting Logbook</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead class="thead">
                        <th>Establishment</th>
                        <th>Location</th>
                        <th>Purpose</th>
                        <th>Temp</th>
                        <th>Health Status</th>
                        <th>Allowed</th>
                        <th>Date & Time Entered</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<20;$i++) { ?>
                        <tr>
                            <td>ABC Company</td>
                            <td>Commonwaelth, Quezon City</td>
                            <td>Visiting</td>
                            <td>
                                <div class="badge alert-success text-success p-2 w-100">
                                    <span>34.5&deg;C</span>
                                </div>
                            </td>
                            <td>
                                <div class="badge alert-success text-success p-2 w-100">
                                    <span>No symptoms</span>
                                </div>
                            </td>
                            <td>
                                <div class="badge alert-success text-success p-2 w-100">
                                    <i class="fas fa-check mr-1"></i>
                                    <span>Allowed</span>
                                </div>
                            </td>
                            <td>February 3, 2021; 11:54 AM</td>
                            <td class="text-center">
                                <span data-toggle="tooltip" title="View Full Details">
                                    <div 
                                        class       = "btn btn-white-muted btn-sm"
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#visitingLogDetailsModal"
                                    >
                                        <i class="far fa-file-alt"></i>
                                    </div>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>