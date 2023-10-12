<?php get_header(); ?>

<div class="container-fluid subpage-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
  <div class="banner-text">
    <h1><?php the_title();?></h1>
    <div class="subtitle-container">
            <h2>w Warszawie</h2>
    </div>
  </div>
</div>


<!-- PRZED OPERACJĄ -->
<div class="container przed-operacja">
  <div class="row">
    <div class="col-12">
      <?php echo the_content(); ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>