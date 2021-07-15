<div class="container px-3 py-sm-3 py-sm-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => 'Your Visiting Logboook',
        'subtitle' => 'Track the establishments you visited here'
    ]); ?>

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
                <table class="table w-100" id="visitingLogsDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <th>Date and Time Entered (hidden)</th>
                        <th>Establishment</th>
                        <th>Purpose</th>
                        <th>Temp</th>
                        <th>Health Status</th>
                        <th>Allowed</th>
                        <th>Date & Time Entered</th>
                        <th></th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>