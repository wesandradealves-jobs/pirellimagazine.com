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
              <li>
                <a href="">Bentley</a>
              </li>
              <li>
                <a href="">Ferrari</a>
              </li>
              <li>
                <a href="">Lamborghini</a>
              </li>     
              <li>
                <a href="">Maserati</a>
              </li>                 
              <li>
                <a href="">McLaren</a>
              </li>    
              <li>
                <a href="">Pagani</a>
              </li>           
              <li>
                <a href="">Porsche</a>
              </li>     
              <li>
                <a href="javascript:void(0)">Motorsports <i class="fal fa-angle-down"></i></a>
                <ul>
                  <li>
                    <a href="">Lorem ipsum dolor sit amet.</a>
                  </li>
                  <li>
                    <a href="">Lorem, ipsum.</a>
                  </li>
                  <li>
                    <a href="">Lorem ipsum dolor sit amet consectetur.</a>
                  </li>
                </ul>
              </li>   
            </ul>
          </nav>        
        <div class="header">
          <div class="container">
            <h1 class="logo">
              <a href="index.html"><img src="assets/imgs/logo.png" alt=""></a>
            </h1>
            <nav class="navigation">
              <ul>
                <li>
                  <a href="">Bentley</a>
                </li>
                <li>
                  <a href="">Ferrari</a>
                </li>
                <li>
                  <a href="">Lamborghini</a>
                </li>     
                <li>
                  <a href="">Maserati</a>
                </li>                 
                <li>
                  <a href="">McLaren</a>
                </li>    
                <li>
                  <a href="">Pagani</a>
                </li>           
                <li>
                  <a href="">Porsche</a>
                </li>     
                <li>
                  <a href="">Motorsports <i class="fal fa-angle-down"></i></a>
                  <ul>
                    <li>
                      <a href="">Lorem ipsum dolor sit amet.</a>
                    </li>
                    <li>
                      <a href="">Lorem, ipsum.</a>
                    </li>
                    <li>
                      <a href="">Lorem ipsum dolor sit amet consectetur.</a>
                    </li>
                  </ul>
                </li>   
                <li>
                  <button class="hamburger hamburger--collapse js-hamburger" type="button">
                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
                  </button>
                </li>                                                                             
              </ul>
            </nav>
            <h2 class="profile-category">
              <span>Prestige</span>
            </h2>
          </div>
        </div>
        <div class="tendencias">
          <div class="container">
            <p class="tendencias-label"><strong>Tendência</strong> Agora</p>
            <div class="tendencias-carousel">
              <div class="item">
                <p><a href='single.html'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</a></a></p>
              </div>
              <div class="item">
                <p><a href='single.html'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</a></a></p>
              </div>
              <div class="item">
                <p><a href='single.html'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</a></a></p>
              </div>
              <div class="item">
                <p><a href='single.html'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</a></a></p>
              </div>                                          
            </div>
          </div>
        </div>
      </header>
      <main>