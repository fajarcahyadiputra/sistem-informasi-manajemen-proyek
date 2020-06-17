<?php if (!$this->session->userdata('username')) {

  redirect('auth');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title><?php echo $title ?></title>
    <!-- jquery -->
    <script src="<?php echo base_url('assets/') ?>ruangAdmin/vendor/jquery/jquery.min.js"></script>
    <!-- fontawesome -->
    <link href="<?php echo base_url('assets/') ?>ruangAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/') ?>ruangAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- ruangadmin -->
    <link href="<?php echo base_url('assets/') ?>ruangAdmin/css/ruang-admin.min.css" rel="stylesheet">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatable/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script type="text/javascript">
      let base_url = '<?php echo base_url() ?>';
    </script>
  </head>

  <body id="page-top">
  <?php } ?>