<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
  <head>
    <title><?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <?php wp_meta(); ?>
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php wp_head(); ?>
  </head>
  <body   
  <?php
    if (is_front_page()) {
      echo 'class="pg-home"';
    } else if(is_author()){
      echo 'class="pg-author pg-profile pg-interna"';
    } else if(is_archive()){
      echo 'class="pg-archive pg-interna"';
    } else if(is_category()){
      echo 'class="pg-category pg-interna"';
    } else if(is_search()){
      echo 'class="pg-search pg-interna"';
    } else if(is_single()){
      echo 'class="pg-single pg-interna"';
    } else if(is_404()){
      echo 'class="pg-404 pg-interna"';
    } else {
      echo 'class="pg-interna pg-'.str_replace(' ','-',strToLower(get_the_title())).' page_id_'.$post->ID.'"';
    }
    ?>>  
    <div id="wrap">
      <header id="header">
          <nav class="navigation -mobile">
            <ul>
                <?php 
                  $cat = wp_list_categories( array(
                      'taxonomy'            => 'category',
                      'echo' => true,
                      'order' => 'ASC',
                      'show_count' => false,
                      'hide_empty' => false,
                      'title_li' => ''
                  ) );
                  
                  $cat = preg_replace( '~\((\d+)\)(?=\s*+<)~', '$1', $cat );
                  echo $cat;
                ?>		
            </ul>
          </nav>        
        <div class="header">
          <div class="container">
            <h1 class="logo">
              <a href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                  <?php if(get_theme_mod('logo')) : ?>
                      <img height="20" src="<?php echo get_theme_mod('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                  <?php else : ?>
                      <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                  <?php endif; ?>
              </a> 
            </h1>
            <nav class="navigation">
              <ul>
                <?php 
                  $cat = wp_list_categories( array(
                      'taxonomy'            => 'category',
                      'echo' => true,
                      'order' => 'ASC',
                      'show_count' => false,
                      'hide_empty' => false,
                      'title_li' => ''
                  ) );
                  
                  $cat = preg_replace( '~\((\d+)\)(?=\s*+<)~', '$1', $cat );
                  echo $cat;
                ?>
                <li>
                  <button class="hamburger hamburger--collapse js-hamburger" type="button">
                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
                  </button>
                </li>                                                                             
              </ul>
            </nav>
            <?php if(get_current_blog_id() != 1) : ?>
            <h2 class="profile-category">
              <span><?php echo bloginfo(); ?></span>
            </h2>
            <?php endif; ?>
          </div>
        </div>
        <?php if(is_front_page()) : 
          get_template_part('template_parts/tendencias'); 
        endif;  ?>
      </header>
      <main>