
@extends('crudbooster::admin_template')
@section('content')


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

 @foreach($posts as $row)
    
<section >
<div class="card text-center" style="">
  <div id="{{$row->id}}" class="card-header" style="font-weight:bold;font-size: 20px">
    {{$row->title}}
  </div>
  <div class="card-body">
      <p class="card-text" >{!!$row->description!!}</p><br>
    <div style="float: right;">
      <small>by {{$row->cms_users->name}}</small>
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
          <!-- To make sure we have read access, wee need to validate the privilege -->

           <div align="right" class="card-footer text-muted">
        {{$row->created_at->diffForHumans()}}<br>
        <div class="pull-left">
                      @if(CRUDBooster::myId() == $row->cms_users->id)
         
        
           <a class='btn btn-xs btn-success btn-edit' title='Edit Data'
           href='announce/edit/{{$row->id}}'><i
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
        function(){  location.href="announce/delete/{{$row->id}}" });'><i class='fa fa-trash'></i>Delete</a>
          @endif
       </div>
  </div>
</div>


</section>
<br><br>

    @endforeach
<div align="center">
<p>{!! urldecode(str_replace("/?","?",$posts->appends(Request::all())->render())) !!}</p>
<!-- ADD A PAGINATION --></div>
<p>{{-- {!! urldecode(str_replace("/?","?",$data['result']->appends(Request::all())->render())) !!} --}}</p>
@endsection