@extends('crudbooster::admin_template')

@section('content')

{{-- <iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=Adama+science+technology+university&key=AIzaSyAutZ9uFtvzGca3NLP-J37bIkAMZOZ_YLs " allowfullscreen></iframe>
 --}}

<a href="https://www.google.com/maps/search/?api=1&query=47.5951518,-122.3316393"> the cafee</a>




<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = position.coords.latitude + 
  "," + position.coords.longitude;
}



</script>



@endsection