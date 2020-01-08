<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <article class="<?php post_class(); ?>">
        <h1><?php the_title(); ?></h1>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <a href="<?php the_permalink(); ?>">Read more</a>
    </article>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>