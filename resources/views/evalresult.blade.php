@extends('crudbooster::admin_template')

@section('content')

@if(count($posts) ==null)

<p>No evaluation posts and results.</p>

@else
@foreach($posts as $row)



{{-- 
  <div align="center">
 
<a style="padding:0px 20px; " class="badge badge-success" href="/saga/evaluationresults/{{$row->id}}" 

  ><h2 style="text-align: center;">{{$row->cms_users->name}}</h2></a>  

  </span>

</div> --}}
<div >

      <div class="row" >
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile" >
              <img class="profile-user-img img-responsive img-circle" src="/{{$row->cms_users->photo}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$row->cms_users->name}}</h3>

              <p class="text-muted text-center">{{$row->cms_users->program}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Section</b> <a class="pull-right">{{$row->cms_users->sections}}</a>
                </li>
                <li class="list-group-item">
                  <b>Year</b> <a class="pull-right">{{$row->cms_users->year}}</a>
                </li>
              
              </ul>

              <a href="/saga/evaluationresults/{{$row->id}}" class="btn btn-primary btn-block"><b>Evaluation Result</b></a>
            </div>
            <!-- /.box-body -->
          </div>
      </div></div></div>

<br>
@endforeach
@endif

@endsection