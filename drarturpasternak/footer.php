<?php wp_footer() ?>
<!-- Footer -->


    <footer class="container-fluid">
      <div class="container"> 
        <div class="row py-5">
          <!-- First Row -->
          <!-- Logo Column -->
          <div class="col-6 col-lg-2 pb-5 pb-lg-0">
            <div class="logo-footer">
              <img src="http://dr-artur-pasternak.local/wp-content/uploads/2023/10/Typefull-Colorgold.svg" alt="Logo" />
            </div>
          </div>
          <!-- Site Map Column -->
          <div class="col-12 col-lg-8">
            <div class="site-map flex-column flex-lg-row p-0 px-lg-5 d-none d-lg-flex">
                <?php 
                dynamic_sidebar( 'footer-1' ); 
                dynamic_sidebar( 'footer-2' ); 
                dynamic_sidebar( 'footer-3' ); 
                dynamic_sidebar( 'footer-4' ); 
                dynamic_sidebar( 'footer-5' ); 
                ?>
            </div>
          </div>
            
          <!-- Social Icons and Contact Info Column -->
          <div class="col-12 col-md-2">
            <div class="row">
              <div class="col-12 social-icons">
                <!-- Social Icons -->
                <?php dynamic_sidebar( 'social_icons' ); ?>
              </div>
              <div class="col-12">
                <!-- Divider -->
                <hr class="white-divider">
              </div>
              <?php if ( is_active_sidebar( 'contact_info' ) ) : ?>
              <div id="contact-info" class="info">
                  <?php dynamic_sidebar( 'contact_info' ); ?>
              </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
        <!-- Second Row -->
      </div>
      <div class="row copyright py-2">
        <div class="col-12 text-center">
          <p>&copy; <?php echo date('Y'); ?> Madmassive. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </body>
</html>