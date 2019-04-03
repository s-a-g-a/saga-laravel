@extends('crudbooster::admin_template')

@section('content')

<h2>{{count($posts)}} Students evaluated so far.</h2>
<div align="center">
<h3>Evaluation result in class.</h3>
<p>Not Good: {{count($posts->where('inclass','=', 'Not Good'))}} </p>
<p>Good: {{count($posts->where('inclass','=', 'Good'))}} </p>
<p>Very Good: {{count($posts->where('inclass','=', 'Very Good'))}} </p>
<p>Excellent: {{count($posts->where('inclass','=', 'Excellent'))}} </p>
</div>
<div align="center">
<h3>Evaluation result in Lab.</h3>
<p>Not Good: {{count($posts->where('inlab','=', 'Not Good'))}} </p>
<p>Good: {{count($posts->where('inlab','=', 'Good'))}} </p>
<p>Very Good: {{count($posts->where('inlab','=', 'Very Good'))}} </p>
<p>Excellent: {{count($posts->where('inlab','=', 'Excellent'))}} </p>
</div>
<div align="center">
<h3>Evaluation result time usage.</h3>
<p>Not Good: {{count($posts->where('timeusage','=', 'Not Good'))}} </p>
<p>Good: {{count($posts->where('timeusage','=', 'Good'))}} </p>
<p>Very Good: {{count($posts->where('timeusage','=', 'Very Good'))}} </p>
<p>Excellent: {{count($posts->where('timeusage','=', 'Excellent'))}} </p>
</div>
<div align="center">
<h3>Evaluation result in Communication with student.</h3>
<p>Not Good: {{count($posts->where('communwithstud','=', 'Not Good'))}} </p>
<p>Good: {{count($posts->where('communwithstud','=', 'Good'))}} </p>
<p>Very Good: {{count($posts->where('communwithstud','=', 'Very Good'))}} </p>
<p>Excellent: {{count($posts->where('communwithstud','=', 'Excellent'))}} </p>
</div>



@foreach($posts as $row)



</div>

@endforeach


@endsection