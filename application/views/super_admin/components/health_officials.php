<!-- Health Officials Summary -->
<div class="card mb-4 bg-blue" id="usersCountContainer">
    <div class="card-body ml-1 bg-white py-3 rounded-lg">
        <div class="flex-separated">
            <div>
                <h6 class="text-blue">Registered Health Officials</h6>
                <h2 class="font-weight-bold mb-0" id="healthOfficialsCount">0</h2>
            </div>
            <div class="flex-center alert-blue rounded-lg" style="width:75px; height:75px;">
                <h1 class="text-blue m-0">
                    <i class="fas fa-users"></i>
                </h1>
            </div>
        </div>
    </div>
</div>

<!-- Health Officials List -->
<div class="card">
    <div class="card-header">
        <div class="card-header-text">
            <div class="i fas fa-users mr-1"></div>
            <span>Health Officials</span>
        </div>
        <div class="card-body px-0">
            <div class="form-group text-center">
                <a href="<?= base_url() ?>admin/register/health-official" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-1"></i>
                    <span>Register new Health Official</>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table border-bottom" id="healthOfficialsDT" width="100%" cellspacing="0">
                    <thead class="thead text-nowrap">
                        <tr>
                            <th>Name</th>
                            <th>Added By</th>
                            <th>Added At</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>