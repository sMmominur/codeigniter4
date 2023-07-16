<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="mominur rahman project">
<meta name="keywords" content="project, mominur">
<meta name="author" content="mominur">
<meta name="robots" content="noindex, nofollow">

<!-- Base URL for assets -->
<?php 
    helper('html'); 
    $urlPrefix = 'template/assets/';
?>

<!-- Favicon -->
<?php echo link_tag($urlPrefix.'img/favicon.jpg', 'shortcut icon', 'image/x-icon');?>

<!-- Bootstrap CSS -->
<?php echo link_tag($urlPrefix.'css/bootstrap.min.css');?>

<!-- Fontawesome CSS -->
<?php echo link_tag($urlPrefix.'css/font-awesome.min.css');?>

<!-- Lineawesome CSS -->
<?php echo link_tag($urlPrefix.'css/line-awesome.min.css');?>

<!-- Chart CSS -->
<?php echo link_tag($urlPrefix.'plugins/morris/morris.css');?>

<!-- Select2 CSS -->
<?php echo link_tag($urlPrefix.'css/select2.min.css');?>

<!-- Datatable CSS -->
<?php echo link_tag($urlPrefix.'css/dataTables.bootstrap4.min.css');?>

<!-- Main CSS -->
<?php echo link_tag($urlPrefix.'css/style.css');?>
