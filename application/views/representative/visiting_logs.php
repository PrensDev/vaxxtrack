<?php 
    $this->load->view('representative/components/modals/establishment_modals');
    $this->load->view('representative/components/modals/visiting_logs_modals');
?>

<!-- Main Content -->
<div class="container px-3 py-4">
    <?php $this->load->view('representative/components/establishment_details'); ?>

    <!-- Visiting Logs -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-book mr-1"></i>
                <span>Visiting Logbook</span>
            </div>
        </div>
        <div class="card-body">

            <!-- User Controls -->
            <div class="d-flex justify-content-between mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi-caret-left-fill"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Today</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi-caret-right-fill"></i>
                    </button>
                </div>
                <div>
                    <button 
                        class       = "btn btn-blue btn-sm"
                        id          = "scanQrCodeBtn"
                        data-toggle = "modal"
                        data-target = "#scanModal"
                    >
                        <i class="fas fa-camera mr-1"></i>
                        <span>Scan</span>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary">
                        <i class="fas fa-download mr-1"></i>
                        <span>Export</span>
                    </button>
                </div>
            </div>

            <!-- Visiting Logs Table -->
            <div class="table-responsive">
                <table 
                    class       = "table border-bottom" 
                    id          = "visitingLogsDT" 
                    width       = "100%" 
                    cellspacing = "0"
                >
                    <thead class="thead">
                        <tr>
                            <th>Name</th>
                            <th>Entry Log</th>
                            <th>Purpose</th>
                            <th>Temp</th>
                            <th>Health Status</th>
                            <th>Allowed</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Juan Dela Cruz</td>
                            <td>Today, 11:51:03 a.m.</td>
                            <td>Visiting</td>
                            <td>
                                <span class="badge alert-success text-success p-2 w-100">
                                    <span>34&deg;C</span>
                                </span>
                            </td>
                            <td>
                                <span class="badge alert-success text-success p-2 w-100">
                                    <span class="text-uppercase">No symptoms</span>
                                </span>
                            </td>
                            <td class="text-center">
                                <span 
                                    class           = "badge alert-success text-success p-2 w-100"
                                    data-toggle     = "tooltip"
                                    data-placement  = "top"
                                    title           = "Allowed to enter on the establishment"
                                >
                                    <i class="fas fa-check mr-1"></i>
                                    <span class="text-uppercase">Allowed</span>
                                </span>
                            </td>
                            <td>
                                <div class="dropdown text-center">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted"
                                            role        = "button"
                                            data-toggle = "tooltip"
                                            title       = "More"   
                                        ><i class="fas fa-ellipsis-v"></i></div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item"
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#viewVisitLogModal"
                                        >
                                            <i class="fas fa-list icon-container"></i>
                                            <span>View Log Details</span>
                                        </div>
                                        <div class="dropdown-item">
                                            <i class="far fa-edit icon-container"></i>
                                            <span>Override Log Details</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="flash-warning">
                            <td>Juan Dela Cruz</td>
                            <td>Today, 11:51:03 a.m.</td>
                            <td>Visiting</td>
                            <td>
                                <span 
                                    class           = "badge alert-warning text-warning p-2 w-100"
                                    data-toggle     = "tooltip"
                                    data-placement  = "top"
                                    title           = "High temperature"
                                >
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    <span>37.1&deg;C</span>
                                </span>
                            </td>
                            <td>
                                <span 
                                    class           = "badge alert-warning text-warning p-2 w-100"
                                    data-toggle     = "tooltip"
                                    data-placement  = "top"
                                    title           = "Has common symptoms"
                                >
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    <span class="text-uppercase">With Symptoms</span>
                                </span>
                            </td>
                            <td class="text-center">
                                <span 
                                    class           = "badge alert-danger text-danger p-2 w-100"
                                    data-toggle     = "tooltip"
                                    data-placement  = "top"
                                    title           = "Not allowed to enter in the establishment"
                                >
                                    <i class="fas fa-times mr-1"></i>
                                    <span class="text-uppercase">Not allowed</span>
                                </span>
                            </td>
                            <td>
                                <div class="dropdown text-center">
                                    <div data-toggle="dropdown">
                                        <div 
                                            class       = "btn btn-sm btn-white-muted"
                                            role        = "button"
                                            data-toggle = "tooltip"
                                            title       = "More"   
                                        ><i class="fas fa-ellipsis-v"></i></div>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right border-0">
                                        <div 
                                            class       = "dropdown-item"
                                            role        = "button"
                                            data-toggle = "modal"
                                            data-target = "#viewVisitLogModal"
                                        >
                                            <i class="fas fa-list icon-container"></i>
                                            <span>View Log Details</span>
                                        </div>
                                        <div class="dropdown-item">
                                            <i class="far fa-edit icon-container"></i>
                                            <span>Override Log Details</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script type="module">
    // Scanner Instance
    let scanner = new Html5QrcodeScanner("reader", { fps: 25, qrbox: 250 }, false);

    // On success scan
    const onScanSuccess = (qrMessage) => {
        console.log(`Data: ${ qrMessage }`);
    }

    // On failed scan
    const onScanFailure = (error) => {
        // console.warn(`QR error = ${error}`);
    }

    // Render the scanner
    scanner.render(onScanSuccess, onScanFailure);
</script>

<script>
    $.ajax({
        url: `${ REPRESENTATIVE_API_ROUTE }visiting-logs/${ establishment_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                console.log(result.data)
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in getting visiting logs');
    })

    $(() => {
        loadVisitingLogsDT();
    });

    loadVisitingLogsDT = () => {
        const dt = $('#visitingLogsDT');

        if(dt.length) {
            dt.DataTable({
                ajax: {
                    url: `${ REPRESENTATIVE_API_ROUTE }visiting-logs/${ establishment_ID }`,
                    type: 'GET',
                    headers: AJAX_HEADERS,
                },
                columns: [
                    {
                        data: null,
                        render: data => {
                            const vlb = data.visiting_log_by;

                            const fullName = vlb.last_name + ', ' + vlb.first_name;

                            return `
                                <div class="d-flex align-items-baseline">
                                    <div class="icon-container">
                                        <i class="fas fa-user-circle text-secondary"></i>
                                    </div>
                                    <div>
                                        <div>${ fullName }</div>
                                        <div class="small text-secondary">Visitor</div>
                                    </div>
                                </div>
                            `
                        }
                    },
                    {
                        data: null,
                        render: data => {
                            return `
                                <div>${ moment(data.created_datetime).format('MMM. D, YYYY') }</div>
                                <div class="small text-secondary">${ moment(data.created_datetime).fromNow() }</div>
                            `
                        }
                    },
                    { data: 'purpose'},
                    { 
                        data: null,
                        render: data => {
                            return `
                                <span class="badge alert-success text-success p-2 w-100">
                                    <span>${ data.health_status_log.temperature }&deg;C</span>
                                </span>
                            `
                        }
                    },
                    { data: 'purpose'},
                    { data: 'purpose'},
                    { data: 'purpose'},
                ],
                columnDefs: [{
                    targets: [6],
                    orderable: false
                }]
            })
        }
    }
</script>