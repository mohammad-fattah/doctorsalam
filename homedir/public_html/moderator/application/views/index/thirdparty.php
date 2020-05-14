<!DOCTYPE html>
<html lang="fa" dir="rtl">
 <?php $this->load->view('includes/headsite'); ?>
 <body>
  <div id="app">
   <?php $this->load->view('includes/header'); ?>
  </div>
  <script type="text/javascript" src="/moderator/assets/shop/js/insurance/jquery.min.js"></script>
  <script  type="text/javascript" src="/moderator/assets/shop/js/insurance/jquery.number.min.js"></script>
  <div class="container container-car-body compare-form fadeIn divmain">
   <?php $this->load->view('includes/thirdparty_main'); ?>
  </div>
  <div class="container container-car-body compare-form fadeIn divpic" style="display:none">
   <?php //$this->load->view('includes/thirdparty_pic'); ?>
  </div>
  <script src="/moderator/assets/shop/js/insurance/persianDatepicker.min.js" type="text/javascript"></script>
  <script>
   var diffDays=0;
   var tg=1;
   var machine='<?php echo $car; ?>';
   var id='<?php echo $id; ?>';
   var model='';
   var off='<?php echo $off; ?>';
   var compare="/webservice/insurance/thirdparty.php";
   var level1="/webservice/l1.php";
   var poshesh=9;
   var passenger='passenger';
  </script>
  <script src="/moderator/assets/shop/js/insurance/thirdparty.js"></script>
  <script src="/moderator/assets/shop/js/insurance/bootstrap-datepicker.min.js"></script>
  <script src="/moderator/assets/shop/js/insurance/bootstrap-datepicker.fa.min.js"></script>
  <script src="/moderator/assets/shop/js/insurance/thirdparty_date.js"></script>
  <?php //$this->load->view('includes/footer'); ?>