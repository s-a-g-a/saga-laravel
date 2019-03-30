<?php $__env->startSection('content'); ?>


<head>
  <style type="text/css">
         .user-image {
  float: left;
  width: 20px;
 }
        .user-image {
      float: none;
      margin-right: 0;
 
     margin-top: 0;
   }
.rounded-circle {
  border-radius: 50% !important;
  border-color: black;
}


.card-body {
-ms-flex: 1 1 auto;
flex: 1 1 auto;
padding: 1.25rem;
}

.card-title {
margin-bottom: 0.75rem;
}
.card-text:last-child {
margin-bottom: 0;
}
.card {
position: relative;
display: -ms-flexbox;
display: flex;
-ms-flex-direction: column;
flex-direction: column;
min-width: 0;
word-wrap: break-word;
background-color: #eeeaaa;
background-clip: border-box;
border: 1px solid rgba(0, 0, 0, 0.125);
border-radius: 0.25rem;
}
.card > hr {
margin-right: 0;
margin-left: 0;
}

.card > .list-group:first-child .list-group-item:first-child {
border-top-left-radius: 0.25rem;
border-top-right-radius: 0.25rem;
}

.card > .list-group:last-child .list-group-item:last-child {
border-bottom-right-radius: 0.25rem;
border-bottom-left-radius: 0.25rem;
}


.card-header {
padding: 0.75rem 1.25rem;
margin-bottom: 0;
color: inherit;
background-color: rgba(0, 0, 0, 0.03);
border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header:first-child {
border-radius: calc(0.40rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header + .list-group .list-group-item:first-child {
border-top: 0;
}


  </style>


</head>

<!-- Your custom  HTML goes here -->

 <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
<section >
<div class="card text-center" style="">
  <div id="<?php echo e($row->id); ?>" class="card-header" style="font-weight:bold;font-size: 20px">
    <?php echo e($row->title); ?>

  </div>

  <div class="card-body">
      <p class="card-text" ><?php echo $row->description; ?></p><br>
    <div style="float: right;">
      <small>by <?php echo e($row->cms_users->name); ?></small>
  <?php if($row->cms_users->photo == null): ?>
            <img src="/vendor/crudbooster/avatar.jpg" width="50" height="50" class="rounded-circle">
    <?php else: ?> 
      <?php if($row->cms_users->photo[0]=="h"): ?>
      <img src="<?php echo e($row->cms_users->photo); ?>" class="rounded-circle" width=50 height= 50>
      <?php else: ?>
      <img src="/<?php echo e($row->cms_users->photo); ?>" class="rounded-circle" width=50 height= 50>
      <?php endif; ?>
            <?php endif; ?>
            
             </div>
          <!-- To make sure we have read access, wee need to validate the privilege -->

           <div align="right" class="card-footer text-muted">
        <?php echo e($row->created_at->diffForHumans()); ?><br>


        <div class="pull-left">
                      <?php if(CRUDBooster::myId() == $row->cms_users->id): ?>
         
        
           <a class='btn btn-xs btn-success btn-edit' title='Edit Data'
           href='announce/edit/<?php echo e($row->id); ?>'><i
                    class='fa fa-pencil'></i>Edit</a>
          <?php endif; ?>
          
          <?php if(CRUDBooster::myId() == $row->cms_users->id): ?>
          <a class='btn btn-xs btn-warning btn-delete' title='Delete' href='javascript:;'
           onclick='swal({   
        title: "Are you sure ?",   
        text: "You will not be able to recover this record data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#ff0000",   
        confirmButtonText: "Yes!",  
        cancelButtonText: "No",  
        closeOnConfirm: false }, 
        function(){  location.href="announce/delete/<?php echo e($row->id); ?>" });'><i class='fa fa-trash'></i>Delete</a>
          <?php endif; ?>
       </div>
               <div class='pull-left' >
          <?php if($row->attachements): ?>
          <small>This announcement has an attachement please download from the link below</small><br>
          <a class='btn btn-xs btn-primary' title='download' href='javascript:;'
           onclick='swal({   
        title: "Are you sure to download a file?",   
        text: "Attachement is going to be downloaded on confirm",   
        type: "success",   
        showCancelButton: true,   
        confirmButtonColor: "#defrd",   
        confirmButtonText: "Yes!",  
        cancelButtonText: "No",  
        closeOnConfirm: true }, 
        function(){  location.href="/<?php echo e($row->attachements); ?>" });'><i class='fa fa-trash'></i>Download Attachement</a>

          <?php endif; ?>

        </div>

  </div>
</div>


</section>
<br><br>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div align="center">
<p><?php echo urldecode(str_replace("/?","?",$posts->appends(Request::all())->render())); ?></p>
<!-- ADD A PAGINATION --></div>
<p></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>