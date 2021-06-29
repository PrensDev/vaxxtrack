<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Health Status Logbook',
        'subtitle' => 'Track your daily health status here'
    ]); ?>

    <!-- Visiting Records -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-book mr-1"></i>
                <span>Health Status Logs</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="visitingLogsDT">
                    <thead class="thead">
                        <th>Date Recorded</th>
                        <th>Temperature</th>
                        <th>Overall Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td>March 1, 2020</td>
                        <td>37&deg;C</td>
                        <td>Healthy</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <div data-toggle="dropdown">
                                    <div class="btn btn-sm btn-white-muted">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>