<div class="container px-3 py-4">
    
    <?php $this->load->view('all/components/header_title', [
        'title' => 'COVID-19 Cases Heatmap',
        'subtitle' => 'Trace COVID cases with this heatmap'
    ]); ?>

    <?php $this->load->view('all/components/heatmap_status') ?>

</div>