@extends('crudbooster::admin_template')

@section('content')


@if(isset($_GET['lat']))

{{-- <iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q={{$_GET['lat']}},{{$_GET['lon']}}&key=AIzaSyAutZ9uFtvzGca3NLP-J37bIkAMZOZ_YLs" allowfullscreen></iframe>
<div align="center"> --}}
<div align="center">
  <a href="https://google.com/maps?q={{$_GET['lat']}},{{$_GET['lon']}}" target="_blank"><button type="button"  class="btn btn-success"> Route </button></a>

</div>
<br>
<div align="center">
<div class="mapouter"><div class="gmap_canvas"><iframe width="931" height="352" id="gmap_canvas" src="https://maps.google.com/maps?q={{$_GET['lat']}},{{$_GET['lon']}}&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com"></a></div><style>.mapouter{position:relative;text-align:right;height:352px;width:931px;}.gmap_canvas {overflow:hidden;background:none!important;height:352px;width:931px;}</style></div>
<br><br>
@else
<div align="center">
<div class="mapouter"><div class="gmap_canvas"><iframe width="931" height="352" id="gmap_canvas" src="https://maps.google.com/maps?q=adama%20science%20and%20technology&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com"></a></div><style>.mapouter{position:relative;text-align:right;height:352px;width:931px;}.gmap_canvas {overflow:hidden;background:none!important;height:352px;width:931px;}</style></div>
</div>
<br>
<br>
@endif


<div align="center">
 <div align="center">
<form action="/saga/maps" method="get">
	@csrf
<input required="" type="text" name="search" placeholder="search for your location"><br><br>
<input type="submit" name="submit" class="btn btn-primary" value="search">
</form>

</div>
<br>
<br>
@if (isset($_GET['search']))
	<p>{{count($posts)}} result(s) in  0.<?php echo rand();?> sec</p>
@foreach($posts as $row)
<div class="card">
<p>Name : {{$row->name}}</p>
@if($row->blockno>0)
<span >Block no : {{$row->blockno}}</span>
@endif
<p><a href="https://google.com/maps?q={{$row['latitude']}},{{$row['longitude']}}" class="badge btn-success" target="_blank" >Route</a><a  style="margin-left:10px;"href="?lat={{$row['latitude']}}&lon={{$row['longitude']}}" class="badge btn-info">View Location</a></p>
</div>

@endforeach
@endif
</div>
@endsection