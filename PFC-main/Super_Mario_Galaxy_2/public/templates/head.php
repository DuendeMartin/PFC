<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Super Mario Galaxy 2 Wiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo baseUrl(); ?>/templates/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="<?php echo baseUrl(); ?>/templates/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo baseUrl(); ?>/templates/assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-stylesheet" />

    <link href="<?php echo baseUrl(); ?>/templates/fontawesome-free-6.6.0-web/css/all.css" rel="stylesheet" />

    <link href="<?php echo baseUrl(); ?>/templates/assets/libs/datatables/dataTables.bootstrap4.min.css"
        rel="stylesheet" />
    <link href="<?php echo baseUrl(); ?>/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
    <style>
        .help-block {
            color: #ff0000;
        }

        body {
            background-image: url("<?php echo baseUrl(); ?>/templates/assets/images/bg.jpg");
            background-size: cover;
            background-position: center;
        }

        body * {
            color: white !important;
        }

        #topnav,
        #topnav *,
        .footer,
        .submenu,
        .submenu * {
            background-color: red !important;
        }

        #navigation {
            padding: 20px;
            display: flex !important;
            gap: 20px 20px;
        }

        .form-control,
        .form-control *,
        select,
        select *,
        input,
        input * {
            color: black !important;
        }

        .table thead th {
            vertical-align: top;
        }
    </style>
</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="wrapper">