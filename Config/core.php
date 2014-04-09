<?php

	Configure::write('debug', 2);

/**
 * Configure the Error handler used to handle errors for your application. By default
 * ErrorHandler::handleError() is used. It will display errors using Debugger, when debug > 0
 * and log errors with CakeLog when debug = 0.
 *
 * Options:
 *
 * - `handler` - callback - The callback to handle errors. You can set this to any callable type,
 *   including anonymous functions.
 *   Make sure you add App::uses('MyHandler', 'Error'); when using a custom handler class
 * - `level` - integer - The level of errors you are interested in capturing.
 * - `trace` - boolean - Include stack traces for errors in log files.
 *
 * @see ErrorHandler for more information on error handling and configuration.
 */
	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));

/**
 * Configure the Exception handler used for uncaught exceptions. By default,
 * ErrorHandler::handleException() is used. It will display a HTML page for the exception, and
 * while debug > 0, framework errors like Missing Controller will be displayed. When debug = 0,
 * framework errors will be coerced into generic HTTP errors.
 *
 * Options:
 *
 * - `handler` - callback - The callback to handle exceptions. You can set this to any callback type,
 *   including anonymous functions.
 *   Make sure you add App::uses('MyHandler', 'Error'); when using a custom handler class
 * - `renderer` - string - The class responsible for rendering uncaught exceptions. If you choose a custom class you
 *   should place the file for that class in app/Lib/Error. This class needs to implement a render method.
 * - `log` - boolean - Should Exceptions be logged?
 * - `skipLog` - array - list of exceptions to skip for logging. Exceptions that
 *   extend one of the listed exceptions will also be skipped for logging.
 *   Example: `'skipLog' => array('NotFoundException', 'UnauthorizedException')`
 *
 * @see ErrorHandler for more information on exception handling and configuration.
 */
	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));

/**
 * Application wide charset encoding
 */
	Configure::write('App.encoding', 'UTF-8');

/**
 * To configure CakePHP *not* to use mod_rewrite and to
 * use CakePHP pretty URLs, remove these .htaccess
 * files:
 *
 * /.htaccess
 * /app/.htaccess
 * /app/webroot/.htaccess
 *
 * And uncomment the App.baseUrl below. But keep in mind
 * that plugin assets such as images, CSS and JavaScript files
 * will not work without URL rewriting!
 * To work around this issue you should either symlink or copy
 * the plugin assets into you app's webroot directory. This is
 * recommended even when you are using mod_rewrite. Handling static
 * assets through the Dispatcher is incredibly inefficient and
 * included primarily as a development convenience - and
 * thus not recommended for production applications.
 */
	//Configure::write('App.baseUrl', env('SCRIPT_NAME'));

/**
 * To configure CakePHP to use a particular domain URL
 * for any URL generation inside the application, set the following
 * configuration variable to the http(s) address to your domain. This
 * will override the automatic detection of full base URL and can be
 * useful when generating links from the CLI (e.g. sending emails)
 */
	//Configure::write('App.fullBaseUrl', 'http://example.com');

/**
 * Web path to the public images directory under webroot.
 * If not set defaults to 'img/'
 */
	//Configure::write('App.imageBaseUrl', 'img/');

/**
 * Web path to the CSS files directory under webroot.
 * If not set defaults to 'css/'
 */
	//Configure::write('App.cssBaseUrl', 'css/');

/**
 * Web path to the js files directory under webroot.
 * If not set defaults to 'js/'
 */
	//Configure::write('App.jsBaseUrl', 'js/');

/**
 * Uncomment the define below to use CakePHP prefix routes.
 *
 * The value of the define determines the names of the routes
 * and their associated controller actions:
 *
 * Set to an array of prefixes you want to use in your application. Use for
 * admin or other prefixed routes.
 *
 * 	Routing.prefixes = array('admin', 'manager');
 *
 * Enables:
 *	`admin_index()` and `/admin/controller/index`
 *	`manager_index()` and `/manager/controller/index`
 *
 */
	//Configure::write('Routing.prefixes', array('admin'));

/**
 * Turn off all caching application-wide.
 *
 */
	//Configure::write('Cache.disable', true);

/**
 * Enable cache checking.
 *
 * If set to true, for view caching you must still use the controller
 * public $cacheAction inside your controllers to define caching settings.
 * You can either set it controller-wide by setting public $cacheAction = true,
 * or in each action using $this->cacheAction = true.
 *
 */
	//Configure::write('Cache.check', true);

/**
 * Enable cache view prefixes.
 *
 * If set it will be prepended to the cache name for view file caching. This is
 * helpful if you deploy the same application via multiple subdomains and languages,
 * for instance. Each version can then have its own view cache namespace.
 * Note: The final cache file name will then be `prefix_cachefilename`.
 */
	//Configure::write('Cache.viewPrefix', 'prefix');

/**
 * Session configuration.
 *
 * Contains an array of settings to use for session configuration. The defaults key is
 * used to define a default preset to use for sessions, any settings declared here will override
 * the settings of the default config.
 *
 * ## Options
 *
 * - `Session.cookie` - The name of the cookie to use. Defaults to 'CAKEPHP'
 * - `Session.timeout` - The number of minutes you want sessions to live for. This timeout is handled by CakePHP
 * - `Session.cookieTimeout` - The number of minutes you want session cookies to live for.
 * - `Session.checkAgent` - Do you want the user agent to be checked when starting sessions? You might want to set the
 *    value to false, when dealing with older versions of IE, Chrome Frame or certain web-browsing devices and AJAX
 * - `Session.defaults` - The default configuration set to use as a basis for your session.
 *    There are four builtins: php, cake, cache, database.
 * - `Session.handler` - Can be used to enable a custom session handler. Expects an array of callables,
 *    that can be used with `session_save_handler`. Using this option will automatically add `session.save_handler`
 *    to the ini array.
 * - `Session.autoRegenerate` - Enabling this setting, turns on automatic renewal of sessions, and
 *    sessionids that change frequently. See CakeSession::$requestCountdown.
 * - `Session.ini` - An associative array of additional ini values to set.
 *
 * The built in defaults are:
 *
 * - 'php' - Uses settings defined in your php.ini.
 * - 'cake' - Saves session files in CakePHP's /tmp directory.
 * - 'database' - Uses CakePHP's database sessions.
 * - 'cache' - Use the Cache class to save sessions.
 *
 * To define a custom session handler, save it at /app/Model/Datasource/Session/<name>.php.
 * Make sure the class implements `CakeSessionHandlerInterface` and set Session.handler to <name>
 *
 * To use database sessions, run the app/Config/Schema/sessions.php schema using
 * the cake shell command: cake schema create Sessions
 *
 */
	Configure::write('Session', array(
		'defaults' => 'php'
	));

/**
 * A random string used in security hashing methods.
 */
	Configure::write('Security.salt', 'sdjfref93hf4qo4ifalksdnfirj3498j3q4klaf');

/**
 * A random numeric string (digits only) used to encrypt/decrypt strings.
 */
	Configure::write('Security.cipherSeed', '434957497524753257325');

/**
 * Apply timestamps with the last modified time to static assets (js, css, images).
 * Will append a query string parameter containing the time the file was modified. This is
 * useful for invalidating browser caches.
 *
 * Set to `true` to apply timestamps when debug > 0. Set to 'force' to always enable
 * timestamping regardless of debug value.
 */
	//Configure::write('Asset.timestamp', true);

/**
 * Compress CSS output by removing comments, whitespace, repeating tags, etc.
 * This requires a/var/cache directory to be writable by the web server for caching.
 * and /vendors/csspp/csspp.php
 *
 * To use, prefix the CSS link URL with '/ccss/' instead of '/css/' or use HtmlHelper::css().
 */
	//Configure::write('Asset.filter.css', 'css.php');

/**
 * Plug in your own custom JavaScript compressor by dropping a script in your webroot to handle the
 * output, and setting the config below to the name of the script.
 *
 * To use, prefix your JavaScript link URLs with '/cjs/' instead of '/js/' or use JsHelper::link().
 */
	//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

/**
 * The class name and database used in CakePHP's
 * access control lists.
 */
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

/**
 * Uncomment this line and correct your server timezone to fix
 * any date & time related errors.
 */
	//date_default_timezone_set('UTC');

/**
 * `Config.timezone` is available in which you can set users' timezone string.
 * If a method of CakeTime class is called with $timezone parameter as null and `Config.timezone` is set,
 * then the value of `Config.timezone` will be used. This feature allows you to set users' timezone just
 * once instead of passing it each time in function calls.
 */
	//Configure::write('Config.timezone', 'Europe/Paris')

/**
 *
 * Cache Engine Configuration
 * Default settings provided below
 *
 * File storage engine.
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'File', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'path' => CACHE, //[optional] use system tmp directory - remember to use absolute path
 * 		'prefix' => 'cake_', //[optional]  prefix every cache file with this string
 * 		'lock' => false, //[optional]  use file locking
 * 		'serialize' => true, //[optional]
 * 		'mask' => 0664, //[optional]
 *	));
 *
 * APC (http://pecl.php.net/package/APC)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Apc', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 *
 * Xcache (http://xcache.lighttpd.net/)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Xcache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional] prefix every cache file with this string
 *		'user' => 'user', //user from xcache.admin.user settings
 *		'password' => 'password', //plaintext password (xcache.admin.pass)
 *	));
 *
 * Memcache (http://www.danga.com/memcached/)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Memcache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 * 		'servers' => array(
 * 			'127.0.0.1:11211' // localhost, default port 11211
 * 		), //[optional]
 * 		'persistent' => true, // [optional] set this to false for non-persistent connections
 * 		'compress' => false, // [optional] compress data in Memcache (slower, but uses less memory)
 *	));
 *
 *  Wincache (http://php.net/wincache)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Wincache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 */

/**
 * Configure the cache handlers that CakePHP will use for internal
 * metadata like class maps, and model schema.
 *
 * By default File is used, but for improved performance you should use APC.
 *
 * Note: 'default' and other application caches should be configured in app/Config/bootstrap.php.
 *       Please check the comments in bootstrap.php for more info on the cache engines available
 *       and their settings.
 */
$engine = 'File';

// In development mode, caches should expire quickly.
$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}

// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.
$prefix = 'myapp_';

/**
 * Configure the cache used for general framework caching. Path information,
 * object listings, and translation cache files are stored with this configuration.
 */
Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));

/**
 * Configure the cache for model and datasource caches. This cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));
Configure::write('dissertation_url','http://localhost/');

Configure::write('process_zones_translations', array(
	'project-intent' => 'Proje Oneri Formu',
	'project-approval' => 'Proje Onay Formu',
	'first-report' => 'Birinci Ara Rapor',
	'second-report' => 'Ikinci Ara Rapor',
	'waiting-second-reader' => '2. Okuyucu Belirlenmesi',
	'submit-advisor-report' => 'Danisman Teslim Onayi',
	'submit-sreader-report' => 'Ikinci Okuyucu Teslim Onayi',
	'submitted' => 'Teslim Tamamlandi',
));

Configure::write('allfields',array(
	'advisor_id' => array(
		'trans' => 'Danisman', 
		'relateddata' => 'advisors' 
	), 
	'sreader_id' => array(
		'trans' => '2. Okuyucu',
		'relateddata' => 'advisors' 
	), 
	'project_header' => array(
		'trans' => 'Proje Basligi' 
	), 
	'project_header_comment' => array(
		'trans' => 'Danışman Proje Başlığı Yorumu' ,
		'ckeditor' => true
	), 
	'project_intent' => array(
		'trans' => 'Proje Onerisi', 
		'ckeditor' => true,
	), 
	'project_header_perm' => array(
		'trans' => 'Proje Basligi' 
	), 
	'project_tags' => array(
		'trans' => 'Proje Etiketleri' 
	), 
	'first_report' => array(
		'trans' => '1. Ara Rapor', 
		'file' => true
	), 
	'first_report_comment' => array(
		'ckeditor' => true,
		'trans' => 'Danışman 1. Ara Rapor Yorumu' 
	), 
	'second_report' => array(
		'trans' => '2. Ara Rapor', 
		'file' => true
	), 
	'second_report_comment' => array(
		'ckeditor' => true,
		'trans' => 'Danışman 2. Ara Rapor Yorumu' 
	), 
	'submit_advisor_report' => array(
		'trans' => 'Proje Teslim Danisman Raporu', 
		'file' => true
	), 
	'submit_advisor_report_comment' => array(
		'ckeditor' => true,
		'trans' => 'Proje Teslim Danisman Rapor Yorumu', 
	), 
	'submit_sreader_report' => array(
		'trans' => 'Proje Teslim Ikinci Okuyucu Raporu', 
		'file' => true
	), 
	'submit_sreader_report_comment' => array(
		'ckeditor' => true,
		'trans' => 'Proje Teslim Ikinci Okuyucu Rapor Yorumu', 
	), 
));



Configure::write('process_actions',array(
	'project-intent' => array(
		'save' => array(
			'next-step'=>'project-intent',
			'next-zone'=>'project-intent',
			'trans' => 'Kaydet',
			'notify' => array()
		),
		'send' => array(
			'next-step'=>'project-intent-waiting-app',
			'next-zone'=>'project-intent',
			#TODO say in turkish
			'trans' => 'Danismana Gonder',
			'notify' => array(
				'advisor_id' => array(
					'message'=> "Öğrencilerden biri onaylamanız için size Proje Öneri Formu yolladı",
					'url' => 'processes/imanage',
					'includeId' => true
				)
			)
		)
	),
	'project-intent-waiting-app' => array(
		'deny' => array(
			'next-step'=>'project-intent',
			'next-zone'=>'project-intent',
			'trans' => 'Reddet',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman Proje Öneri Formunuzu Reddetti",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
		'approve' => array(
			'next-step'=>'project-approval',
			'next-zone'=>'project-approval',
			#TODO say in turkish
			'trans' => 'Onayla',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman Proje Öneri Formunuzu Onayladı",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
	),
	'project-approval' => array(
		'save' => array(
			'next-step'=>'project-approval',
			'next-zone'=>'project-approval',
			'trans' => 'Kaydet'
		),
		'send' => array(
			'next-step'=>'project-approval-waiting-app',
			'next-zone'=>'project-approval',
			#TODO say in turkish
			'trans' => 'Danismana Gonder',
			'notify' => array(
				'advisor_id' => array(
					'message'=> "Öğrencilerden biri onaylamanız için size Proje Onay Formu yolladı",
					'url' => 'processes/imanage',
					'includeId' => true
				)
			)
		)
	),
	'project-approval-waiting-app' => array(
		'deny' => array(
			'next-step'=>'project-approval',
			'next-zone'=>'project-approval',
			'trans' => 'Reddet',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman Proje Onay Formunuzu Reddetti",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
		'approve' => array(
			'next-step'=>'first-report',
			'next-zone'=>'first-report',
			#TODO say in turkish
			'trans' => 'Onayla',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman Proje Onay Formunuzu Onayladı",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		)
	),
	'first-report' => array(
		'save' => array(
			'next-step'=>'first-report',
			'next-zone'=>'first-report',
			'trans' => 'Kaydet',
		),
		'send' => array(
			'next-step'=>'first-report-waiting-app',
			'next-zone'=>'first-report',
			#TODO say in turkish
			'trans' => 'Danismana Gonder',
			'notify' => array(
				'advisor_id' => array(
					'message'=> "Öğrencilerden biri onaylamanız için size 1. Ara Rapor Yolladı yolladı",
					'url' => 'processes/imanage',
					'includeId' => true
				)
			)
		)
	),
	'first-report-waiting-app' => array(
		'deny' => array(
			'next-step'=>'first-report',
			'next-zone'=>'first-report',
			'trans' => 'Reddet',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman 1. Ara Raporunuzu Reddetti",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
		'approve' => array(
			'next-step'=>'second-report',
			'next-zone'=>'second-report',
			#TODO say in turkish
			'trans' => 'Onayla',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman 1. Ara Raporunuzu Onayladı",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		)
	),
	'second-report' => array(
		'save' => array(
			'next-step'=>'second-report',
			'next-zone'=>'second-report',
			'trans' => 'Kaydet',
		),
		'send' => array(
			'next-step'=>'second-report-waiting-app',
			'next-zone'=>'second-report',
			#TODO say in turkish
			'trans' => 'Danismana Gonder',
			'notify' => array(
				'advisor_id' => array(
					'message'=> "Öğrencilerinizden biri onaylamanız için size 2. Ara Rapor Yolladı yolladı",
					'url' => 'processes/imanage',
					'includeId' => true
				)
			)
		)
	),
	'second-report-waiting-app' => array(
		'deny' => array(
			'next-step'=>'second-report',
			'next-zone'=>'second-report',
			'trans' => 'Reddet',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman 2. Ara Raporunuzu Reddetti",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
		'approve' => array(
			'next-step'=>'waiting-second-reader',
			'next-zone'=>'waiting-second-reader',
			#TODO say in turkish
			'trans' => 'Onayla',
			'notify' => array(
				'student_id' => array(
					'message'=> "Seçtiğiniz Danışman 2. Ara Raporunuzu Onayladı",
					'url' => 'processes/manage',
					'includeId' => false
				),
				'pia_id' => array(
					'message'=> "2.Okuyucu belirlemeniz gerekiyor.",
					'url' => 'processes/pmanage',
					'includeId' => true
				)
			)
		)
	),
	'waiting-second-reader' => array(
		'set_sreader' => array(
			'next-step'=>'submit-advisor-report',
			'next-zone'=>'submit-advisor-report',
			'trans' => '2. Okuyucu Ata',
			'notify' => array(
				'student_id' => array(
					'message'=> "Proje Idari Asistani projeniz icin 2. okuyucu belirledi.",
					'url' => 'processes/manage',
					'includeId' => false
				),
				'sreader_id' => array(
					'message'=> "Proje Idari Asistanini belirtilen proje icin , sizi 2. okuyucu olarak atadi.",
					'url' => 'processes/srmanage',
					'includeId' => true
				),
				'advisor_id' => array(
					'message'=> "Proje Idari Asistanini danismani oldugunuz proje icin 2. okuyucu belirledi.",
					'url' => 'processes/imanage',
					'includeId' => true
				),
			)
		),
	),
	'submit-advisor-report' => array(
		'save' => array(
			'next-step'=>'submit-advisor-report',
			'next-zone'=>'submit-advisor-report',
			'trans' => 'Kaydet',
		),
		'send' => array(
			'next-step'=>'submit-advisor-report-waiting-app',
			'next-zone'=>'submit-advisor-report',
			#TODO say in turkish
			'trans' => 'Danismana Gonder',
			'notify' => array(
				'advisor_id' => array(
					'message'=> "Öğrencilerden biri size, proje teslimi danisman formu yolladı",
					'url' => 'processes/imanage',
					'includeId' => true
				)
			)
		)
	),
	'submit-advisor-report-waiting-app' => array(
		'deny' => array(
			'next-step'=>'submit-advisor-report',
			'next-zone'=>'submit-advisor-report',
			'trans' => 'Reddet',
			'notify' => array(
				'student_id' => array(
					'message'=> "Projeniz danismaniniz tarafindan, proje teslim danisman onay formunuzu reddetti",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
		'approve' => array(
			'next-step'=>'submit-sreader-report',
			'next-zone'=>'submit-sreader-report',
			#TODO say in turkish
			'trans' => 'Onayla',
			'notify' => array(
				'student_id' => array(
					'message'=> "Danismaniniz, proje teslim danisman onay formunuzu onayladi.",
					'url' => 'processes/manage',
					'includeId' => false
				),
			)
		)
	),
	'submit-sreader-report' => array(
		'save' => array(
			'next-step'=>'submit-sreader-report',
			'next-zone'=>'submit-sreader-report',
			'trans' => 'Kaydet',
		),
		'send' => array(
			'next-step'=>'submit-sreader-report-waiting-app',
			'next-zone'=>'submit-sreader-report',
			#TODO say in turkish
			'trans' => '2. Okuyucuya Gonder',
			'notify' => array(
				'sreader_id' => array(
					'message'=> "Öğrencilerden biri size, proje teslimi ikinci okuyucu formu yolladı",
					'url' => 'processes/srmanage',
					'includeId' => true
				)
			)
		)
	),
	'submit-sreader-report-waiting-app' => array(
		'deny' => array(
			'next-step'=>'submit-sreader-report',
			'next-zone'=>'submit-sreader-report',
			'trans' => 'Reddet',
			'notify' => array(
				'student_id' => array(
					'message'=> "2. Okuyucu , proje teslim ikinci okuyucu formunuzu reddetti",
					'url' => 'processes/manage',
					'includeId' => false
				)
			)
		),
		'approve' => array(
			'next-step'=>'submitted',
			'next-zone'=>'submitted',
			#TODO say in turkish
			'trans' => 'Onayla',
			'notify' => array(
				'student_id' => array(
					'message'=> "2. Okuyucu , proje teslim ikinci okuyucu formunuzu onayladi",
					'url' => 'processes/manage',
					'includeId' => false
				),
				'advisor_id' => array(
					'message'=> "Danisman oldugunuz proje tamamlandi",
					'url' => 'processes/imanage',
					'includeId' => true
				),
				'pia_id' => array(
					'message'=> "Tamamlanan proje var.",
					'url' => 'processes/pmanage',
					'includeId' => true
				),
			)
		)
	),
	'submitted' => array(
	)
));



Configure::write('process_road', array(
	'project-intent' => array(
		'owner'=>'student',
		'fields' => array(
			'advisor_id',
			'project_header',
			'project_intent',
			'project_header_comment',
		),
		'restrictedFields' => array(
			'project_header_comment'
		),
		'zone' => 'project-intent'
	),
	'project-intent-waiting-app' => array(
		'owner'=>'instructor',
		'fields' => array(
			'project_header',
			'project_intent',
			'project_header_comment',
		),
		'restrictedFields' => array(
			'project_header',
			'project_intent'
		),
		'zone' => 'project-intent'
	),
	'project-approval' => array(
		'owner'=>'student',
		'fields' => array(
			'project_header_perm',
		), 
		'restrictedFields' => array(),
		'zone' => 'project-approval'
	),
	'project-approval-waiting-app' => array(
		'owner'=>'instructor',
		'fields' => array(
			'project_header_perm',
		),
		'restrictedFields' => array('project_header_perm'),
		'zone' => 'project-approval'
	),
	'first-report' => array(
		'owner'=>'student',
		'fields' => array(
			'first_report',
			'first_report_comment',
		),
		'restrictedFields' => array(
			'first_report_comment',
		),
		'zone' => 'first-report'
	),
	'first-report-waiting-app' => array(
		'owner'=>'instructor',
		'fields' => array(
			'first_report',
			'first_report_comment',
		),
		'restrictedFields' => array(
			'first_report',
		),
		'zone' => 'first-report'
	),
	'second-report' => array(
		'owner'=>'student',
		'fields' => array(
			'second_report',
			'second_report_comment',
		),
		'restrictedFields' => array(
			'second_report_comment',
		),
		'zone' => 'second-report'
	),
	'second-report-waiting-app' => array(
		'owner'=>'instructor',
		'fields' => array(
			'second_report',
			'second_report_comment',
		),
		'restrictedFields' => array(
			'second_report',
		),
		'zone' => 'second-report'
	),
	'waiting-second-reader' => array(
		'owner'=>'pia',
		'fields' => array(
			'sreader_id'
		),
		'restrictedFields' => array(
		),
		'zone' => 'waiting-second-reader'
	),
	'submit-advisor-report' => array(
		'owner'=>'student',
		'fields' => array(
			'submit_advisor_report',
			'submit_advisor_report_comment'
		),
		'restrictedFields' => array(
			'submit_advisor_report_comment'
		),
		'zone' => 'submit-advisor-report'
	),
	'submit-advisor-report-waiting-app' => array(
		'owner'=>'instructor',
		'fields' => array(
			'submit_advisor_report',
			'submit_advisor_report_comment',
		),
		'restrictedFields' => array(
			'submit_advisor_report',
		),
		'zone' => 'submit-advisor-report'
	),
	'submit-sreader-report' => array(
		'owner'=>'student',
		'fields' => array(
			'submit_sreader_report',
			'submit_sreader_report_comment'
		),
		'restrictedFields' => array(
			'submit_sreader_report_comment'
		),
		'zone' => 'submit-sreader-report'
	),
	'submit-sreader-report-waiting-app' => array(
		'owner'=>'sreader',
		'fields' => array(
			'submit_sreader_report',
			'submit_sreader_report_comment',
		),
		'restrictedFields' => array(
			'submit_sreader_report',
		),
		'zone' => 'submit-sreader-report'
	),
	'submitted' => array(
		'owner' => 'pia',
		'fields' => array(
		),
		'restrictedFields' => array(
		),
		'zone' => 'submitted'
	)
));
