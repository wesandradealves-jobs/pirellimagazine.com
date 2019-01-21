<?php get_header(); ?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<section class="webdoor" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)">
  <ul class="breadcrumbs">
    <li><a href="<?php echo site_url(); ?>">Início</a></li>
    <?php 
      if(get_the_category()[0]) : 
    ?>    
    <li><a href="<?php echo get_term_link( get_the_category()[0]->slug, 'category' ); ?>"><?php echo get_the_category()[0]->name; ?></a></li>
    <?php endif; ?>
    <?php 
      if(get_the_category()[1]) : 
    ?>
    <li><a href="<?php echo get_term_link( get_the_category()[1]->slug, 'category' ); ?>"><?php echo get_the_category()[1]->name; ?></a></li>
    <?php endif; ?>
    <li><?php the_title(); ?></li>
  </ul>
  <a class="category" href="<?php echo get_term_link( get_the_category()[0]->slug, 'category' ); ?>"><?php echo get_the_category()[0]->name; ?></a>
  <!-- <a class="category" href="category.html">LAMBORGHINI</a> -->
  <h3 class="title">
    <?php the_title(); ?>
  </h3>
  <p class="date"><?php the_date(); ?></p>
  <?php echo do_shortcode("[wp_social_sharing social_options='facebook,twitter' twitter_username='arjun077' facebook_text='' twitter_text='' icon_order='f,t' show_icons='1']"); ?>
  <!-- <ul class="social-networks">
    <li>
      <a href="" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
    </li>
    <li>
      <a href="" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </li>         
    <li>
      <a href="" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
    </li>              
    <li>
      <a href="" target="_blank">
        <i class="fab fa-linkedin"></i>
      </a>
    </li>                            
  </ul>           -->
</section>
<section class="content">
  <div class="container">
    <div class="content-wrapper">
      <?php 
        the_content();
      ?>
    </div>
    <?php if(get_sidebar()) : 
            get_sidebar(); 
        endif; ?>
  </div>
</section>
</div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>