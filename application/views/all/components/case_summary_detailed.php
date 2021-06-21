<!-- COVID-19 Cases Summary -->
<div class="form-row mb-4" id="casesSummaryContainer">

    <!-- Main Summary -->
    <div class="col-12 col-lg-7 col-xl-8">
        <div class="form-row">
            
            <!-- Total Case -->
            <div class="col-12 mb-4 mb-lg-2">
                <div class="card h-100 bg-info">
                    <div class="card-body py-3 rounded-lg bg-white ml-1 text-info flex-separated">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="font-weight-semibold">Total Cases</h6>
                            <h1 class="font-weight-bold mb-0" id="totalCasesData">0</h1>
                        </div>
                        <div>
                            <img 
                                src       = "<?= base_url() ?>public/images/brand/medical_research.svg"
                                style     = "width: 125px" 
                                alt       = "COVID-19 Total Cases"
                                draggable = "false"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Cases -->
            <div class="col-12 col-xl-4 mb-4 mb-lg-2">
                <div class="card bg-warning h-100">
                    <div class="card-body py-3 rounded-lg bg-white ml-1 text-warning d-flex flex-column justify-content-center">
                        <h6 class="font-weight-semibold">Active Cases</h6>
                        <h4 class="font-weight-bold mb-0" id="activeCasesData">0</h4>
                    </div>
                </div>
            </div>

            <!-- Recovered -->
            <div class="col-6 col-xl-4 mb-4 mb-lg-2">
                <div class="card bg-success h-100">
                    <div class="card-body py-3 rounded-lg bg-white ml-1 text-success d-flex flex-column justify-content-center">
                        <h6 class="font-weight-semibold">Recovered</h6>
                        <h4 class="font-weight-bold mb-0" id="recoveredCasesData">0</h4>
                    </div>
                </div>
            </div>

            <!-- Died -->
            <div class="col-6 col-xl-4 mb-4 mb-lg-2">
                <div class="card bg-secondary h-100">
                    <div class="card-body py-3 rounded-lg bg-white ml-1 text-secondary d-flex flex-column justify-content-center">
                        <h6 class="font-weight-semibold">Died</h6>
                        <h4 class="font-weight-bold mb-0" id="diedCasesData">0</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Cases Summary -->
    <div class="col-12 col-lg-5 col-xl-4 mb-4">
        <div class="card bg-warning">
            <div class="card-body py-3 rounded-lg bg-white mt-1">
                <h6 class="text-warning">Active Cases</h6>
                <table class="table table-sm m-0">

                    <!-- Asymptomatic Cases Data -->
                    <tr>
                        <td class="font-weight-semibold">
                            <i class="fas fa-circle text-secondary mr-1"></i>
                            <span>Asymptomatic</span>
                        </td>
                        <td class="text-right font-weight-bold text-secondary" id="asymptomaticCasesData">0</td>
                    </tr>

                    <!-- Mild Cases Data -->
                    <tr>
                        <th class="font-weight-semibold">
                            <i class="fas fa-circle text-info mr-1"></i>
                            <span>Mild</span>
                        </th>
                        <td class="text-right font-weight-bold text-info" id="mildCasesData">0</td>
                    </tr>

                    <!-- Severe Cases Data -->
                    <tr>
                        <th class="font-weight-semibold">
                            <i class="fas fa-circle text-warning mr-1"></i>
                            <span>Severe</span>
                        </th>
                        <td class="text-right font-weight-bold text-warning" id="severeCasesData">0</td>
                    </tr>

                    <!-- Critical Cases Data -->
                    <tr class="border-bottom">
                        <th class="font-weight-semibold">
                            <i class="fas fa-circle text-danger mr-1"></i>
                            <span>Critical</span>
                        </th>
                        <td class="text-right font-weight-bold text-danger" id="criticalCasesData">0</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>