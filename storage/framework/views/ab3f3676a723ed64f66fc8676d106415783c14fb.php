<!-- Bootstrap 3.3.2 -->
<link href="<?php echo e(asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css"/>
<!-- Font Awesome Icons -->
<link href="<?php echo e(asset("vendor/crudbooster/assets/adminlte/font-awesome/css")); ?>/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- Ionicons -->
<link href="<?php echo e(asset("vendor/crudbooster/ionic/css/ionicons.min.css")); ?>" rel="stylesheet" type="text/css"/>
<!-- Theme style -->
<link href="<?php echo e(asset("vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css")); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset("vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css")); ?>" rel="stylesheet" type="text/css"/>

<?php echo $__env->make('crudbooster::admin_template_plugins', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php
$name = Request::get('name_column');
$coloms_alias = explode(',', 'ID,'.Request::get('columns_name_alias'));
if (count($coloms_alias) < 2) {
    $coloms_alias = $columns;
}
?>
<form method='get' action="">
    <?php echo CRUDBooster::getUrlParameters(['q']); ?>

    <input type="text" placeholder="<?php echo e(trans('crudbooster.datamodal_search_and_enter')); ?>" name="q" title="<?php echo e(trans('crudbooster.datamodal_enter_to_search')); ?>"
           value="<?php echo e(Request::get('q')); ?>" class="form-control">
</form>

<table id='table_dashboard' class='table table-striped table-bordered table-condensed' style="margin-bottom: 0px">
    <thead>
    <?php $__currentLoopData = $coloms_alias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <th><?php echo e($col); ?></th>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <th width="5%"><?php echo e(trans('crudbooster.datamodal_select')); ?></th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $img_extension = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                $ext = pathinfo($row->$col, PATHINFO_EXTENSION);
                if ($ext && in_array($ext, $img_extension)) {
                    echo "<td><a href='".asset($row->$col)."' data-lightbox='roadtrip'><img src='".asset($row->$col)."' width='50px' height='30px'/></a></td>";
                } else {
                    echo "<td>".str_limit(strip_tags($row->$col), 50)."</td>";
                }
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
            $select_data_result = [];
            $select_data_result['datamodal_id'] = $row->id;
            $select_data_result['datamodal_label'] = $row->{$columns[1]} ?: $row->id;
            $select_data = Request::get('select_to');
            if ($select_data) {
                $select_data = explode(',', $select_data);
                if ($select_data) {
                    foreach ($select_data as $s) {
                        $s_exp = explode(':', $s);
                        $field_name = $s_exp[0];
                        $target_field_name = $s_exp[1];
                        $select_data_result[$target_field_name] = $row->$field_name;
                    }
                }
            }
            ?>
            <td><a class='btn btn-primary' href='javascript:void(0)' onclick='parent.selectAdditionalData<?php echo e($name); ?>(<?php echo json_encode($select_data_result); ?>)'><i
                            class='fa fa-check-circle'></i> <?php echo e(trans('crudbooster.datamodal_select')); ?></a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div align="center"><?php echo str_replace("/?","?",$result->appends(Request::all())->render()); ?></div>