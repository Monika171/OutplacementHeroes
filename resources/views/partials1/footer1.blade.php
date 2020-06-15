<!--<section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2>Subcribe to our Newsletter</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          <div class="row d-flex justify-content-center mt-4 mb-4">
            <div class="col-md-8">
              <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>-->

 <!--Footer Section-->
 {{-- <footer class="footer-section">
    <div class="container">
      <div class="footer-content pt-5 pb-5">
        <div class="row">
          <div class="col-xl-4 col-lg-4 mb-50">
            <div class="footer-widget">
              <div class="footer-widget-heading">
                <h3>Follow Us</h3>
              </div>
              <div class="footer-social-icon">
                <a href="https://www.facebook.com/outplacementheros/"><i class="fab fa-facebook-f facebook-bg"></i></a>
                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                <a href="https://instagram.com/outplacementheros?igshid=ppg4sguw3ieg"><i class="fab fa-instagram insta-bg"></i></a>
                <a href="https://www.linkedin.com/company/outplacementheros"><i class="fab fa-linkedin linkedin-bg"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="footer-widget">
              <div class="footer-widget-heading">
                <h3>Contact Us</h3>
              </div>
              <ul>
                <li>Email: hello@outplacementheros.org</li>
                <li><i class="fa fa-whatsapp "></i>: 78388 83008</li>
              </ul>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
            <div class="footer-widget">                
              <div class="footer-widget-heading">
                <h3>Subscribe</h3>
              </div>
              <div class="footer-text mb-25">
                <p style="font-size: 15px;">Don’t miss to subscribe to our new feeds, kindly fill your email ID below.</p>
              </div>
              <div class="subscribe-form">
                <form action="https://changeleaders.us18.list-manage.com/subscribe/post?u=e1b860c00f51449ba306e2cba&amp;id=2cc10d102f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">
                    <input type="text" placeholder="Email ID" id="mce-EMAIL" required>
                    <div id=" id="mc-embedded-subscribe">
                      <button><i class="fab fa-telegram-plane" value="Subscribe" type="submit"></i></button>
                    </div>
                  </div>
                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div> 
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e1b860c00f51449ba306e2cba_2cc10d102f" tabindex="-1" value=""></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 text-center text-lg-center">
            <div class="copyright-text">
              <p>Copyright &copy; OutplacementHeros 2020, All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>--}}



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{asset('external/js/jquery.min.js')}}"></script>
<script src="{{asset('external/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('external/js/popper.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap.min.js')}}"></script>
<script src="{{asset('external/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('external/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('external/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('external/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('external/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('external/js/aos.js')}}"></script>
<script src="{{asset('external/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('external/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('external/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('external/js/google-map.js')}}"></script>
<script src="{{asset('external/js/main.js')}}"></script>

<!--modified here-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
    $( function() {
      $( '.datepicker' ).datepicker({
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
      yearRange: "-70:+0"
      
    });


    $('.datepicker-Y').datepicker( {
    dateFormat: "yy",
    yearRange: "c-100:c",
    changeMonth: false,
    changeYear: true,
    showButtonPanel: false,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
    },
    onChangeMonthYear : function () {
      $(this).datepicker( "hide" );
    }
  }).focus(function () {
    $(".ui-datepicker-month").hide();
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $(".ui-datepicker-prev").hide();
    $(".ui-datepicker-next").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", false);


  $('.datepicker-YM').datepicker( {
    yearRange: "c-100:c",
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    closeText:'Select',
    currentText: 'This year',
    onClose: function(dateText, inst) {
      var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      $(this).val($.datepicker.formatDate('MM yy (M y) (mm/y)', new Date(year, month, 1)));
    }
  }).focus(function () {
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-current").hide();
    $("#ui-datepicker-div").position({
      my: "left top",
      at: "left bottom",
      of: $(this)
    });
  }).attr("readonly", false);



    });





</script>


<!--modified here-->

<!--$(function(){$('.dateTxt').datepicker(); });-->