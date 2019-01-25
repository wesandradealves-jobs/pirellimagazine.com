<?php get_header(); ?>
<section class="webdoor">
    <ul class="breadcrumbs">
        <li><a href="<?php echo site_url(); ?>">Início</a></li>
        <li><?php echo single_cat_title( '', false ); ?></li>
    </ul>
    <h3 class="title"><?php echo single_cat_title( '', false ); ?></h3>
</section>
<section class="content">
    <div class="container">
    <div class="content-wrapper">
        <ul class="post-results">
        <?php if ( have_posts () ) :
				        while (have_posts()) : the_post();  ?>        
        <li class="post">
            <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
            <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> <span class="date"><a class="category" href="<?php echo get_term_link( get_the_category()[0]->slug, 'category' ); ?>"><?php echo get_the_category()[0]->name; ?></a> . <?php echo get_the_date(); ?></span></h3>
            <p class="excerpt"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a></p>
        </li>
        <?php endwhile; 
                else :
                    ?> <li><p><center>Nenhum post encontrado.</center></p></li> <?php
            endif; ?>                                                   
        </ul>
        <?php 
            echo $wp_query->max_num_pages;
            if( intval($wp_query->max_num_pages) > 1) :
                echo '<ul class="pagination">';
                echo '<li><a '.( (!get_query_var('paged') || get_query_var('paged') == 1) ? 'hidden' : '' ).' class="prev" href="'.home_url( $wp->request.'/?s='.get_query_var('s').'&paged='.( (get_query_var('paged')) ? (intval(get_query_var('paged')) - 1) : '' ) ).'">➔</a></li>';
                    for ($i = 1; $i <= intval($wp_query->max_num_pages); $i++) {
                        echo '<li '.( ($i === get_query_var('paged')) ? 'class="active"' : '' ).'><a  href="'.home_url( $wp->request.'/?s='.get_query_var('s').'&paged='.$i ).'">'.$i.'</a></li>';
                    }
                    echo '<li '.( (get_query_var('paged') == intval($wp_query->max_num_pages)) ? 'hidden' : '' ).'><a class="next" href="'.home_url( $wp->request.'/?s='.get_query_var('s').'&paged='.( (get_query_var('paged')) ? (intval(get_query_var('paged')) + 1) : '2' ) ).'">➔</a></li>';
                echo '</ul>'; 
            endif; 
        ?>	   
    </div>
    <?php if(get_sidebar()) : 
            get_sidebar(); 
        endif; ?>
    </div>
</section>
<?php get_footer(); ?>