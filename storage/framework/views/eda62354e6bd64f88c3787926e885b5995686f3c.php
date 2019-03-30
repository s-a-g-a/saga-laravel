<?php $__env->startSection('content'); ?>



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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>