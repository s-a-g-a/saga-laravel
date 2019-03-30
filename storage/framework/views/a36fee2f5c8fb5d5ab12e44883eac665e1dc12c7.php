<div class='form-group <?php echo e($header_group_class); ?> <?php echo e(($errors->first($name))?"has-error":""); ?>' id='form-group-<?php echo e($name); ?>' style="<?php echo e(@$form['style']); ?>">
    <label class='control-label col-sm-2'><?php echo e($form['label']); ?>

        <?php if($required): ?>
            <span class='text-danger' title='<?php echo trans('crudbooster.this_field_is_required'); ?>'>*</span>
        <?php endif; ?>
    </label>

    <div class="<?php echo e($col_width?:'col-sm-10'); ?> input_fields_wrap <?php echo e($name); ?>">

        <div class="input-group">
            <input type='text' title="<?php echo e($form['label']); ?>"
                   <?php echo e($required); ?> <?php echo e($readonly); ?> <?php echo $placeholder; ?> <?php echo e($disabled); ?> <?php echo e($validation['max']?"maxlength=".$validation['max']:""); ?> class='form-control <?php echo e($name); ?> first_value'
                   name="<?php echo e($name); ?>[]" id="<?php echo e($name); ?>" value='<?php echo e($value); ?>'/> <span class="input-group-addon" style="padding: 1px;"><button
                        class="add_field_button <?php echo e($name); ?>  btn btn-danger  btn-xs"><i class='fa fa-plus'></i></button></span>
        </div>

        <div class="text-danger"><?php echo $errors->first($name)?"<i class='fa fa-info-circle'></i> ".$errors->first($name):""; ?></div>
        <p class='help-block'><?php echo e(@$form['help']); ?></p>

    </div>

    <?php $__env->startPush('bottom'); ?>
        <script>
            $(document).ready(function () {
                var max_fields_<?php echo e($name); ?>    = "<?php echo e(@$form['max_fields']); ?>";
                var max_fields_<?php echo e($name); ?>    = parseInt(max_fields_<?php echo e($name); ?>) ? max_fields_<?php echo e($name); ?> : 5; //maximum input boxes allowed
                var wrapper_<?php echo e($name); ?>       = $(".input_fields_wrap").filter(".<?php echo e($name); ?>"); //Fields wrapper
                var add_button_<?php echo e($name); ?>    = $(".add_field_button").filter(".<?php echo e($name); ?>"); //Add button ID


                var count_<?php echo e($name); ?> = 1; //initlal text box count
                $(add_button_<?php echo e($name); ?>).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (count_<?php echo e($name); ?> < max_fields_<?php echo e($name); ?> ) { //max input box allowed
                        count_<?php echo e($name); ?>++; //text box increment
                        $(wrapper_<?php echo e($name); ?>).append('<div><input class="form-control" <?php echo e($required); ?> <?php echo e($readonly); ?> <?php echo $placeholder; ?> <?php echo e($disabled); ?> <?php echo e($validation['max']?"maxlength=".$validation['max']:""); ?> type="text" name="<?php echo e($name); ?>[]"/><a href="#" class="remove_field <?php echo e($name); ?>"><i class="fa fa-minus"></a></div>'); //add input box
                    }
                });

                $(wrapper_<?php echo e($name); ?>).on("click", ".remove_field ", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).parent('div').remove();
                    count_<?php echo e($name); ?>--;
                })

                function Load() {
                    var val = "<?php echo e($value); ?>";
                    val = val.split("|");
                    $(".first_value").filter(".<?php echo e($name); ?>").val(val[0]);
                    for (i = 1; i < val.length; i++) {
                        $(wrapper_<?php echo e($name); ?>).append(' <div > <input class="form-control" <?php echo e($required); ?> <?php echo e($readonly); ?> <?php echo $placeholder; ?> <?php echo e($disabled); ?> <?php echo e($validation['max']?"maxlength=".$validation['max']:""); ?>  type="text" name="<?php echo e($name); ?>[]" value="' + val[i] + '"/><a href="#" class="remove_field <?php echo e($name); ?>"><i class="fa fa-minus"></a></div>'); //add input box
                    }
                }

                Load();
            });
        </script>
    <?php $__env->stopPush(); ?>
</div>