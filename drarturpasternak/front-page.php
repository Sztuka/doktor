<?php

get_header();?>

<div class="container-fluid page-banner" style="background-image: url('<?php the_field('banner_image'); ?>');">
  <div class="banner-content">
    <img src="<?php the_field('logo_image') ?>" alt="logo" class="logo">
    <img src="<?php the_field('logo_white') ?>" alt="logo" class="logo-white">
    <div class="banner-quote">
      <h4><?php the_field('banner_text'); ?></h4>
      <h5><?php the_field('banner_subtext'); ?></h5>
    </div>
  </div>
</div>


<!-- O MNIE -->
<div id="o-mnie" class="container-fluid">
  <div class="row flex-column-reverse flex-lg-row">
    <div class="col-12 col-lg-7 description order-2 ">
      <div>
        <?php echo the_content(); ?>
      </div>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="button-cta">Skontaktuj się</a>
    </div>
    <div class="col-12 col-lg-5 p-0 main-photo order-1" style="background-image: url('<?php the_field('portrait'); ?>');">
        <a id="zl-url" class="zl-url" href="https://www.znanylekarz.pl/artur-pasternak-2/chirurg-plastyczny-chirurg/warszawa" rel="nofollow" data-zlw-doctor="artur-pasternak-2" data-zlw-type="certificate" data-zlw-opinion="false" data-zlw-hide-branding="true" data-zlw-saas-only="false">Artur Pasternak - ZnanyLekarz.pl</a><script>!function($_x,_s,id){var js,fjs=$_x.getElementsByTagName(_s)[0];if(!$_x.getElementById(id)){js = $_x.createElement(_s);js.id = id;js.src = "//platform.docplanner.com/js/widget.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","zl-widget-s");</script>
    </div>
  </div>
</div>





<!-- LOGOS -->
<div class="container-fluid logos-full-width">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="<?php the_field('logo_1'); ?>" alt="Logo 1" class="logo-item">
        </div>
        <div class="item">
            <img src="<?php the_field('logo_2'); ?>" alt="Logo 2" class="logo-item">
        </div>
        <div class="item">
            <img src="<?php the_field('logo_3'); ?>" alt="Logo 3" class="logo-item">
        </div>
        <div class="item">
            <img src="<?php the_field('logo_4'); ?>" alt="Logo 4" class="logo-item">
        </div>
        <div class="item">
            <img src="<?php the_field('logo_5'); ?>" alt="Logo 5" class="logo-item">
        </div>
        <div class="item">
            <img src="<?php the_field('logo_6'); ?>" alt="Logo 6" class="logo-item">
        </div>
    </div>
</div>

<!-- ZABIEGI -->
<div class="container section-zabiegi py-5">
  <div class="row">
    <div class="col-12">
      <h3>Zabiegi</h3>
    </div>
  </div>
  <div class="row">
    <?php 
    $categories = [
          'piersi' => 'Piersi',
          'twarz' => 'Twarz',
          'sylwetka' => 'Sylwetka',
          'pozostale_zabiegi' => 'Pozostałe Zabiegi'
      ];
    $menus = [
          'piersi' => 'piersi-menu',
          'twarz' => 'twarz-menu',
          'sylwetka' => 'sylwetka-menu',
          'pozostale_zabiegi' => 'pozostale-menu'
    ];

    foreach($categories as $category_key => $category_name) : ?>
    <div class="col-lg-3 col-md-6 col-sm-12 category-tile">
      <div class="image-container">
        <img src="<?php the_field($category_key); ?>" alt="<?php echo $category_name; ?>" class="img-category">
        <div class="zabiegi-list">
          <?php wp_nav_menu( array( 'theme_location' => $menus[$category_key] ) ); ?>
        </div>
      </div>
      <h4><?php echo $category_name; ?></h4>
    </div>
    <?php endforeach; ?>
  </div>
</div>




<!-- OPINIE PACJENTÓW -->
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>Opinie pacjentów</h3>
      </div>
    </div>
  </div>
  <div class="container-fluid opinie-pacjentow">
    <div class="opinie">
      <div class="container">
        <div class="row opinie-inside">
          <div class="quotation-mark col-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="101" height="80" viewBox="0 0 101 80" fill="none">
              <path opacity="0.2" d="M24.9 41.9998C30.1 42.5998 34 44.7998 36.6 48.5998C39.2 52.3998 40.5 56.5998 40.5 61.1998C40.5 65.9998 38.9 70.2998 35.7 74.0998C32.7 77.8998 28.2 79.7998 22.2 79.7998C19.8 79.7998 17.3 79.3998 14.7 78.5998C12.1 77.5998 9.7 75.9998 7.5 73.7998C5.3 71.5998 3.5 68.5998 2.1 64.7998C0.700001 60.9998 0 56.1998 0 50.3998C0 39.5998 3.1 29.8998 9.3 21.2998C15.5 12.4998 23.4 5.4998 33 0.299805L41.7 12.2998C36.5 15.0998 31.8 18.8998 27.6 23.6998C23.6 28.2998 20.9 34.0998 19.5 41.0998L24.9 41.9998ZM83.4 41.9998C88.6 42.5998 92.5 44.7998 95.1 48.5998C97.7 52.3998 99 56.5998 99 61.1998C99 65.9998 97.4 70.2998 94.2 74.0998C91.2 77.8998 86.7 79.7998 80.7 79.7998C78.3 79.7998 75.8 79.3998 73.2 78.5998C70.6 77.5998 68.2 75.9998 66 73.7998C63.8 71.5998 62 68.5998 60.6 64.7998C59.2 60.9998 58.5 56.1998 58.5 50.3998C58.5 39.5998 61.6 29.8998 67.8 21.2998C74 12.4998 81.9 5.4998 91.5 0.299805L100.2 12.2998C95 15.0998 90.3 18.8998 86.1 23.6998C82.1 28.2998 79.4 34.0998 78 41.0998L83.4 41.9998Z" fill="#1C2546"/>
            </svg>
          </div>
          <div class="col-12 col-lg-7">
              <div id="opinionsCarousel" class="carousel slide height-100" data-bs-ride="carousel" data-bs-interval="7000">
                <!-- Carousel Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $opinions_query = new WP_Query(array(
                        'post_type' => 'opinie',
                        'posts_per_page' => 5,
                    ));
                    for ($i = 0; $i < $opinions_query->post_count; $i++) {
                        echo '<li data-bs-target="#opinionsCarousel" data-bs-slide-to="' . $i . '" ' . ($i == 0 ? 'class="active"' : '') . '></li>';
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    // Example WP_Query to fetch opinions. Adjust according to your setup.
                    $opinions_query = new WP_Query(array(
                        'post_type' => 'opinie', // Update with your CPT name
                        'posts_per_page' => 5, // Adjust as needed
                    ));

                    if($opinions_query->have_posts()) :
                        while($opinions_query->have_posts()) : $opinions_query->the_post();
                            // Use 'active' class for the first item
                            $active_class = ($opinions_query->current_post == 0) ? 'active' : '';
                    ?>
                            <div class="carousel-item <?php echo $active_class; ?>">
                                <div class="opinia">
                                  <div class="opinia-text" id="opiniaText">
                                    <p>"<?php echo wp_strip_all_tags(get_the_content()); ?>"</p>
                                  </div>
                                  <div class="gradient" id="gradient"></div>
                                  <p class="opinia-author"><?php the_title(); ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
              </div>
          </div>
            <img class="col-4 custom-shadow" src="<?php the_field('opinie_zdjecie'); ?>" alt="">
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
            <?php
            // Pobranie ID strony na podstawie jej sluga (ścieżki URL)
            $contact_page_id = get_page_by_path('kontakt')->ID;

            // Pobranie wartości pola niestandardowego 'zdjecie_do_formularza' z konkretnej strony i przypisanie go do zmiennej
            $image_url = get_field('zdjecie_do_formularza', $contact_page_id);
            ?>
            <!-- Wyświetlenie obrazu -->
            <img class="img-fluid w-100 custom-shadow" src="<?php echo esc_url( $image_url ); ?>" alt="">
        </div>
        <div class="col-12 col-lg-8 form-input py-4 py-lg-0">
          <h3>Umów się na konsultacje</h3>
          <?php echo do_shortcode('[contact-form-7 id="34b4504" title="Konsultacja"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>



<?php get_footer();

?>