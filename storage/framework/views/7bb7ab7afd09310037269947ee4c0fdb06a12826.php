<?php $__env->startSection('content'); ?>
<head>
  <style type="text/css">
         .user-image {
  float: left;
  width: 50px;
 }
        .user-image {
      float: none;
      margin-right: 0;
 
     margin-top: 0;
   }
.rounded-circle {
  border-radius: 50% !important;
}
.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
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
background-color: #eeefff;
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
border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header + .list-group .list-group-item:first-child {
border-top: 0;
}


.comment time, .comment:hover time,.icon-rocknroll, .like-count {
  -webkit-transition: .25s opacity linear;
  transition: .25s opacity linear;
}
.comments-main ul li{
  list-style: none;
}
.comments .comment {
  padding: 5px 10px;
  background: #00AF90;
}
.comments .comment:hover time{
  opacity: 1;
}
.comments .user-img img {
  width: 50px;
  height: 50px;
}
.comments .comment h4 {
  display: inline-block;
  font-size: 16px;
}
.comments .comment h4 a {
  color: #404040;
  text-decoration: none;
}
.comments .comment .icon-rocknroll {
  color: #545454;
  font-size: .85rem;
}
.comments .comment .icon-rocknroll:hover {
  opacity: .5;
}
.comments .comment time,.comments .comment .like-count,.comments .comment .icon-rocknroll {
  font-size: .75rem;
  opacity: 0;
}
.comments .comment time, .comments .comment .like-count {
  font-weight: 300;
}
.comments .comment p {
  font-size: 13px;
}
.comments .comment p .reply {
  color: #BFBFA8;
  cursor: pointer;
}
.comments .comment .active {
  opacity: 1;
}
.fa {
  cursor: pointer;
  user-select: none;
}

.fa:hover {
  color: darkblue;
}
.icon-rocknroll {
  background: none;
  outline: none;
  cursor: pointer;
  margin: 0 .125rem 0 0;
}
.comments .comment:hover .icon-rocknroll,.comments .comment:hover .like-count {
  opacity: 1;
}
.comment-box-main{
  background: #CA1D5F;
}
@media (min-width: 320px) and (max-width: 480px){
  .comments .comment h4 {
    font-size: 12px;
  }
  .comments .comment p{
    font-size: 11px;
  }
  .comment-box-main .send-btn button{
    margin-left: 5px;
  }
}

  </style>


</head>

<!-- Your custom  HTML goes here -->



<div style="font-family: 'Raleway', sans-serif;" class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pt-4 rounded">
				<ul class="p-0">
					

 <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <section>
 		<li > <div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
						    	 <?php if($row->cms_users->photo == null): ?>
            <img src="http://localhost:8000/vendor/crudbooster/avatar.jpg" class="rounded-circle">
    <?php else: ?> 
      <?php if($row->cms_users->photo[0]=="h"): ?>
      <img src="<?php echo e($row->cms_users->photo); ?>" class="rounded-circle" width=50 height= 50>
      <?php else: ?>
      <img src="/<?php echo e($row->cms_users->photo); ?>" class="rounded-circle" width=50 height= 50>
      <?php endif; ?>
            <?php endif; ?>
							</div>
							<br>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4  class="m-0"><a style="color: #2874A6" href="#"><?php echo e($row->cms_users->name); ?></a></h4>
                  <div class="pull-right">
                    <?php if(CRUDBooster::myId() == $row->cms_users->id): ?>
         
        
           <a class='btn btn-xs btn-success btn-edit' title='Edit Data'
           href='complaints/edit/<?php echo e($row->id); ?>'><i
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
        function(){  location.href="complaints/delete/<?php echo e($row->id); ?>" });'><i class='fa fa-trash'></i>Delete</a>
          <?php endif; ?>

       </div>
							    <small class="text-white ml-3"> <?php echo e($row->created_at->diffForHumans()); ?></small><br>
							   
							    <p style="color: #F2F3F4"  ; class="mb-0 text-white"><strong  style="color: #2C3E50">Subject: <?php echo e($row->title); ?><br></strong>
							    	<?php echo $row->content; ?></p>
		
<div align="center">
         
							</div>
							 <i style="
  font-size: 30px; padding-right: 10px" onclick="myFunction(this)" class="fa fa-thumbs-up"></i><i style="
  font-size: 30px; padding-right: 10px" onclick="myFunction(this)" class="fa fa-thumbs-down"></i>
  <a class="btn btn-warning btn-circle text-uppercase"  href="/saga/viewcomplaints/comments/<?php echo e($row->id); ?>"><span class="glyphicon glyphicon-comment"></span><?php echo e(count($row->comments)); ?> comment</a>
  <a class="btn btn-success btn-circle text-uppercase"  href="/saga/viewcomplaints/replys/<?php echo e($row->id); ?>" <?php if(count($row->replays) < 1 && CRUDBooster::myPrivilegeName()!="Admin staff"): ?> <?php echo e('disabled'); ?>

  <?php endif; ?> ><span class="glyphicon glyphicon-bookmark" ></span><?php echo e(count($row->replays)); ?> replys</a>

</div>

  
						</div>
						<br>

					</li>
        </section>
		<!-- LikeBtn.com BEGIN -->


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script type="text/javascript">
	function myFunction(x) {
  //x.classList.toggle("fa-thumbs-down");
  
}
</script>
    <p><?php echo urldecode(str_replace("/?","?",$posts->appends(Request::all())->render())); ?></p>
    </ul></div></div></div></div></section>
    <!-- ADD A PAGINATION -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>