<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'test_dnepr');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[bNB3+l=FUTv1SW=4hLt@I%c,RM~3gJPl+DDU{nh|ojwG7%EfV@)@9p{3vboQ9D]');
define('SECURE_AUTH_KEY',  'm$iA?u4ruP*>y>_((x:,USp1|}0.n*tX|%Nx0ZnnF|mlVQOp)33m3gAefi+b;-fv');
define('LOGGED_IN_KEY',    'jMv>Lz(cuJ!8x(8m#M+QfMqesQv9+`Gyvx~(l`_.)l4HfpnhH4M5S/~hJ~uw.8a[');
define('NONCE_KEY',        'y`} /}:wu+H|GJ^t:51K;-$1<}k;JrNY*#{ry*#uYQYlFo;$x(4VapA,`u^&2pz(');
define('AUTH_SALT',        '(*8JRu.90Hgkb=Usghbyr)2Id p5R].8j3M_P:?UDIXK;{2{6}Ro9WT:n[}PDEUR');
define('SECURE_AUTH_SALT', '`{,qa+4Lyc8jn}ec(I`~Ml+1dBB>u<iC2AYn#H{8+~BVu,k9P8B=3gp.ME/4g.Gc');
define('LOGGED_IN_SALT',   'EO+14Bt7#KAzfHapM-=M.Kyd)c{F+dGD_>MnGSD-Tf4w<;{(TzK>ER(8xR;%-NPu');
define('NONCE_SALT',       'q+{.XEyy)Y xhEVOuK(2WdDlbyPB$1:r,S%%`%-j/MS]a]9ru^eo-gfE#*d6-o1;');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
