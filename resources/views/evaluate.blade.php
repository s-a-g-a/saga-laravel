@extends('crudbooster::admin_template')

@section('content')

@if(count($posts) >  0)

<h2>New Evaluation Posts.</h2>


@foreach($posts as $row)

{{-- <div align="center">
 
	<span class="badge badge-primary"><a class="badge badge-success" 
    href="/saga/evaluationresults27/add?tobe={{$row->cms_users->id}}&evid={{$row->id}}"
	>Evaluate :{{$row->cms_users->name}}</a>
	</span>

</div>
 --}}
 		
<div align="left">
 <section  class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
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

              <a href="/saga/evaluationresults27/add?tobe={{$row->cms_users->id}}&evid={{$row->id}}" class="btn btn-primary btn-block"><b>Evaluate</b></a>
            </div>
            <!-- /.box-body -->
          </div>
      </div></div></section></div>
          <!-- /.box -->

          <!-- About Me Box -->
         
@endforeach




@else

<h2>No Evaluation Posts for now.</h2>

@endif

@endsection