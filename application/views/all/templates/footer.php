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

<?php if(isset($this->session->user_ID) && isset($this->session->user_type)): ?>

<!-- DataTables JS -->
<script src="<?= base_url() ?>node_modules/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap JS -->
<script src="<?= base_url() ?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- QRCode.js -->
<script src="<?= base_url() ?>node_modules/qrcodejs/qrcode.min.js"></script>

<!-- HTML5-QRCOde -->
<script src="<?= base_url() ?>node_modules/html5-qrcode/minified/html5-qrcode.min.js"></script>

<?php endif ?>

<!-- 
| =======================================================================================
| CUSTOM SCRIPTS
| =======================================================================================
-->

<!-- App JS -->
<script src="<?= base_url() ?>public/js/app.js"></script>

</body>
</html>