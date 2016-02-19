<?php get_header(); ?>

<!-- This is the home.php -->

<!-- Section: Blog -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>What I have written</h2>
				</div>
				<p class="sub-blurb"><strong>Below are some of my thoughts on recent developments within the industry.</strong> These are my opinions only and do not reflect those of my employers.</p>

			</div>
		</div>

		<div class="spacer"></div>

		<?php
			wp_reset_query();
			
			$blog_count = 0;

			if( have_posts() ) : while ( have_posts() ) : the_post(); 

			$blog_id = get_post_thumbnail_id();

			foreach( ( get_the_category() ) as $category ) :
    				$category_name = $category->cat_name;
			endforeach;
		?>

		<!-- Latest projects -->
		<?php 
			if( $blog_count == 0 || $blog_count == 3 ) : 
				echo '<div class="row">';
			endif;
		?>

		<div class="col-md-4">
			

			<?php if ( $blog_id ) : 
				$blog_url = wp_get_attachment_image_src( $blog_id, 'full', true );
			?>

			<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">
			
				<img class="responsive" src="<?php echo $blog_url[ 0 ]; ?>" alt="<?php echo the_title(); ?>" />

				<?php else: 
					$blog_url = get_template_directory_uri() . '/dist/img/placeholder-image-1.jpg';
				?>
				<img class="responsive" src="<?php echo $blog_url; ?>" alt="<?php echo the_title(); ?>" />

				<?php endif; ?>
				
			</a>

			<div class="news">
				<span><?php the_time( 'M' ); ?> <p class="date"><?php the_time( 'j' ); ?></p><p class="year"><?php the_time( 'Y' ); ?></p></span>

				<h3 class="underline"><?php the_title(); ?></h3>
				<p><?php echo $category_name; ?></p>
				<p><?php echo balanceTags( wp_trim_words( get_the_content(), $num_words = 30, $more = '&hellip;' ), true ); ?></p>
				<a class="read-more" href="<?php the_permalink(); ?>" title="Read full article">Read full article</a>
			</div>
		</div>

		<?php 
			if( $blog_count == 2 || $blog_count == 5 ) : 
				echo '</div>';
			endif;
		?>

		<?php $blog_count++; endwhile; endif; ?>

		<div class="pagination">
			<?php html5wp_pagination(); ?>
		</div>

		<div class="spacer"></div>

	</article>
</section>

<?php get_footer(); ?>
