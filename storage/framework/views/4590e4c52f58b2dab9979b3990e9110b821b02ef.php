<div class='form-group form-datepicker <?php echo e($header_group_class); ?> <?php echo e(($errors->first($name))?"has-error":""); ?>' id='form-group-<?php echo e($name); ?>'
     style="<?php echo e(@$form['style']); ?>">
    <label class='control-label col-sm-2'><?php echo e($form['label']); ?>

        <?php if($required): ?>
            <span class='text-danger' title='<?php echo trans('crudbooster.this_field_is_required'); ?>'>*</span>
        <?php endif; ?>
    </label>

    <div class="<?php echo e($col_width?:'col-sm-10'); ?>">

        <?php
        $datamodal_field = explode(',', $form['datamodal_columns'])[0];
        $datamodal_value = DB::table($form['datamodal_table'])->where('id', $value)->first()->$datamodal_field;

        ?>

        <div id='<?php echo e($name); ?>' class="input-group">
            <input type="hidden" name="<?php echo e($name); ?>" class="input-id" value="<?php echo e($value); ?>">
            <input type="text" class="form-control input-label <?php echo e($required?"required":""); ?>" <?php echo e($required?"required":""); ?> value="<?php echo e($datamodal_value); ?>" readonly>
            <span class="input-group-btn">
        <button class="btn btn-primary" onclick="showModal<?php echo e($name); ?>()" type="button"><i class='fa fa-search'></i> <?php echo e(trans('crudbooster.datamodal_browse_data')); ?></button>
                <?php if(strlen($form['datamodal_module_path']) > 1){ ?>
                <a class="btn btn-info" href="<?php echo e(CRUDBooster::adminPath()); ?>/<?php echo e($form['datamodal_module_path']); ?>" target="_blank"><i
                            class='fa fa-edit'></i> <?php echo e($form['label']); ?></a>
                <?php } ?>
      </span>
        </div><!-- /input-group -->

        <div class="text-danger"><?php echo $errors->first($name)?"<i class='fa fa-info-circle'></i> ".$errors->first($name):""; ?></div>
        <p class='help-block'><?php echo e(@$form['help']); ?></p>
    </div>
</div>

<?php $__env->startPush('bottom'); ?>
    <script type="text/javascript">
        var url_<?php echo e($name); ?> = "<?php echo e(CRUDBooster::mainpath('modal-data')); ?>?table=<?php echo e($form['datamodal_table']); ?>&columns=id,<?php echo e($form['datamodal_columns']); ?>&name_column=<?php echo e($name); ?>&where=<?php echo e(urlencode($form['datamodal_where'])); ?>&select_to=<?php echo e(urlencode($form['datamodal_select_to'])); ?>&columns_name_alias=<?php echo e(urlencode($form['datamodal_columns_alias'])); ?>";

        function showModal<?php echo e($name); ?>() {
            $('#iframe-modal-<?php echo e($name); ?>').attr('src', url_<?php echo e($name); ?>);
            $('#modal-datamodal-<?php echo e($name); ?>').modal('show');
        }

        function hideModal<?php echo e($name); ?>() {
            $('#modal-datamodal-<?php echo e($name); ?>').modal('hide');
        }

        function selectAdditionalData<?php echo e($name); ?>(select_to_json) {
            $.each(select_to_json, function (key, val) {
                console.log('#' + key + ' = ' + val);
                if (key == 'datamodal_id') {
                    $('#<?php echo e($name); ?> .input-id').val(val);
                }
                if (key == 'datamodal_label') {
                    $('#<?php echo e($name); ?> .input-label').val(val);
                }
                $('#' + key).val(val).trigger('change');
            })
            hideModal<?php echo e($name); ?>();
        }
    </script>


    <div id='modal-datamodal-<?php echo e($name); ?>' class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog <?php echo e($form['datamodal_size']=='large'?'modal-lg':''); ?> " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class='fa fa-search'></i> <?php echo e(trans('crudbooster.datamodal_browse_data')); ?> | <?php echo e($form['label']); ?></h4>
                </div>
                <div class="modal-body">
                    <iframe id='iframe-modal-<?php echo e($name); ?>' style="border:0;height: 430px;width: 100%" src=""></iframe>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php $__env->stopPush(); ?>
