<?php
require __DIR__ . '/vendor/autoload.php';

use App\Lib\Config;
use App\Lib\Twig;
use App\Lib\Router;
use App\Controller\Catalogue;
use App\Controller\Admin;
use App\Controller\Comments;

/**
 * This is the root
 */


Twig::set(__DIR__ . Config::get('TWIG_TEMPLATE_FOLDER', ''));

/**
 * Http handler
 * / [GET]
 */
Router::get('/', function () {
    (new Catalogue())->index();
});

/**
 * Http handler
 * /catalogue [GET]
 */
Router::get('/catalogue', function () {
    (new Catalogue())->index();
});

 /**
 * Http handler
 * /admin [GET]
 */
 Router::get('/admin', function () {
     (new Admin())->index();
 });

 /**
 * Http handler
 * /approve_comment [POST]
 */
 Router::post('/approve_comment', function () {
     (new Comments())->approve();
 });

/**
 * Http handler
 * /submit_comment [POST]
 */
 Router::post('/submit_comment', function () {
     (new Comments())->submit();
 });
