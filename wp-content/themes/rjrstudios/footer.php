
<!-- This is the footer.php -->
<footer class="container-fluid">
	<div class="container">

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>Work with me</h2>
				</div>

				<?php echo do_shortcode( '[contact-form-7 id="29" title="Footer Contact Form"]' ); ?>

				<div class="spacer"></div>

				<p>Lancashire &amp; Manchester, United Kingdom</p>

				<?php
                    $twitter = get_option( 'twitter_url' ); 
                    $linkedin = get_option( 'linkedin_url' );
                    $facebook = get_option( 'facebook_url' );
                    $pinterest = get_option( 'pinterest_url' );
                    $analytics = get_option( 'analytics' );
                ?>

                <ul class="social-links clearfix">
                    <?php if( $twitter ) : ?>
                        <li><a href="<?php echo $twitter; ?>" title="Twitter" target="_blank">Twitter</a></li>
                    <?php endif; ?>
                    <?php if( $linkedin ) : ?>
                        <li><a href="<?php echo $linkedin; ?>" title="LinkedIn" target="_blank">LinkedIn</a></li>
                    <?php endif; ?>
                    <?php if( $facebook ) : ?>
                        <li><a href="<?php echo $facebook; ?>" title="Facebook" target="_blank">Facebook</a></li>
                    <?php endif; ?>
                    <?php if ( $pinterest ) : ?>
                        <li><a href="<?php echo $pinterest; ?>" title="Pinterest" target="_blank">Pinterest</a></li>
                    <?php endif; ?>
                </ul>

                <p class="copyright">&copy;<?php echo date( 'Y' ); ?> Rob Randell</p>

			</div>
		</div>

	</div>
	
	<?php wp_footer(); ?>

    <?php if( $analytics ) : echo $analytics; endif; ?>

</footer>

</body>
</html>
