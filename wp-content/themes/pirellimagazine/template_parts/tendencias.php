<?php 
    $tendencias = new WP_Query( array(
      'post_type'              => array( 'tendencias' ),
      'posts_per_page' => -1,  
      'order' => 'DESC'
    ) );

    if($tendencias) :
?>
<div class="tendencias">
    <div class="container">
    <p class="tendencias-label"><strong>Tendência</strong> Agora</p>
    <div class="tendencias-carousel">
        <?php while ( $tendencias->have_posts() ) : $tendencias->the_post(); ?>
            <div class="item">
                <p><a title='<?php echo get_the_title(); ?>' href='<?php echo get_the_permalink(); ?>'><?php echo get_the_excerpt(); ?></a></p>
            </div>        
        <?php endwhile; ?>        
    </div>
    </div>
</div>
<?php endif; ?>