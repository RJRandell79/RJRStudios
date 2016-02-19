<?php get_header(); ?>

<!-- This is the page.php -->
<?php if( is_page( 36 ) ) : ?>

<!-- Section: Work Done -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>What I have done</h2>
				</div>
				<p class="sub-blurb"><strong>Below is a selection of some of the most recent projects that I have been involved in.</strong> This selection of my projects includes 3D modelling and websites.</p>

			</div>
		</div>

		<div class="spacer"></div>

		<?php
			wp_reset_query();

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$project_args = array(
				'post_type' => 'projects',
				'posts_per_page' => 6,
				'paged' => $paged
			);
			$projects = new WP_Query( $project_args );

			$wp_query = $projects;
			
			$project_count = 0;

			if( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

			$project_id = get_post_thumbnail_id();
		?>

		<!-- Latest projects -->
		<?php 
			if( $project_count == 0 || $project_count == 3 ) : 
				echo '<div class="row">';
			endif;
		?>

		<div class="col-md-4">
			<div class="project">

				<?php if ( $project_id ) : 
					$project_url = wp_get_attachment_image_src( $project_id, 'full', true );
				?>

				<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
					<img class="responsive" src="<?php echo $project_url[ 0 ]; ?>" alt="<?php echo the_title(); ?>" />
				</a>

				<?php else: 
					$project_url = get_template_directory_uri() . '/dist/img/placeholder-image-1.jpg';
				?>

				<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
					<img class="responsive" src="<?php echo $project_url; ?>" alt="<?php echo the_title(); ?>" />
				</a>
				
	
				<?php endif; ?>

				<h3><?php the_title(); ?></h3>
				<div></div>
				<p><?php echo balanceTags( wp_trim_words( get_the_content(), $num_words = 30, $more = '&hellip;' ), true ); ?></p>
				<a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">See project</a>
			</div>
		</div>

		<?php 
			if( $project_count == 2 || $project_count == 5 ) : 
				echo '</div>';
			endif;
		?>

		<?php $project_count++; endwhile; endif; ?>

		<div class="pagination">
			<?php html5wp_pagination(); ?>
		</div>

		<div class="spacer"></div>

	</article>
</section>

<?php elseif( is_page( 38 ) ) : ?>

<!-- Section: About Page -->
<section class="container-fluid">
	<article class="container">

		<div class="row about-page">
			<div class="col-md-7">
				<div class="spacer"></div>

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="subtitle">
					<h2><?php the_title(); ?></h2>
				</div>
				<p class="sub-blurb"><?php the_content(); ?></p>

				<?php endwhile; endif; ?>

			</div>

			<div class="col-md-5">

				<div class="spacer"></div>

				<?php $portrait_id = get_post_thumbnail_id(); ?>

				<?php if ( $portrait_id ) : 
					$portrait_url = wp_get_attachment_image_src( $portrait_id, 'full', true ); 
				?>
				<img class="responsive" src="<?php echo $portrait_url[ 0 ]; ?>" alt="<?php echo the_title(); ?>" />

				<?php else: 
					$portrait_url = get_template_directory_uri() . '/dist/img/placeholder-image-1.jpg';
				?>
				<img class="responsive" src="<?php echo $portrait_url; ?>" alt="<?php echo the_title(); ?>" />
	
				<?php endif; ?>

				<div class="spacer"></div>

				<?php if( have_rows( 'skillset' ) ) : ?>

				<ul>
					<?php while( have_rows( 'skillset' ) ) : the_row(); ?>
					
					<li>
						<div class="skill-bar">
							<div style="width: <?php the_sub_field( 'skill_rating' ); ?>%;"></div>
							<p><?php the_sub_field( 'skill_name' ); ?></p>
							<p class="right"><?php the_sub_field( 'skill_rating' ); ?>%</p>
						</div>
					</li>

					<?php endwhile; ?>
				</ul>

				<?php endif; ?>

			</div>
		</div>

		<div class="spacer"></div>

	</article>
</section>

<?php else : ?>

<!-- Section: Normal Page -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="subtitle">
					<h2><?php the_title(); ?></h2>
				</div>
				<p class="sub-blurb"><?php the_content(); ?></p>

				<?php endwhile; endif; ?>

			</div>
		</div>

		<div class="spacer"></div>

	</article>
</section>

<?php endif; ?>

<?php get_footer(); ?>
