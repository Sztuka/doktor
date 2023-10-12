<?php get_header(); ?>

<div class="container-fluid subpage-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
  <div class="banner-text">
    <h1><?php the_title();?></h1>
  </div>
</div>

<!-- GŁÓWNY OPIS -->
<div class="container pb-5">
  <div class="row">
    <div class="col-12 col-md-6 info-logo">
      <div class="logo-kontakt">
        <img src="http://dr-artur-pasternak.local/wp-content/uploads/2023/10/Typefull-Colorgold.svg" alt="Logo" />
        <div class="kontakt-doktor">
          <?php 
          $email = get_field('email');
          $phone = get_field('numer_telefonu');
          ?>
          <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
          <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 znany-lekarz-widget"> 
      <div class="custom-shadow">
        <!-- Widget Code -->
        <a id="zl-url" class="zl-url" href="https://www.znanylekarz.pl/artur-pasternak-2/chirurg-plastyczny-chirurg/warszawa" rel="nofollow" data-zlw-doctor="artur-pasternak-2" data-zlw-type="big_with_calendar" data-zlw-opinion="false" data-zlw-hide-branding="true" data-zlw-saas-only="false">Artur Pasternak - ZnanyLekarz.pl</a><script>!function($_x,_s,id){var js,fjs=$_x.getElementsByTagName(_s)[0];if(!$_x.getElementById(id)){js = $_x.createElement(_s);js.id = id;js.src = "//platform.docplanner.com/js/widget.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","zl-widget-s");</script>
      </div>
    </div>
  </div>
</div>


<!-- PHOTO IMAGE -->
<div class="container-fluid py-5">
  <div class="row">
    <div class="col-12 px-0">
      <img src="<?php the_field('zdjecie_w_tle'); ?>" alt="" class="img-fluid w-100">
    </div>
  </div>
</div>

<!-- GOOGLE MAP AND CONTACT INFO -->
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div id="map" class="mapa-google custom-shadow""></div>
        <script>
          function initMap() {
              var lat = <?php echo get_field('mapa_google')['lat']; ?>;
              var lng = <?php echo get_field('mapa_google')['lng']; ?>;
              var zoom = 18; // Hardcoded zoom level
  
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: zoom,
                center: { lat: lat, lng: lng }
              });
  
              var marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: map,
              });
          }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4UKsuI0HLZUFZSXDhmgstZ7IdZa8GZjQ&callback=initMap"></script>
      </div>
      <div class="col-md-6">
        <div id="contact-info" class="info-map">
          <?php 
          $kliniki_numer = get_field('numer_kliniki');
          ?>
          <h3><?php the_field('tytul_przy_mapie'); ?></h3>
          <a href="<?php the_field('prowadz_do'); ?>" target="blank" ><?php the_field('adres_kliniki'); ?></a>
          <a href="tel:<?php echo esc_attr($kliniki_numer); ?>"><?php echo esc_html($kliniki_numer); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- FORMULARZ KONTAKTOWY -->
<div class="py-5">
  <div class="container-fluid formularz py-4">
    <div class="container">
      <div class="row form-inside flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-4 p-0">
          <img class="img-fluid w-100 custom-shadow" src="<?php the_field('zdjecie_do_formularza') ?>" alt="">
        </div>
        <div class="col-12 col-lg-8 form-input py-4 py-lg-0">
          <h3>Umów się na konsultacje</h3>
          <?php echo do_shortcode('[contact-form-7 id="34b4504" title="Konsultacja"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>




<?php get_footer(); ?>