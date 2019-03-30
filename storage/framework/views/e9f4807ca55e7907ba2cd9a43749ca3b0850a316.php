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
 <div class="box-body">

    <form action="curriculum" method="post">
        <?php echo e(csrf_field()); ?>



        College:
        <select name="structure_id" id="structure_id"><option value="2">Division of Freshman Program</option>
<option value="3">School of Applied Natural Sciences</option>
<option value="4">School of Civil Engineering and Architecture</option>
<option value="5">School of Electrical Engineering &amp; Computing</option>
<option value="8">School of Humanities and Law</option>
<option value="6">School of Libral Arts and Social Science</option>
<option value="7">School of Mechanical, Chemical &amp; Materials Engineering</option></select><br><br>
        <input type="submit" name="commit" value="Search Programs" class="btn btn-primary" />
</form>    <div id="available_programs_list" class="data-table" style="display:block;">
<?php
  print_r($server_output);
  print_r($htmlContent);
?>
    
</div>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>