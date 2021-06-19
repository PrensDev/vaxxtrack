<!-- 
 | =============================================================================
 | COMMON AND AJAX SCRIPTS
 | =============================================================================
 -->

<!-- Common Scripts -->
<script src="<?= base_url() . 'public/js/commons/' . $dir . '.common.js' ?>"></script>

<!-- AJAX Scripts for all pages -->
<script src="<?= base_url() ?>public/js/ajax/all/cases_status.ajax.js"></script>
<script src="<?= base_url() ?>public/js/ajax/all/vaccination_status.ajax.js"></script>

<!-- AJAX Scripts -->
<?php if($AJAX_files != []) foreach($AJAX_files as $file) { ?>
    <script src="<?= base_url() . 'public/js/ajax/' . $dir . '/' .  $file ?>.ajax.js"></script>
<?php } ?>