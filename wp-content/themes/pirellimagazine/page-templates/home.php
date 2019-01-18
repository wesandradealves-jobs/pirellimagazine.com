<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<?php 
    $meta_query[] = array(array(
        'key'     => 'destaque',
        'value'   => '1',
        'compare' => '=',
        'type'    => 'CHAR',
    ));  
    $blog = new WP_Query( array(
      'post_type'              => array( 'post' ),
      'posts_per_page' => 4,  
      'meta_query' => ($meta_query) ? $meta_query : '',
      'order' => 'DESC'
    ) );

    if($blog) :
?>
<section class="destaques">
    <div class="container">
    <ul class="destaques-grid">
        <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
        <li>
            <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)">
                <div class="display">
                <div>
                    <p class="category">
                        <a title="<?php echo get_the_category()[0]->name; ?>" href="<?php echo get_term_link( get_the_category()[0]->slug, 'category' ); ?>"><?php echo get_the_category()[0]->name; ?></a>
                    </p>
                    <h3 class="title">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                </div>
                </div>
                <div class="thumbnail zoom" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
            </div>
        </li>
        <?php endwhile; ?>   
    </ul>
    </div>
</section>
<?php endif; ?>
<section class="news">
    <div class="container">
    <div class="main-news">
        <div class="title-header">
        <h4 class="section-title"><strong>Motor</strong>Sports</h4>
        <ul class="categories-list">
            <?php 
                $motorsportsCats = get_categories( array( 'hide_empty' => false, 'child_of' => 13 ) ); 
                if($motorsportsCats) :
                    foreach ( $motorsportsCats as $category ) :
            ?>
            <li>
                <a href="<?php echo get_term_link( $category->term_id, 'category' ); ?>"><?php echo $category->cat_name; ?></a>
            </li>   
            <?php endforeach; 
            endif; ?>
        </ul>
        </div>
        <?php 
            $tax_query[] =  array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'order' => 'DESC',        
                'terms' => 'motorsports'
            );       
            $motorsports = new WP_Query( array(
                'post_type'              => array( 'post' ),
                'posts_per_page' => 1,  
                'tax_query' => ($tax_query) ? $tax_query : '',
                'order' => 'DESC'
            ) );                         
        ?>
        <div class="news-wrapper">
            <?php if($motorsports) : 
                    while ( $motorsports->have_posts() ) : $motorsports->the_post(); $last_post = get_the_id(); ?>
                <div class="featured-news">
                    <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
                    <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a> <span class="date"><a class="category" href="<?php echo get_term_link( get_the_category()[1]->slug, 'category' ); ?>"><?php echo get_the_category()[1]->name; ?></a> . <?php echo get_the_date(); ?></span></h3>
                    <p class="excerpt"><a href="<?php echo get_the_permalink(); ?>"><?php echo substr(get_the_content(), 0, 70); ?></a></p>
                </div>
            <?php endwhile;
            endif; ?>  
            <?php 
                $motorsports_feed = new WP_Query( array(
                    'post_type'              => array( 'post' ),
                    'posts_per_page' => 4,  
                    'tax_query' => ($tax_query) ? $tax_query : '',
                    'post__not_in' => array($last_post),
                    'order' => 'DESC'
                ) );      
                if($motorsports_feed) :          
            ?>
            <ul class="news-list">
                <?php while ( $motorsports_feed->have_posts() ) : $motorsports_feed->the_post(); ?>
                    <li>
                    <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
                    <div class="info">
                        <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a> <span class="date"><a class="category" href="<?php echo get_term_link( get_the_category()[1]->slug, 'category' ); ?>"><?php echo get_the_category()[1]->name; ?></a> . <?php echo get_the_date(); ?></span></h3>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="home-assets">
        <?php get_template_part('template_parts/weather');  ?>
        <?php if(get_theme_mod('facebook')||get_theme_mod('instagram')||get_theme_mod('twitter')||get_theme_mod('linkedin')) : ?>
        <ul class="social-networks">
            <?php if(get_theme_mod('facebook')) : ?>
            <li>
                <a href="" target="_blank">
                <i class="fab fa-facebook-f"></i>
                <span class="social-url">facebook.com/<strong><?php echo get_theme_mod('facebook'); ?></strong></span>
                <!-- <span class="social-counter">69k</span> -->
                </a>
            </li>
            <?php endif; ?>
            <?php if(get_theme_mod('instagram')) : ?>
            <li>
                <a href="" target="_blank">
                <i class="fab fa-instagram"></i>
                <span class="social-url">instagram.com/<strong><?php echo get_theme_mod('instagram'); ?></strong></span>
                <!-- <span class="social-counter">87k</span> -->
                </a>
            </li>    
            <?php endif; ?>   
            <?php if(get_theme_mod('twitter')) : ?>  
            <li>
                <a href="" target="_blank">
                <i class="fab fa-twitter"></i>
                <span class="social-url">twitter.com/<strong><?php echo get_theme_mod('twitter'); ?></strong></span>
                <!-- <span class="social-counter">31k</span> -->
                </a>
            </li>  
            <?php endif; ?>      
            <?php if(get_theme_mod('linkedin')) : ?>      
            <li>
                <a href="" target="_blank">
                <i class="fab fa-linkedin"></i>
                <span class="social-url">linkedin.com/<strong><?php echo get_theme_mod('linkedin'); ?></strong></span>
                <!-- <span class="social-counter">23k</span> -->
                </a>
            </li>  
            <?php endif; ?>                          
        </ul>
        <?php endif; ?>
    </div>
    </div>
</section>
<?php get_footer(); ?>