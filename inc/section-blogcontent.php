<?php if(have_posts()): while( have_posts() ) : the_post(); ?>
    
    <a><?php echo get_the_date('l js F, Y'); 
    
    ?></a>
    <?php the_content(); ?>
    <?php 
    $fname =get_the_author_meta('first_name');
    $lname = get_the_author_meta('last_name');
    ?>
    <p> Posted by <?php echo $fname;?>  <?php echo $lname;?></p>  
    ?>
    <?php
    $tags = get_the_tages();
    foreach($tags as $tag);
    ?>
    <ahref="<?php echo get_tag_link($tag->term_id);?>">
        <?php echo $tag->name;?>
<?php endforeach;?>
<?php endwhile: else: endif:?>