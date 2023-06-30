

<!-- ======= Footer ======= -->
<section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Akright Estate</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Our price promise guarantees that you will get the best value for money without having to compromise on
                quality and service
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Contact :</span> +256 752 697769
                </li>
                <li class="color-a">
                  <span class="color-text-a">Whatsapp :</span> +256 752 697769
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">

            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="index.html">Home</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="property-grid.html">Property</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="about.html">About</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Properties</a>
              </li>

            </ul>
            <div id="google_element">
              <script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
              <script>
                function loadGoogleTranslate() {
                  new google.translate.TranslateElement("google_element");
                }
              </script>
            </div>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a"><b>Akright</b>Estate</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">

            <!-- <a href="#">SJX IT Solutiions</a> -->
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="/includes/scripts.php"></script>
  
  <script>
    $(document).ready(function () {
      $('.signup-btn').click(function (e) { 
        e.preventDefault();
        id = 1;

      //   alert("success");
        $.ajax({
          method: "post",
          url: "register.php",
          data: {id:id},
          success: function (result) {
            $('.register').html(result);
          }
        });
      });
    });
    $(document).ready(function () {
      $('.rent').click(function (e) { 
        e.preventDefault();
        $(".property-grid").hide();
        property_id = $(this).attr('id');

        // alert(property_id);
        $.ajax({
          method: "post",
          url: "rent_property.php",
          data: {id:property_id},
          success: function (result) {
            $('#property_display').html(result);
          }
        });
      });
      $('.buy').click(function (e) { 
        e.preventDefault();
        $(".property-grid").hide();
        property_id = $(this).attr('id');

        // alert(property_id);
        $.ajax({
          method: "post",
          url: "buy_property.php",
          data: {id:property_id},
          success: function (result) {
            $('#property_display').html(result);
          }
        });
      });
    });
  </script>

</body>

</html>