<?php $__env->startSection('content'); ?>

<?php if(count($posts) >  0): ?>

<h2>New Evaluation Posts.</h2>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div align="center">
<h2><a href=""><?php echo e($row->cms_users->name); ?></a></h2>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>

<h2>No Evaluation Posts for now.</h2>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>