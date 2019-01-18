<?php 
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );

	global $post;

	define( 'USER_CATEGORY_NAME', 'user_category' );
	define( 'USER_CATEGORY_META_KEY', '_user_category' );

	function nopio_register_user_category_taxonomy() {
		register_taxonomy(
			'user_category', //taxonomy name
			'user', //object for which the taxonomy is created
			array( //taxonomy details
				'public' => true,
				'labels' => array(
					'name'		=> 'Usuário Categorias',
					'singular_name'	=> 'Usuário Categoria',
					'menu_name'	=> 'Usuário Categorias',
					'search_items'	=> 'Procurar Usuário Categoria',
					'popular_items' => 'Populares Usuário Categorias',
					'all_items'	=> 'Todos Usuário Categorias',
					'edit_item'	=> 'Editar Usuário Categoria',
					'update_item'	=> 'Atualizar Usuário Categoria',
					'add_new_item'	=> 'Adicionar Novo Usuário Categoria',
					'new_item_name'	=> 'Novo Usuário Categoria',
				),
				'update_count_callback' => function() {
					return; //important
				}
				)
			);
	}

	function nopio_add_user_categories_admin_page() {
		$taxonomy = get_taxonomy( 'user_category' );
		add_users_page(
			esc_attr( $taxonomy->labels->menu_name ),
			esc_attr( $taxonomy->labels->menu_name ),
			$taxonomy->cap->manage_terms,
			'edit-tags.php?taxonomy=' . $taxonomy->name
		);
    }
    
    function cpt() {
        register_post_type('tendencias', array(
            'labels' => array(
                'name' => _x('Tendências', 'post type general name'),
                'singular_name' => _x('Tendência', 'post type singular name'),
                'add_new' => _x('Novo', 'Tendência'),
                'add_new_item' => __('Novo Tendência'),
                'edit_item' => __('Editar Tendência'),
                'new_item' => __('Novo Tendência'),
                'view_item' => __('Ver Tendência'),
                'search_items' => __('Buscar Tendências'),
                'not_found' =>  __('Nada encontrado'),
                'not_found_in_trash' => __('Nada encontrado'),
                'parent_item_colon' => ''
            ),
            'exclude_from_search' => true, // the important line here!
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => -1,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
        ));                                     
    }     
       
    cpt();

	if ( ! function_exists( 'the_widgets_init' ) ) {
		function the_widgets_init() {
			if ( ! function_exists( 'register_sidebars' ) )
            return;
			register_sidebar(              
				array(
					'id'            => 'sidebar',
					'name'          => __( 'Sidebar' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="title-header"><h4 class="section-title"><strong>',
					'after_title'   => '</strong></h4></div>',
			));
		} // End the_widgets_init()
	}    

	function regScripts() {
		wp_deregister_script('jquery');
		wp_enqueue_script('vendors', get_template_directory_uri()."/assets/js/vendors.js",'','2.1', true);
		wp_enqueue_script('commons', get_template_directory_uri()."/assets/js/commons.js",'','2.1', true);
		wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css', array(), '3.2', 'all');
	}

    function remove_menus(){
        global $post;
        remove_menu_page( 'index.php' );                  //Dashboard
        remove_menu_page( 'jetpack' );                    //Jetpack*
        // remove_menu_page( 'edit.php' );                   //Posts
        // remove_menu_page( 'upload.php' );                 //Media
        // remove_menu_page( 'edit.php?post_type=page' );    //Pages
        // remove_menu_page( 'edit-comments.php' );          //Comments
        // remove_menu_page( 'themes.php' );                 //Appearance
        // remove_menu_page( 'plugins.php' );                //Plugins
        //   remove_menu_page( 'users.php' );                  //Users
        //   remove_menu_page( 'tools.php' );                  //Tools
        // remove_menu_page( 'options-general.php' );        //Settings
	}	
	
    function query_post_type($query) {
        if(is_category() || is_tag()) {
        $post_type = get_query_var('post_type');
        if($post_type)
        $post_type = $post_type;
        else
        $post_type = array('nav_menu_item','post','articles');
        $query->set('post_type',$post_type);
        return $query;
        }
	}
	
    function remove_customizer_settings( $wp_customize ){
        $wp_customize->remove_section('static_front_page');
	}
	
    function get_custom_field_data($key, $echo = false) {
		$value = get_post_meta($post->ID, $key, true);
		if($echo == false) {
		return $value;
		} else {
		echo $value;
		}
	}
	
    function hide_admin_bar() {
		wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');
		return false;
	}
	
    function menu() {
        register_nav_menus(
        array(
        // 'default' => __( 'Default' ),
        // 'copyright' => __( 'Copyright' )
        )
        );
	}	
	
    function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}	
	
	function df_terms_clauses($clauses, $taxonomy, $args) {
        if (!empty($args['post_type'])) {
        global $wpdb;
        $post_types = array();
        foreach($args['post_type'] as $cpt) {
        $post_types[] = "'".$cpt."'";
        }
        if(!empty($post_types)) {
        $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';
        $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';
        $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';
        $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];
        }
        }
        return $clauses;
	}
	
    function sanitize( $input, $setting ) {
        global $wp_customize;
    
        $control = $wp_customize->get_control( $setting->id );
    
        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
	}
	
    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
        $screen->remove_help_tabs();
        return $old_help;
	}

    function customizer( $wp_customize ) {
            $wp_customize->add_panel( 'customization', array(
                'priority'       => 2,
                'title'          => __('Customização')
            ));    
            // Header
            $wp_customize->add_section( 'header' , array(
            'title'       => __( 'Header' ),
            'panel' => 'customization',
            'priority'    => 1
            ));           
            $wp_customize->add_setting( 'logo' );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
            'label'    => __( 'Logo' ),
            'section'  => 'header',
            'settings' => 'logo'
            )));        
            // Social Networks
            $wp_customize->add_section( 'social_networks' , array(
            'title'       => __( 'Social Networks' ),
            'panel' => 'customization',
            'priority'    => 0
            ));    
            $wp_customize->add_setting( 'facebook' );
            $wp_customize->add_control('facebook',  array(
                'label' => 'Facebook',
                'section' => 'social_networks',
                'type' => 'url',
                'settings' => 'facebook'
            ));   
            $wp_customize->add_setting( 'twitter' );
            $wp_customize->add_control('twitter',  array(
                'label' => 'Twitter',
                'section' => 'social_networks',
                'type' => 'url',
                'settings' => 'twitter'
            ));      
            $wp_customize->add_setting( 'instagram' );
            $wp_customize->add_control('instagram',  array(
                'label' => 'Instagram',
                'section' => 'social_networks',
                'type' => 'url',
                'settings' => 'instagram'
            ));  
            $wp_customize->add_setting( 'linkedin' );
            $wp_customize->add_control('linkedin',  array(
                'label' => 'Linkedin',
                'section' => 'social_networks',
                'type' => 'url',
                'settings' => 'linkedin'
            ));                                     
    }	
	
	add_theme_support( 'post-thumbnails' );
	add_action( 'init', 'nopio_register_user_category_taxonomy' );
	add_action( 'init', 'menu' );
	add_action( 'init', 'the_widgets_init' );
	add_action( 'admin_menu', 'nopio_add_user_categories_admin_page' );
	add_action( 'admin_menu', 'remove_menus' );
	add_action( 'wp_enqueue_scripts', 'regScripts' );
	add_filter( 'show_admin_bar', 'hide_admin_bar' );
	add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
	add_action( 'customize_register', 'remove_customizer_settings', 20 );
	add_action( 'customize_register', 'customizer' );
	add_filter('screen_options_show_screen', '__return_false'); 	
	add_filter('terms_clauses', 'df_terms_clauses', 10, 3);
	add_filter('upload_mimes', 'cc_mime_types');
	add_filter('pre_get_posts', 'query_post_type');