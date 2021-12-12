<?php require_once "core/base.php" ?>
<?php require_once  "core/functions.php" ?>
<?php global $url; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/data_table/dataTables.bootstrap4.min.css">
    <title>Contacts</title>
</head>
<body>

<div class="container">
    <div class="row my-3">
        <div class="col-12">
            <h1 class="fw-bolder text-center mb-3 ">
                CONTACTS <i class="feather-users"></i>
            </h1>
        </div>
        <?php include "sidebar.php"; ?>
