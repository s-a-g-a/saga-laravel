<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('crudbooster::statistic_builder.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::statistic_builder.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>