 <?php if(have_posts() ): while(have_posts()): the_post();?>
 <div class="card">
     <div class="card-body">
 
  <h1><?php the_title();?></h1>    
 
 
 <?php the_content();?>
 <a href="<?php the_permalink(  )?>" class="btn btn-success">Read more</a>
</div>
</div>

<?php endwhile; else; endif;?>