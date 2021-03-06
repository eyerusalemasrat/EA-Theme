<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EA
 */

get_header();
?>
    <section class = "page-wrap">
	<div class="container">

		<h1><?php echo single_cat_title();?></h1>

    	<?php get_template_part('inc/section', 'archive');?>
		<?php  
		global $wp_query;
		$big = 999999999;
		
		echo paginate_links(array(
			'base'=> str_replace($big, '%#%', esc_url(get_pagenue_link($bing))),
			'format'=> '?paged=%#%',
			'current' => max (1, get_query_var( 'paged' )),
			'total' => $wp_query->max_num_pages
		));
		
		?>
		
	</div>
	</section>
		


	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


<div class="col-md-4">
<?php get_sidebar(); ?>
</div>
<?php 
get_footer();
