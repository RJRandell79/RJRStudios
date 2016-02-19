<?php get_header(); ?>

<!-- This is the tag.php -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>Tag: <?php echo single_tag_title( '', false ); ?></h2>
				</div>

			</div>
		</div>

		<div class="spacer"></div>

		<?php
			$article_count = 0;

			if( have_posts() ) : while ( have_posts() ) : the_post(); 

			$thumbnail_id = get_post_thumbnail_id();

			foreach( ( get_the_category() ) as $category ) :
    				$category_name = $category->cat_name;
			endforeach;
		?>

		<!-- Tagged items -->
		<?php 
			if( $article_count == 0 || $article_count == 3 || $article_count == 6 ) : 
				echo '<div class="row">';
			endif;
		?>

		<div class="col-md-4">

			<?php if ( $thumbnail_id ) : 
				$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full', true );
			?>

			<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">
			
				<img class="responsive" src="<?php echo $thumbnail_url[ 0 ]; ?>" alt="<?php echo the_title(); ?>" />

				<?php else: 
					$thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-image-1.jpg';
				?>
				<img class="responsive" src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>" />

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
			if( $article_count == 2 || $article_count == 5 || $article_count == 8 ) : 
				echo '</div>';
			endif;
		?>

		<?php $article_count++; endwhile; endif; ?>

		<div class="pagination">
			<?php html5wp_pagination(); ?>
		</div>

		<div class="spacer"></div>

	</article>
</section>

<?php get_footer(); ?>

