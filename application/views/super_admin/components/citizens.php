<!-- Citizen Summary -->
<div class="card mb-4 bg-blue" id="usersCountContainer">
    <div class="card-body ml-1 bg-white py-3 rounded-lg">
        <div class="flex-separated">
            <div>
                <h6 class="text-blue">Registered Citizens</h6>
                <h2 class="font-weight-bold mb-0" id="citizensCount">0</h2>
            </div>
            <div class="flex-center alert-blue rounded-lg" style="width:75px; height:75px;">
                <h1 class="text-blue m-0">
                    <i class="fas fa-users"></i>
                </h1>
            </div>
        </div>
    </div>
</div>

<!-- Citizens List -->
<div class="card">
    <div class="card-header">
        <div class="card-header-text">
            <div class="i fas fa-users mr-1"></div>
            <span>Registered Citizens</span>
        </div>
        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table border-bottom" id="citizensDT" width="100%" cellspacing="0">
                    <thead class="thead text-nowrap">
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<25;$i++): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-baseline text-nowrap">
                                    <div class="icon-container">
                                        <i class="fas fa-user-circle text-secondary"></i>
                                    </div>
                                    <span>Juan Dela Cruz</span>
                                </div>
                            </td>
                            <td>24</td>
                            <td>
                                <i class="fas fa-mars icon-container text-blue"></i>
                                <span>Male</span>
                            </td>
                            <td>Single</td>
                            <td class="text-nowrap">Quezon City, NCR, THIRD DISTRICT</td>
                            <td>
                                <div class="dropdown">
                                    <div 
                                        class="d-inline-block"
                                        data-toggle="dropdown"
                                    >
                                        <div 
                                            class       = "btn btn-sm btn-muted"
                                            role        = "button"
                                            data-toggle = "tooltip"
                                            title       = "More"
                                        >
                                            <i class="fas fa-ellipsis-v"></i>
                                        </div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div 
                                            class="dropdown-item"
                                            data-toggle="modal"
                                            data-target=""
                                        >
                                            <div class="icon-container">
                                                <i class="fas fa-list"></i>
                                            </div>
                                            <span>View More</span>
                                        </div>
                                        <div 
                                            class="dropdown-item"
                                            data-toggle="modal"
                                            data-target=""
                                        >
                                            <div class="icon-container">
                                                <i class="fas fa-user-cog"></i>
                                            </div>
                                            <span>Make administrative action</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>