<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Vaccination Card',
        'subtitle' => 'This is your vaccination card and will include your vaccination records'
    ]); ?>

    <!-- Vaccination Card -->
    <div>
        <div class="flex-center mb-3">
            <div class="overflow-auto">
                <div class="card border" id="vaccinationCard" style="min-width: 750px; max-width: 750px;">
                    <div class="card-body">

                        <!-- Vaccination Card Header -->
                        <div class="mb-3">
                            <h3>COVID-19 Vaccination Record Card</h3>
                            <hr class="my-2">
                            <div>Please keep this record card, which includes medical information about the vaccines you have received</div>
                        </div>
                    
                        <!-- Patient Full Name -->
                        <div class="row mb-2">
                            <div class="col-5">
                                <span id="citizenLastName"></span>
                                <hr class="my-0">
                                <span class="font-weight-semibold small">Last Name</span>
                            </div>
                            <div class="col-6">
                                <span id="citizenFirstName">Juan</span>
                                <hr class="my-0">
                                <span class="font-weight-semibold small">First Name</span>
                            </div>
                            <div class="col-1">
                                <span id="citizenMiddleInitial">S.</span>
                                <hr class="my-0">
                                <span class="font-weight-semibold small">MI</span>
                            </div>
                        </div>

                        <!-- Patient Details -->
                        <div class="row mb-2">
                            <div class="col-6">
                                <span id="citizenBirthDate">July 12, 1998,</span>
                                <hr class="my-0">
                                <span class="font-weight-semibold small">Date of Birth</span>
                            </div>
                            <div class="col-6">
                                <span id="citizenNumber">ABC-00001-BSIT</span>
                                <hr class="my-0">
                                <span class="font-weight-semibold small">Patient Number</span>
                            </div>
                        </div>

                        <!-- Patient Vaccination Records -->
                        <table class="table table-bordered">
                            <thead class="thead text-center">
                                <th>Vaccine</th>
                                <th>Product Name/Manufacturer Name</th>
                                <th>Date</th>
                                <th>Health Care Professional/Clinic Site</th>
                            </thead>
                            <tbody id="vaccCardDataRows">
                                <tr>
                                    <td>1<sup>st</sup> Dose</td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                    <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                <tr>
                                    <td>2<sup>nd</sup> Dose</td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                    <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                </tr>
                                <tr>
                                    <td>Other</td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                    <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                </tr>
                                <tr>
                                    <td>Other</td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                    <td><i class="text-muted font-weight-normal">--:--:--</i></td>
                                    <td><i class="text-muted font-weight-normal">No data yet</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-blue">
                <span>Print my card</span>
                <i class="fas fa-print ml-1"></i>
            </button>
        </div>
    </div>
</div>
