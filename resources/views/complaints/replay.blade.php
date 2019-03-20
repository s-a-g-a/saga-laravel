@extends('crudbooster::admin_template')

@section('content')

<head>
	
	<style type="text/css">
		.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #1895E7 none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}

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




<?php $row=$posts['complain']?>
<div style="font-family: 'Raleway', sans-serif;" class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pt-4 rounded">
				<ul class="p-0"><li> <div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
						    	 @if($row->cms_users->photo == null)
            <img src="http://localhost:8000/vendor/crudbooster/avatar.jpg" class="rounded-circle">
    @else 
      @if($row->cms_users->photo[0]=="h")
      <img src="{{$row->cms_users->photo}}" class="rounded-circle" width=50 height= 50>
      @else
      <img src="/{{$row->cms_users->photo}}" class="rounded-circle" width=50 height= 50>
      @endif
            @endif
							</div>
							<br>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4  class="m-0"><a style="color: #2874A6" href="#">{{$row->cms_users->name}}</a></h4>
							    <small class="text-white ml-3"> {{$row->created_at->diffForHumans()}}</small><br>
							   
							    <p style="color: #F2F3F4"  ; class="mb-0 text-white"><strong  style="color: #2C3E50">Subject: {{$row->title}}<br></strong>
							    	{!!$row->content!!}</p>
		
		<div class="pull-right">
							    	@if(CRUDBooster::myId() == $row->cms_users->id)
         
        
           <a class='btn btn-xs btn-success btn-edit' title='Edit Data'
           href='/saga/complaints/edit/{{$row->id}}'><i
                    class='fa fa-pencil'></i>Edit</a>
          @endif
          
          @if(CRUDBooster::myId() == $row->cms_users->id)
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
				function(){  location.href="/saga/complaints/delete/{{$row->id}}" });'><i class='fa fa-trash'></i>Delete</a>
          @endif

       </div>

<div align="center">
         
							</div>
							 <i style="
  font-size: 30px; padding-right: 10px" onclick="myFunction(this)" class="fa fa-thumbs-up"></i><i style="
  font-size: 30px; padding-right: 10px" onclick="myFunction(this)" class="fa fa-thumbs-down"></i>
  
</div>
   <form method="post" action="{{ action('CommentsController@store') }}">
          
              @csrf
              <input type="hidden" name="user_id" value="{{CRUDBooster::myId()}}">
              <input type="hidden" name="complaints_id" value="{{$posts['complain']->id}}">
              
              <div class="form-group purple-border">
  <label for="exampleFormControlTextarea4">Comment</label>
  <textarea class="form-control" name="comment" id="exampleFormControlTextarea4" rows="3"></textarea>
</div>

              <button type="submit" class="btn btn-success">submit comment</button>
      </form>
@if(count($posts['comments']) > 0 )
<div style="margin-top: 20px" class="pull-left">
@foreach($posts['comments'] as $row)
 <div class="pull-left">

            <div class="incoming_msg">
              @if($row->cms_users->photo == null)
            <img src="http://10.240.146:8000/vendor/crudbooster/avatar.jpg" class="rounded-circle">
    @else 
      @if($row->cms_users->photo[0]=="h")
      <img src="{{$row->cms_users->photo}}" class="rounded-circle" width=50 height= 50>
      @else
      <img src="/{{$row->cms_users->photo}}" class="rounded-circle" width=50 height= 50>
      @endif
            @endif
              <div style="float: right;margin-left:5px" ><strong><a style="color: #2874A6" href="#">{{$row->cms_users->name}}</a></strong>
               
                <div >
                  <p style="margin-left:12px">{{$row->content}}</p></div><div>
                  <span class="time_date">{{$row->created_at->diffForHumans()}}</span></div>
</div>

</div></div>
<br><br><br><br>
       
@endforeach
<p>{!! urldecode(str_replace("/?","?",$posts['comments']->appends(Request::all())->render())) !!}</p>
@endif
</div>
						</div><br><br>

 

<br />
    

</div>


                    
                    
                </div>

						<br>
					</li>

				</section>
      </ul>

			</div>
			</div>


    </div>

@endsection