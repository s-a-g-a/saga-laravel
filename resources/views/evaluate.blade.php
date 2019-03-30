@extends('crudbooster::admin_template')

@section('content')

@if(count($posts) >  0)

<h2>New Evaluation Posts.</h2>

@foreach($posts as $row)
<div align="center">
<h2><a href="">{{$row->cms_users->name}}</a></h2>
</div>
@endforeach
@else

<h2>No Evaluation Posts for now.</h2>

@endif

@endsection