<?php $__env->startSection('content'); ?>
<?php $__env->startPush('head'); ?>
        <link rel='stylesheet' href='<?php echo asset("vendor/crudbooster/assets/select2/dist/css/select2.min.css")?>'/>
        <style>
            .select2-container--default .select2-selection--single {
                border-radius: 0px !important
            }

            .select2-container .select2-selection--single {
                height: 35px
            }
        </style>
    <?php $__env->stopPush(); ?>

    <div class="spinner-grow text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adama Science and Technology University</title>
   <meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="6UQIPQDXkyph7oCC5k02SyccX6eE5RM66IKrnxIFAvbvqrSr4ioYXYoHeDw2IeHdka7Gw7ybLqYRBczLETXgJw==" />


</head>



    <!-- Content Wrapper. Contains page content -->

    <body class="hold-transition sidebar-mini skin-black-light">

    <div class="wrapper " style="background-color: white;">

      <header class="main-header">
        <!-- Logo -->
       
          <!-- mini logo for sidebar mini 50x50 pixels -->
       

        </a>

      </header>

      <!-- Content Wrapper. Contains page content -->
         <div >

        <!-- Main content -->
        <section class="container" style="clear: both">

<fieldset>
    <legend>Academic Calendar</legend>
<form method="post" action="/saga/calander">
  <?php echo csrf_field(); ?>
  <label for="admission">Admission</label>
  <select name="admission_id" id="_admission_id"><option value="">Please select</option>
<option value="1">Undergraduate Regular</option>
<option value="2">Postgraduate Regular</option>
<option value="3">Undergraduate Extension</option>
<option value="4">Postgraduate Extension</option></select>
  <input type="submit" class="btn btn-success"name="commit" value="Search"/>
</form><hr/>

<div id="academic_calendars_list">
 <?php

  print_r($server_output);


?>
        </section>
      </div>


   </section>
      </div>


     

    </div>
    </body>

</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>