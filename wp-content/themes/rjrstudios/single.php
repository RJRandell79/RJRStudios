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

				<?php if( is_singular( 'projects' ) ) : ?>

					<div class="spacer"></div>

					<?php 
						$screens = get_field( 'screenshots' ); 
						$screensCount = count( $screens );

						if( $screensCount > 1 ) :

							$slide_count = 0;

						//var_dump( $screens );
					?>

					<div id="projectscarousel" class="carousel slide" data-ride="carousel">

	      				<!-- Indicators -->
	      				<ol class="carousel-indicators">
	      					
	      					<?php foreach( $screens as $screen ) : ?>

	        					<li data-target="#projectscarousel" data-slide-to="0" class="<?php if( $slide_count === 0 ) : echo 'active'; endif; ?>"></li>

	        				<?php $slide_count++; endforeach; ?>
	      				</ol>

	      				<div class="carousel-inner" role="listbox">

	      					<?php $slide_count = 0; ?>

	      					<?php foreach( $screens as $screen ) : ?>

	        				<div class="item <?php if( $slide_count === 0 ) : echo 'active'; endif; ?>">
	          					<img class="" src="<?php echo $screen['slide']['url']; ?>" alt="">

	          					<div class="container">
				  					<div class="carousel-caption">
				  						<p><a href="<?php echo $screen['full_image']; ?>" target="_blank" title="See screenshot">See screenshot</a></p>
				  			
				  					</div>
				  				</div>

	          				</div>

	          				<?php $slide_count++; endforeach; ?>
	          			</div>
	  
	      				<a class="left carousel-control" href="#projectscarousel" role="button" data-slide="prev">
	        				<span class="chevron chevron-left" aria-hidden="true"></span>
	        				<span class="sr-only">Previous</span>
	      				</a>

	      				<a class="right carousel-control" href="#projectscarousel" role="button" data-slide="next">
	        				<span class="chevron chevron-right" aria-hidden="true"></span>
	        				<span class="sr-only">Next</span>
	      				</a>

					</div><!-- /.carousel -->

					<?php else : ?>

						<?php 
							$banner = get_field( 'banner_image' ); 
							$banner_link = get_field( 'banner_link' );
						?>

						<?php if ( $banner && $banner_link ) : ?>
						
						<div class="single-image-banner">
							<img class="responsive" src="<?php echo $banner; ?>" alt="<?php echo the_title(); ?>" />

							<a href="<?php the_field( 'banner_link' ); ?>" title="<?php echo the_title(); ?>">See screenshot</a>
						</div>

						<?php else: 
							$thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-full-width-image-1200x380.jpg';
						?>
							<img class="responsive" src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>" />
						
						<?php endif; ?>

					<?php endif; ?>
			
					<div class="spacer"></div>

					<div class="row single-project">
						<div class="col-md-7">
							<h6>Overview</h6>
							
							<?php the_content(); ?>
	
						</div>

						<div class="col-md-5">

							<h6>Details</h6>
							<p class="border-bottom"><strong>Date:</strong> <?php the_time( 'jS F Y' ); ?></p>
							<p class="border-bottom"><strong>Client:</strong> <?php the_field( 'client' ); ?></p>
							<p class="border-bottom"><strong>Skills:</strong> <?php the_tags( '', '' ); ?></p>

							<?php 
								$weblink = get_field( 'website_link' ); 
								if( $weblink ) :
							?>
							<p class="border-bottom"><strong>Website:</strong> <a href="<?php the_field( 'website_link' ); ?>" title="Go to website" target="_blank">Open in new tab</a></p>

							<?php endif; ?>

							<?php if( get_next_post() ) : ?>
								<p class="border-bottom"><strong>Next project: </strong><?php next_post_link( '%link' ); ?></p>
							<?php endif; ?>

							<?php if ( get_previous_post() ) : ?>
								<p class="border-bottom"><strong>Previous project: </strong> <?php previous_post_link( '%link' ); ?></p>
							<?php endif; ?>

							<p class="border-bottom"><strong>All projects: </strong><a href="<?php bloginfo( 'url' ); ?>/portfolio" title="See all articles">See all projects</a></p> 
							
							


						</div>

					</div>

				<?php else : ?>

					<?php $banner = get_field( 'banner_image' ); ?>

						<?php if ( $banner ) : ?>
							<img class="responsive" src="<?php echo $banner; ?>" alt="<?php echo the_title(); ?>" />

						<?php else: 
							$thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-full-width-image-1200x380.jpg';
						?>
							<img class="responsive" src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>" />
						
					<?php endif; ?>

					<div class="spacer"></div>

					<div class="row single-news">

						<div class="col-md-7">
							<?php the_content(); ?>
						</div>

						<?php $categories = get_the_category(); ?>

						<div class="col-md-5">
							<p class="border-bottom"><strong>Date published:</strong> <?php the_time( 'jS F Y' ); ?></p>
							<p class="border-bottom"><strong>Categories:</strong> <?php foreach( $categories as $category ) : ?>

								<a href="<?php echo bloginfo( 'url' ) . '/category/' . $category->category_nicename; ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a></p>
							<?php endforeach; ?>

							<?php if( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Blog Sidebar' ) ); ?>

							<?php if( get_next_post() ) : ?>
								<p class="border-bottom"><strong>Next article: </strong><?php next_post_link( '%link' ); ?></p>
							<?php endif; ?>

							<?php if( get_previous_post() ) : ?>
								<p class="border-bottom"><strong>Previous article: </strong> <?php previous_post_link( '%link' ); ?></p>
							<?php endif; ?>
							
							<p class="border-bottom"><strong>All articles: </strong><a href="<?php bloginfo( 'url' ); ?>/blog" title="See all articles">See all articles</a></p> 
							

						</div>

					</div>

				<?php endif; ?>

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
