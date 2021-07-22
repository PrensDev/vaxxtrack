<div class="container px-3 py-4">

    <?php $this->load->view('all/components/header_title', [
        'title' => $user_category,
        'subtitle' => 'Manage registered users here'
    ]); ?>

    <!-- Sessioned Alert -->
    <?php if($this->session->has_userdata('alert')): ?>
        <div class="alert alert-<?= $this->session->alertTheme ?> alert-dismissible fade show mb-4" role="alert" id="alert">
            <div><?= $this->session->alertMessage ?></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <?php 
        if($user_category === 'Citizens') 
            $this->load->view('super_admin/components/citizens');
        if($user_category === 'Establishment Representatives') 
            $this->load->view('super_admin/components/representatives');
        if($user_category === 'Health Officials') 
            $this->load->view('super_admin/components/health_officials');
        if($user_category === 'Super Admins') 
            $this->load->view('super_admin/components/super_admins');
    ?>
</div>