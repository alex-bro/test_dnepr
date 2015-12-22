<?php

add_action('wp_enqueue_scripts', 'load_style_script'); //подключение скриптов и стилей
add_action('after_setup_theme','nav_menus_theme');
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
add_action( 'admin_post_nopriv_contact_form', 'albr_contact_form' );
add_action( 'admin_post_contact_form', 'albr_contact_form' );


add_theme_support('post-thumbnails');
set_post_thumbnail_size(180,180);

register_sidebar(array(
    'name' => 'Видео на главной',
    'id' => 'video_youtube',
    'before_widget' => '',
    'after_widget' => ''));

function load_style_script(){
    wp_enqueue_script('jquery_my', get_template_directory_uri() . '/js/jquery-1.11.3.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('media', get_template_directory_uri() . '/css/media.css');
    wp_enqueue_style('style_my', get_template_directory_uri() . '/css/main.css');
}

function nav_menus_theme(){
    register_nav_menus( array(
        'header_menu' => 'Меню в шапке',
        'footer_menu' => 'Меню в подвале'
    ) );
}


function my_wp_nav_menu_args( $args = '' ){
    $args['container'] = false;
    return $args;
}

function get_html_by_slug($page_slug) {
    global $wpdb;
    $str = $wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE post_name = '$page_slug'");
    if ($str) {
        return $str;
    } else {
        return null;
    }
}
function get_id_by_slug($page_slug) {
    global $wpdb;
    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$page_slug'");
    if ($id) {
        return $id;
    } else {
        return null;
    }
}

function get_all_meta($nameT = true){
    $meta[]='ALL';
    $query = new WP_Query( array( 'category_name' => 'portfolio') );
    while ( $query->have_posts() ) {
        $query->the_post();
        $posttags = get_the_tags();
        if ($posttags) {
            foreach($posttags as $tag) {
                if ($nameT)$meta[] = $tag->name;
                else $meta[] = $tag->slug;
            }
        }
    }
    return array_unique($meta);
}

function get_all_meta_html(){
    $meta = get_all_meta(false);
    $html ='';
    foreach($meta as $item){
        $html .='<li><a href="/portfolio/'.$item.'">'.$item.'</a></li>';
    }
    return $html;
}

function get_portfolio_html(){
    $args = array(
        'numberposts'     => 8, // тоже самое что posts_per_page
        'offset'          => 0,
        'category_name'        => 'portfolio',
    );
    $arr = explode('/', $_SERVER['REQUEST_URI']);
    if(isset($arr[1]) && isset($arr[2]) && $arr[1] === 'portfolio'){
        $meta = get_all_meta(false);
        if(array_search ($arr[2], $meta) !== false && $arr[2] !== 'ALL') $args['tag'] = $arr[2];
    }

    $posts = get_posts( $args );
    $html = '';
    foreach($posts as $post){
        setup_postdata($post);
        $html .= '<div class="portfolio-box ">';
        $html .= '<a href="'.get_the_permalink($post->ID).'">';
        $html .= get_the_post_thumbnail($post->ID);
        $html .= '<span>+</span></div></a>';
    }
    wp_reset_postdata();
    return $html;
}

//отправка уведомлений
function albr_contact_form(){
    extract($_POST);
    $call_name = esc_attr($inputName);
    $call_email = esc_attr($inputEmail);
    $call_area = esc_attr($area);

    if($call_email && $call_name && $call_area){
        $text_admin = "Сообщение контактной формы от {$call_name}, вам сообщили $call_area";
        $text_back = "Сообщение контактной формы. Здравствуйте {$call_name}. Вы сообщили на сайт <strong>". get_bloginfo('name'). '</strong> ' .
            '<a href="'. get_bloginfo('url').'"> '.get_bloginfo('url').'</a>' .  ' сообщение '.$call_area;

        wp_mail(get_bloginfo('admin_email'), 'Сообщение', $text_admin, 'content-type: text/html');
        wp_mail($call_email, 'Сообщение', $text_back,'content-type: text/html');
    }

    $ref = $_SERVER['HTTP_REFERER'];
    header ("Location: $ref");
    die();
}


