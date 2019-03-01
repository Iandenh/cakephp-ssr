<?php

require dirname(__DIR__) . '/vendor/cakephp/cakephp/src/basics.php';
require dirname(__DIR__) . '/vendor/autoload.php';

define('ROOT', dirname(__DIR__));
define('APP_DIR', 'src');
define('APP', rtrim(sys_get_temp_dir(), DS) . DS . APP_DIR . DS);

if (!is_dir(APP)) {
    mkdir(APP, 0770, true);
}

define('TESTS', ROOT . DS . 'tests' . DS);
define('CONFIG', dirname(__FILE__) . DS . 'config' . DS);
define('TMP', ROOT . DS . 'tmp' . DS);

if (!is_dir(TMP)) {
    mkdir(TMP, 0770, true);
}

define('LOGS', TMP . 'logs' . DS);
define('CACHE', TMP . 'cache' . DS);
define('CAKE_CORE_INCLUDE_PATH', ROOT . '/vendor/cakephp/cakephp');
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);

Cake\Core\Configure::write('App', [
    'namespace' => 'TestApp'
]);

Cake\Core\Configure::write('Ssr', [
    'enabled' => true,
    'debug' => false,
    'engine' => \Spatie\Ssr\Engines\Node::class,
    'node' => [
        'node_path' => env('NODE_PATH', '/usr/bin/node'),
        'temp_path' => '/tmp/'
    ],
    'context' => [],
    'env' => [
        'NODE_ENV' => 'production',
        'VUE_ENV' => 'server',
    ],
]);

Cake\Core\Configure::write('debug', true);
