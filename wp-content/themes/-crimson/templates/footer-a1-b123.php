      <footer class="site-footer">
        <div class="container-fluid" id="footer-a">
          <?php dynamic_sidebar('footer-a1') ?>
        </div>
        <div class="container-fluid" id="footer-b">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 d-flex justify-content-center align-items-center justify-content-md-start">
              <?php dynamic_sidebar('footer-b1') ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <?php dynamic_sidebar('footer-b2') ?>
              <div class="socials">
                <a href="https://www.facebook.com/C1Partners/" title="C1 Partners Facebook" role="link">
                  <?php echo crimson_inline_icon('/social/facebook.svg'); ?>
                </a> 
                <a href="https://www.linkedin.com/company/c1-partners/mycompany/" title="C1 Partners LinkedIn" role="link">
                  <?php echo crimson_inline_icon('/social/linkedin.svg'); ?>
                </a>
                <a href="https://www.youtube.com/c/C1partners-inc/" title="C1 Partners YouTube" role="link">
                  <?php echo crimson_inline_icon('/social/youtube.svg'); ?>
                </a>
                <a href="https://twitter.com/c1partners" title="C1 Partners Twitter" role="link">
                  <?php echo crimson_inline_icon('/social/twitter.svg'); ?>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 d-flex justify-content-center align-items-center justify-content-md-end">
              <?php dynamic_sidebar('footer-b3') ?>
            </div>
          </div>
        </div>
        <?php get_template_part( 'template-parts/footer/content', 'copyright' ); ?>
        <?php wp_footer(); ?>
      </footer>

