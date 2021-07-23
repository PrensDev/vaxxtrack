<div class="container p-3">
    
    <?php $this->load->view('all/components/header_title', [
        'title' => 'Probable Contacts',
        'subtitle' => 'View the list of all probable contacts here'
    ]); ?>
    
    <div class="card">
        <div class="card-header">
            <div class="card-header-text">
                <i class="fas fa-list mr-1"></i>
                <span>Contacts</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table w-100" id="contactsDT" width="100%" cellspacing="0">
                    <thead class="thead">
                        <th>Added At (hidden)</th>
                        <th>Contact Person</th>
                        <th>Case Origin</th>
                        <th>Added At</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>