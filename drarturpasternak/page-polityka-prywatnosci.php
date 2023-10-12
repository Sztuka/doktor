<?php get_header(); ?>

<div class="container-fluid subpage-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
  <div class="banner-text">
    <h1><?php the_title();?></h1>
  </div>
</div>


<!-- GŁÓWNY OPIS -->
<div class="container pb-5">
  <div class="row">
    <div class="col-12"> 
      <div>
        <?php echo the_content(); ?>
      </div>
    </div>
  </div>
    
</div>


<?php get_footer(); ?>