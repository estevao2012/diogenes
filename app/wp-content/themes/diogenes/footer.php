<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package diogenes
 */
?>

	</main><!-- #content -->

	<footer>
    <div class="wrapper">
      <div class="col-sm-5 copyright">Copyright</div>
      <div class="col-sm-7 menu-footer">
        <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?> 
      </div>
    </div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
