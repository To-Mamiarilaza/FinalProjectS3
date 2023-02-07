<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fontawesome-5/css/all.min.css"); ?>">
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php $this->load->view("header"); ?>
    <?php $this->load->view($content); ?>
    <?php $this->load->view("footer"); ?>

    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
</body>
</html>