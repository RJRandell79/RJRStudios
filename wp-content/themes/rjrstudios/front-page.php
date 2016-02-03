<?php get_header(); ?>

<!-- This is the front-page.php -->

<!-- Section: Work Done -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>What I have done</h2>
				</div>
				<p class="sub-blurb"><strong>Zril consulatu conclusionemque quo at. Mazim salutatus hendrerit usu no.</strong> Labore urbanitas instructior ex eum, scripserit interesset ei pro. Ut his fierent vivendum, te sea denique repudiandae. Dolores gloriatur sententiae no eam, eum ex error ornatus invidunt.</p>

			</div>
		</div>

		<div class="spacer"></div>

		<?php
			wp_reset_query();

			$project_args = array(
				'post_type' => 'projects',
				'posts_per_page' => 6
			);
			$projects = new WP_Query( $project_args );

			$project_count = 0;

			if( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post(); 

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

				<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">

					<?php if ( $project_id ) : 
						$project_url = wp_get_attachment_image_src( $project_id, 'full', true );
					?>
					<img class="responsive" src="<?php echo $project_url[ 0 ]; ?>" alt="<?php echo the_title(); ?>" />

					<?php else: 
						$project_url = get_template_directory_uri() . '/dist/img/placeholder-image-1.jpg';
					?>
					<img class="responsive" src="<?php echo $project_url; ?>" alt="<?php echo the_title(); ?>" />
		
					<?php endif; ?>

				</a>

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

		<div class="spacer"></div>
		<div class="see-more">
			<a href="<?php bloginfo( 'url' ); ?>/portfolio/" title="See more projects">See more projects</a>
		</div>
		<div class="spacer"></div>

	</article>
</section>

<?php if( have_rows( 'clients', 4 ) ) : ?>

<!-- Section: Clients -->
<section class="container-fluid clients">
	<article class="container">
		<div class="spacer"></div>
		<ul class="clearfix">
			
			<?php while( have_rows( 'clients', 4 ) ) : the_row(); ?>

			<li><img src="<?php the_sub_field( 'client_logo' ); ?>" alt="<?php the_sub_field( 'client_name' ); ?>" /></li>

			<?php endwhile; ?>
			
		</ul>
		<div class="spacer"></div>
	</article>
</section>

<?php endif; ?>

<!-- Section: About Me -->
<section class="container-fluid about">
	<article class="container">

		<div class="spacer"></div>

		<div class="row">
			<div class="col-md-6">
				<h2>Hello, I&rsquo;m Rob.</h2>
				<p><strong>I specialise in creating and developing defining digital experiences.</strong> I am a UK based digital developer currently working at mmadigital. I collabrate with User Experience (UX) Specialists and other Digital Designers and Digital Developers to create positive user experiences in all my projects. I have well over 10 years commerical experience in helping bring great ideas to life.</p>

				<p>I absolutely love good clean minimalist design and have a passion of all things digital and emerging technologies such as Augmented Reality. I develop native iOS applications as a hobby and attend other industry related events. I have an interest in computers, video games and technology.</p>

				<div class="spacer"></div>

				<?php if( have_rows( 'skillset', 38 ) ) : ?>

				<ul>
					<?php while( have_rows( 'skillset', 38 ) ) : the_row(); ?>
					
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

			<div class="col-md-6">

				<?php $portrait_id = get_post_thumbnail_id( 40 ); ?>

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

				

			</div>
		</div>

		<div class="spacer"></div>
		<div class="see-more">
			<a href="<?php bloginfo( 'url' ); ?>/about-me/" title="More about me">Learn more</a>
		</div>
		<div class="spacer"></div>

	</article>
</section>

<!-- Section: Twitter -->
<section class="container-fluid twitter">
	<article class="container">
		<div class="row">

			<div class="col-md-12">
				<?php if( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Twitter Sidebar' ) ); ?>
			</div>

			<img src="<?php echo get_template_directory_uri() . '/dist/svg/icon-twitter.svg' ?>" alt="Twitter Icon" />

		</div>

	</article>
</section>

<!-- Section: Services -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>What I provide</h2>
				</div>
				<p class="sub-blurb"><strong>Zril consulatu conclusionemque quo at. Mazim salutatus hendrerit usu no.</strong> Labore urbanitas instructior ex eum, scripserit interesset ei pro. Ut his fierent vivendum, te sea denique repudiandae. Dolores gloriatur sententiae no eam, eum ex error ornatus invidunt.</p>

			</div>
		</div>

		<div class="spacer"></div>

		<?php
			wp_reset_query();

			$services_args = array(
				'post_type' => 'services',
				'posts_per_page' => 6
			);
			$services = new WP_Query( $services_args );

			$services_count = 0;

			if( $services->have_posts() ) : while ( $services->have_posts() ) : $services->the_post(); 

			$service_id = get_post_thumbnail_id();
		?>

		<!-- Services -->
		<?php 
			if( $services_count == 0 || $services_count == 3 ) : 
				echo '<div class="row">';
			endif;
		?>

		<div class="col-md-4">
			<div class="service">

				<?php if ( $service_id ) : 
					$service_url = wp_get_attachment_image_src( $service_id, 'full', true );
				?>
				<img class="responsive" src="<?php echo $service_url[ 0 ]; ?>" alt="<?php echo the_title(); ?>" />

				<?php else: 
					$service_url = get_template_directory_uri() . '/dist/img/placeholder-image-1.jpg';
				?>
				<img class="responsive" src="<?php echo $service_url; ?>" alt="<?php echo the_title(); ?>" />
	
				<?php endif; ?>

				<h3 class="underline"><?php the_title(); ?></h3>
				<p><?php echo balanceTags( wp_trim_words( get_the_content(), $num_words = 30, $more = '&hellip;' ), true ); ?></p>
				<a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">More details</a>
			</div>
		</div>

		<?php 
			if( $services_count == 2 || $services_count == 5 ) : 
				echo '</div>';
			endif;
		?>

		<?php $services_count++; endwhile; endif; ?>

	</article>
</section>

<?php 
	$quotes = get_field( 'quotes', 4 );
	
	if( $quotes ) :
		$quoteCount = count( $quotes );
		$randomQuote = rand( 0, $quoteCount - 1 );
?>

<!-- Section: Quote -->
<section class="container-fluid quote">
	<article class="container">
		<div class="row">

			<div class="col-md-12">
				<p><?php echo $quotes[ $randomQuote ][ 'quote' ]; ?></p>
			</div>

			<span><strong><?php echo $quotes[ $randomQuote ][ 'from' ]; ?></strong></span>

		</div>
	</article>
</section>

<?php endif; ?>

<!-- Section: News -->
<section class="container-fluid">
	<article class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="spacer"></div>
				<div class="subtitle">
					<h2>What I have written</h2>
				</div>
				<p class="sub-blurb"><strong>Zril consulatu conclusionemque quo at. Mazim salutatus hendrerit usu no.</strong> Labore urbanitas instructior ex eum, scripserit interesset ei pro. Ut his fierent vivendum, te sea denique repudiandae. Dolores gloriatur sententiae no eam, eum ex error ornatus invidunt.</p>

			</div>
		</div>

		<div class="spacer"></div>

		<?php
			wp_reset_query();

			$news_args = array(
				'posts_per_page' => 3
			);
			$news_articles = new WP_Query( $news_args );

			if( $news_articles->have_posts() ) : 
		?>

		<!-- Services, first row -->
		<div class="row">

			<?php 
				while ( $news_articles->have_posts() ) : $news_articles->the_post(); 

				foreach( ( get_the_category() ) as $category ) :
    				$category_name = $category->cat_name;
				endforeach;

				$thumbnail_id = get_post_thumbnail_id();
			?>

			<div class="col-md-4">

				<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>">

					<?php if ( $thumbnail_id ) : 
						$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full', true ); 
					?>
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

			<?php endwhile; ?>
		</div>

		<div class="spacer"></div>
		<div class="see-more">
			<a href="<?php bloginfo( 'url' ); ?>/blog/" title="See more articles">See more articles</a>
		</div>
		<div class="spacer"></div>

		<?php else: ?>

			<div class="row">
				<div class="col-md-12">
					<p>Sorry, there doesn't appear to be any news articles to display&hellip;</p>
				</div>
			</div>

			<div class="spacer"></div>

		<?php endif; ?>


	</article>
</section>

<?php get_footer(); ?>
