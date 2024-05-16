@extends('layouts.page')
@section('content')

@if ($ok!=null)
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Gửi thành công</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        var alert = document.getElementById("alert");
        function hideAfterDelay(element, delay) {
            setTimeout(function() {
                element.classList.add("d-none");
            }, delay);
        }
        hideAfterDelay(alert, 3000);
  </script>
@endif



<section class="contact_section layout_padding">
   <div class="container px-0">
      <div class="heading_container ">
         <h2 class="">
            Contact Us
         </h2>
      </div>
   </div>
   <div class="container container-bg">
      <div class="row">
         <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
               <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen=""></iframe>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-5 px-0">
            <form action="{{ url('/Contact')}}" method="POST">
                @csrf
               <div>
                  <input name="Name" type="text" placeholder="Name">
               </div>
               <div>
                  <input name="Email" type="email" placeholder="Email">
               </div>
               <div>
                  <input name="Phone" type="text" placeholder="Phone">
               </div>
               <div>
                  <input name="Detail" type="text" class="message-box" placeholder="Message">
               </div>
               <div class="d-flex ">
                  <button type="submit">
                  SEND
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

@endsection