<?php
/*
Plugin Name: Сохряняем картинки к себе
Description: При записи сохряняем картинки к себе если ссылки ведут в инет
Plugin URI: http://alexbro.esy.es
Author: AlexBro
Author URI: http://alexbro.esy.es
*/

add_action('admin_init', 'albr_setImgStetting');
add_filter('wp_insert_post_data', 'albr_beforePost', 20, 2);

function albr_beforePost($data, $postarr){
    if(!get_option('albr_setImgStetting')) return $data;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return $data;
    $content = $data['post_content'];
    if(!substr_count($content, '<img')) return $data;

    $urlsForRepl = findScr($content);
    if (count($urlsForRepl)){
        foreach ($urlsForRepl as $item){
            $repl = get_the_guid(loadImg($item));
            $content = str_replace($item, $repl, $content);
        }
    }
    $data['post_content'] = $content;

    return $data;
}

function loadImg($url){
    // во фронтэнде нужны эти файлы
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');


    $file_array = array();

    $tmp = download_url( $url );
// корректируем умя файла в строках запроса.
    $nameR = end(explode('.', end(explode('/',$url))));
    $file_array['name'] = rand(100000,999999).'.'.$nameR;
    $file_array['tmp_name'] = $tmp;

    $id = media_handle_sideload( $file_array, 0 );

// удалим временный файл
    @unlink( $file_array['tmp_name'] );

    return $id;
}

function findScr($content){
    $arrContent  = explode('<img', $content);
    unset($arrContent[0]);
    $allArr = array();

    foreach( $arrContent as $items ){
        $arr = explode(' ', $items);
        foreach($arr as $item){
            if( strpos($item,'src=') !== false && !strpos($item, $_SERVER['SERVER_NAME']))
                 $allArr[] = substr($item,6,-2);
        }
    }
    //var_dump($allArr);
    return array_unique($allArr);
}

function albr_setImgStetting(){
    register_setting('general', 'albr_setImgStetting');
    add_settings_field('albr_setImgStetting', 'Сохранять картинки к себе', 'albr_setImgStettingCD', 'general');
}
function albr_setImgStettingCD(){
    ?>
    <input type="checkbox" name="albr_setImgStetting" id="albr_setImgStetting"
           value="1" <?php checked( '1', get_option( 'albr_setImgStetting' ) ); ?>>
    <?php
}