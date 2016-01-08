<?php get_header(); ?>

<!-- This is the single.php -->
<section class="container-fluid">
	<article class="container">

		<?php if( have_posts() ) : ?>

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>

				<?php while ( have_posts() ) : the_post(); ?>

				<div class="subtitle">
					<h2><?php the_title(); ?></h2>
				</div>
				<p class="sub-blurb"><?php the_content(); ?></p>

				<?php endwhile; ?>

			</div>
		</div>

		<div class="spacer"></div>

		<?php else: ?>

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<p class="sub-blurb">Sorry, there doesn't seem to be any content to display here&hellip;</p>

			</div>
		</div>

		<div class="spacer"></div>

		<?php endif; ?>

	</article>
</section>

<?php get_footer(); ?>
