<!-- 
| =======================================================================================
| SCRIPTS
| =======================================================================================
-->

<!-- jQuery JS -->
<script src="<?= base_url() ?>node_modules/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="<?= base_url() ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap-select -->
<script src="<?= base_url() ?>node_modules/bootstrap-select/js/bootstrap-select.js"></script>

<!-- jQuery Validation -->
<script src="<?= base_url() ?>node_modules/jquery-validation/dist/jquery.validate.min.js"></script>


<!-- 
| =======================================================================================
| SCRIPTS FOR SESSIONED PAGES
| ---------------------------------------------------------------------------------------
| This has been done in order for the web app to load only necessary scripts thus improve
| loading time and performance
| =======================================================================================
-->

<?php if(isset($this->session->user_ID) && isset($this->session->user_type)): ?>

<!-- DataTables JS -->
<script src="<?= base_url() ?>node_modules/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap JS -->
<script src="<?= base_url() ?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- QRCode.js -->
<script src="<?= base_url() ?>node_modules/qrcodejs/qrcode.min.js"></script>

<!-- HTML5-QRCode -->
<script src="<?= base_url() ?>node_modules/html5-qrcode/minified/html5-qrcode.min.js"></script>

<?php endif ?>


<!-- 
| =======================================================================================
| CUSTOM SCRIPT
| =======================================================================================
-->

<script src="<?= base_url() ?>public/js/app.js"></script>


<!-- 
| =======================================================================================
| COMMON AND AJAX SCRIPTS
| ---------------------------------------------------------------------------------------
| * Common scripts are scripts loaded only for specific user
| * AJAX scripts are scripts loaded for handling and executing AJAX functions and methods
| =======================================================================================
-->

<!-- AJAX Scripts for all pages -->
<script src="<?= base_url() ?>public/js/ajax/all/cases_status.ajax.js"></script>
<script src="<?= base_url() ?>public/js/ajax/all/vaccination_status.ajax.js"></script>

<!-- Common Scripts -->
<script src="<?= base_url() . 'public/js/commons/' . $dir . '.common.js' ?>"></script>

<!-- AJAX Scripts -->
<?php if(isset($AJAX_files) && $AJAX_files != []) foreach($AJAX_files as $file): ?>
    <script src="<?= base_url() . 'public/js/ajax/' . $dir . '/' .  $file ?>.ajax.js"></script>
<?php endforeach ?>

</body>
</html>