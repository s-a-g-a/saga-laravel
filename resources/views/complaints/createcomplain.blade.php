@extends('crudbooster::admin_template')

@section('content')


{{ Form::open(array('url' => 'foo/bar')) }}
 {!! Form::label('name', 'name:', ['class' => 'control-label']) !!}-label

{!! Form::text('name', old('name'), ['class' => 'form-control input-normal','placeholder' => 'Name']) !!}-text box
{{ Form::close() }}

@endsection