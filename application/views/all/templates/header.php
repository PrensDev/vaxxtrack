<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page Title -->
    <title><?= $title ?> | COVID-19 Contact Tracing App and Vaccine Monitoring System</title>

    <!-- 
    | =======================================================================================
    | REQUIRED META TAGS
    | =======================================================================================
    -->

    <meta charset="utf-8">
    <meta name="viewport"       content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author"         content="PrensDev">
    <meta name="description"    content="COVID-19 Contact Tracing App and Vaccine Monitoring System">

    <!-- Website Icon -->
    <link rel="icon" href="<?= base_url() ?>public/images/brand/icon.png">

    <!-- 
    | =======================================================================================
    | CSS LINKS
    | =======================================================================================
    -->

    <!-- Bootstrap-icons -->
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/bootstrap-icons/font/bootstrap-icons.css">

    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

    <!-- Bootstrap-select -->
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
    
    <!-- Font-awesome icons -->
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- Leaflet CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>node_modules/leaflet/dist/leaflet.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>

    <!-- Custom CSS (includes Bootstrap) -->
    <link rel="stylesheet" href="<?= base_url() ?>public/css/styles.css">

    <!-- 
    | =======================================================================================
    | SCRIPTS
    | =======================================================================================
    -->

    <!-- JQuery -->
    <script src="<?= base_url() ?>node_modules/jquery/dist/jquery.js"></script>

    <!-- jQuery Validation -->
    <script src="<?= base_url() ?>node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- Moment JS -->
    <script src="<?= base_url() ?>node_modules/moment/min/moment.min.js"></script>

    <!-- Moment-Timer JS -->
    <script src="<?= base_url() ?>node_modules/moment-timer/lib/moment-timer.js"></script>

    <!-- Leaflet JS Library -->
    <script src="<?= base_url() ?>node_modules/leaflet/dist/leaflet.js"></script>

    <!-- Heatmap JS -->
    <script src="<?= base_url() ?>node_modules/heatmap.js/build/heatmap.js"></script>

    <!-- Heatmap JS with Leaflet Plugin -->
    <script src="<?= base_url() ?>node_modules/heatmap.js/plugins/leaflet-heatmap/leaflet-heatmap.js"></script>

    <!-- 
    | =======================================================================================
    | CUSTOM SCRIPTS
    | =======================================================================================
    -->

    <!-- constants -->
    <script src="<?= base_url() ?>public/js/constants.js"></script>

</head>

<body class="user-select-none modal-open">

<?php 
    // Preloader 
    $this->load->view('all/components/preloader');

    // Error Modal
    $this->load->view('all/components/modals/error_modal');
?>