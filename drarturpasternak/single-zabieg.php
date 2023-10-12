<?php get_header(); ?>

<div class="container-fluid subpage-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
  <div class="banner-text">
    <h1><?php the_title();?></h1>
    <div class="subtitle-container">
        <?php 
        // Pobieranie wartości pola 'subtitle'
        $subtitle = get_field('subtitle'); 
        
        // Sprawdzanie, czy pole 'subtitle' ma wartość
        if($subtitle != 'nic'): ?>
            <h2><?php echo $subtitle; ?></h2>
        <?php endif; ?>
    </div>
  </div>
</div>


<!-- GŁÓWNY OPIS -->
<div class="container pb-5">
  <div class="row">
    <div class="col-12 col-md-6">
      <img src="<?php the_field('main_zabieg'); ?>" alt="" class="zabieg-photo custom-shadow">
    </div>
    <div class="col-12 col-md-6 zabieg-description"> 
      <div>
        <?php echo the_content(); ?>
      </div>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="button-cta">Skontaktuj się</a>
    </div>
  </div>
    
</div>


<!-- DIVIDER -->
<div class="divider"></div>


<!-- PRZED OPERACJĄ -->
<div class="container py-5">
  <div class="row">
    <div class="col-12">
      <div class="przed-operacja-excerpt custom-shadow">
        <?php
        // Get the page object by its slug
        $page_object = get_page_by_path('przed-operacja');

        // If the page exists, fetch its excerpt
        if ($page_object) {
            $excerpt = get_post_field('post_excerpt', $page_object->ID);
        }
        ?>
        <p><?php echo isset($excerpt) ? $excerpt : ''; ?></p>
        <a href="<?php echo esc_url( home_url( '/przed-operacja' ) ); ?>" class="button-cta">Dowiedz się więcej</a>
      </div>
    </div>
  </div>
</div>



<!-- SEKCJA PO OPERACJI Z LINIĄ -->

<?php 
$should_display_section = false; // Flaga, która określa, czy sekcja powinna być wyświetlona

// Sprawdzamy, czy przynajmniej jedno pole "glowny_tekst" jest niepuste
for ($i = 1; $i <= 5; $i++) {
    $glowny_tekst = get_field("po_operacji")["kafelek_$i"]["glowny_tekst"];
    if (!empty($glowny_tekst)) {
        $should_display_section = true;
        break; // Przerywamy pętlę, gdy znajdziemy pierwsze niepuste pole
    }
}

// Wyświetlamy sekcję tylko wtedy, gdy flaga jest ustawiona na true
if ($should_display_section):
?>
<!-- DIVIDER -->
<div class="divider"></div>


<!-- PO OPERACJI -->
<div class="py-5 container po-operacji">
  <div class="row">
    <div class="col-12">
      <h3>Po operacji</h3>
    </div>
  </div>
  <div class="row">
    <?php 
    for ($i = 1; $i <= 5; $i++) {
        $liczba_jednostek_czasu = get_field("po_operacji")["kafelek_$i"]["liczba_jednostek_czasu"];
        $jednostka_czasu = get_field("po_operacji")["kafelek_$i"]["jednostka_czasu"];
        $glowny_tekst = get_field("po_operacji")["kafelek_$i"]["glowny_tekst"];
        
        if (!empty($glowny_tekst)) {
    ?>
      <div class="col-12 col-md-6 col-lg mb-4">
        <div class="po-operacji-tile custom-shadow">
          <h4><?php echo esc_html($liczba_jednostek_czasu); ?></h4>
          <h5><?php echo esc_html($jednostka_czasu); ?></h5>
          <p><?php echo esc_html($glowny_tekst); ?></p>
        </div>
      </div>
    <?php 
        }
    }
    ?>
  </div>
</div>
<?php 
endif; // Koniec warunku wyświetlania sekcji
?>



<!-- DIVIDER -->
<div class="divider"></div>




<!-- BADANIA -->
<?php
$related_posts = get_field('badanie');

if ($related_posts):
  foreach ($related_posts as $post):
    setup_postdata($post);
    
    $nazwa_znieczulenia = get_field('nazwa_znieczulenia');
    $lista_badan = get_field('lista_badan');
    $zdjecie_do_znieczulenia = get_field('zdjecie_do_znieczulenia');
    $image_position = get_field('pozycja_zdjecia');
?>
<div class="py-5 badania-padding">
  <div class="container badania">
    <div class="row">
      <div class="col-12">
        <h3><?php echo esc_html($nazwa_znieczulenia); ?></h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row badania-row flex-lg-row flex-column">
        <div class="col-12 col-lg-8 order-2 order-lg-<?php echo ($image_position == 'left') ? '2 padding-left' : '1'; ?>">
          <?php echo $lista_badan; ?>
        </div>
        <div class="col-12 col-lg-4 order-1 order-lg-<?php echo ($image_position == 'right') ? '2' : '1'; ?>">
          <img class="custom-shadow" src="<?php echo esc_url($zdjecie_do_znieczulenia); ?>" alt="">
        </div>
    </div>
  </div>
</div>
<?php
    endforeach;
    wp_reset_postdata();
endif;
?>






<!-- DIVIDER -->
<div class="divider"></div>


<!-- PRZECIWWSKAZANIA -->
<div class="container py-5">
  <div class="row">
    <div class="col-12">
      <div class="przeciwwskazania">
        <h3>Przeciwwskazania</h3>
        <?php 
        $sidebar_id = get_field('ktore_przeciwwskazania');
        if ($sidebar_id) {
            dynamic_sidebar($sidebar_id);
        } else {
            // Fallback or error message here, if needed
            echo 'No sidebar found!';
        }
        ?>
      </div>
    </div>
  </div>
</div>



<?php get_footer(); ?>
