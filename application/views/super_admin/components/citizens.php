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
                            <th>Date Registered (hidden)</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>