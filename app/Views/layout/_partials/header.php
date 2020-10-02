<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title; ?></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('modules/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/fontawesome/css/all.min.css'); ?>">
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('modules/jqvmap/dist/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/summernote/summernote-bs4.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/owlcarousel2/dist/assets/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/owlcarousel2/dist/assets/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/weather-icon/css/weather-icons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/weather-icon/css/weather-icons-wind.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/chocolat/dist/css/chocolat.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/prism/prism.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/dropzonejs/dropzone.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/bootstrap-social/bootstrap-social.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/bootstrap-daterangepicker/daterangepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/select2/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/jquery-selectric/selectric.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/codemirror/lib/codemirror.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/codemirror/theme/duotone-dark.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/fullcalendar/fullcalendar.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/datatables/datatables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('modules/izitoast/css/iziToast.min.css'); ?>">
  
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/components.css'); ?>">
    
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        
        function gtag(){
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
<?php
    echo view('layout/_partials/layout');
    echo view('layout/_partials/sidebar');
?>
    <?= 
        $this->renderSection('content') 
    ?>
    
    
    <?= 
        $this->renderSection('footer') 
    ?>
    <!-- Template JS File -->
    <!-- se cargan en "js.php" -->
</body>
</html>