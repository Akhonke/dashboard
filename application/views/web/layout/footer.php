<div class="scroll-top scroll-to-target primary-bg text-white open" data-target="html">
         <span class="fas fa-hand-point-up"></span>
      </div>


<footer class="footer-1 gradient-bg ptb-60 footer-with-newsletter">



   <div class="container">

      <div class="row">

         <div class="col-md-12 col-lg-12 mb-4 mb-md-4 mb-sm-4 mb-lg-0" style="text-align: center;">

            <a href="#" class="navbar-brand mb-2">

               <!-- <img src="<?= base_url() ?>assets/web/img/logo.png" alt="logo" width="" class="img-fluid"> -->

            </a>

            <br>

            <p style="font-weight: bold;font-size: 18px;text-align: center;">Connect with us...</p>

            <div class="list-inline social-list-default background-color social-hover-2 mt-2 text-center">

               <li class="list-inline-item"><a class="twitter" href="https://twitter.com/digilims"><i class="fab fa-twitter"></i></a></li>

               <li class="list-inline-item"><a class="youtube" href="https://www.youtube.com/watch?v=Ze51V8EenfU&feature=youtu.be"><i class="fab fa-youtube"></i></a></li>

               <li class="list-inline-item"><a class="linkedin" href="https://www.linkedin.com/company/digilims"><i class="fab fa-linkedin-in"></i></a></li>

               <!-- <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li> -->

            </div>

         </div>

           <!--  <div class="col-md-12 col-lg-8">

               <div class="row mt-0">



                  <div class="col-sm-6 col-md-3 col-lg-3 mb-4 mb-sm-4 mb-md-0 mb-lg-0">

                     <h6 class="text-uppercase">Products</h6>

                     <ul>

                        <li>

                           <a href="<?= base_url() ?>Pricing">Pricing</a>

                        </li>



                     </ul>

                  </div>

                  <div class="col-sm-6 col-md-3 col-lg-3 mb-4 mb-sm-4 mb-md-0 mb-lg-0">

                     <h6 class="text-uppercase">Company</h6>

                     <ul>

                        <li>

                           <a href="<?= base_url() ?>About-us">About Us</a>

                        </li>

                        <li>

                           <a href="<?= base_url() ?>Carrer">Careers</a>

                        </li>

                        <li>

                           <a href="<?= base_url() ?>Customer">Customers</a>

                        </li>



                     </ul>

                  </div>

                  <div class="col-sm-6 col-md-3 col-lg-3">

                     <h6 class="text-uppercase">Support</h6>

                     <ul>

                        <li>

                           <a href="<?= base_url() ?>Faq">FAQ</a>

                        </li>



                        <li>

                           <a href="<?= base_url() ?>Contact-support">Contact Support</a>

                        </li>



                        <li>

                           <a href="<?= base_url() ?>Product-Services">Product Services</a>

                        </li>

                     </ul>

                  </div>

               </div>

            </div> -->

      </div>

   </div>

   <!--end of container-->

</footer>

<!--footer bottom copyright start-->

<div class="footer-bottom py-3 gray-light-bg">

   <div class="container">

      <div class="row">

         <div class="col-md-6 col-lg-7">

            <div class="copyright-wrap small-text">

               <p class="mb-0">&copy; DigiLims All rights reserved</p>

            </div>

         </div>

         <div class="col-md-6 col-lg-5">

            <div class="terms-policy-wrap text-lg-right text-md-right text-left">

               <ul class="list-inline">

                  <li class="list-inline-item"><a class="small-text" href="#">Terms</a></li>

                  <li class="list-inline-item"><a class="small-text" href="#">Security</a></li>

                  <li class="list-inline-item"><a class="small-text" href="#">Privacy Policy</a></li>

               </ul>

            </div>

         </div>

      </div>

   </div>

</div>


<script type="text/javascript">
   jQuery(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

jQuery(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
jQuery("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

jQuery(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
jQuery("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

jQuery('.radio-group .radio').click(function(){
jQuery(this).parent().find('.radio').removeClass('selected');
jQuery(this).addClass('selected');
});

jQuery(".submit").click(function(){
return false;
})

});
</script>