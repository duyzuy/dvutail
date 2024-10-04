</main>
<footer id="main-footer" class="main__footer relative z-10">
  <?php get_template_part('/templates/partials/footer', 'information') ?>

  <div class="footer__last mb-6">
    <div class="container mx-auto px-3 md:px-6 lg:px-8">
      <div class="inner bg-white shadow-sm rounded-md p-6">
        <div class="text-center mb-3 text-sm">
          <?php if (is_active_sidebar('sidebar-footer-1')) : ?>
            <?php dynamic_sidebar('sidebar-footer-1'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

</footer>
<?php do_action('body_script_after_close') ?>
<?php wp_footer() ?>
</body>

</html>