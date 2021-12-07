<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;

// function to populate the Activities list
function ActivitiesRoutes() {
  try{
    // disk 'views' defined in filesystems.php
    $files = Storage::disk('views')->files('pages/activities');
  } catch (\Exception $exc) {
    echo "EXCEPTION THROWN: " . $exc;
  }

  $routes = [];

  // for each file in pages/activities...
  foreach ($files as $f) {
    $pathinf = pathinfo($f);

    // ==================
    //     GET TITLES

    // the raw html
    $html = file_get_contents('../resources/views/' . $f) . "<br>";

    // a new dom object
    $dom = new domDocument;

    // load the html into the dom object
    $dom->loadHTML($html);

    // discard white space
    $dom->preserveWhiteSpace = false;

    // get all h1 elements
    $heading = $dom->getElementsByTagName('h1');

    // decode the first h1 element
    $decoded = utf8_decode($heading->item(0)->nodeValue);

    // add this info to $routes
    $routes = array_add($routes, $pathinf['filename'], $decoded);
  }

  // todo: sort the array depending on 'wks_' workshop prefix?

  return $routes;
}

$router->get('/', function () use ($router) {
  $routes = ActivitiesRoutes();
  $navbar = view('navbar', ['page' => 'hjem'], ['routes' => $routes]);
  return view('mainview', ['navbar' => $navbar, 'page' => 'hjem']);
});

$router->get('aktiviteter/{subpage}', function($subpage) use ($router) {
  $routes = ActivitiesRoutes();
  $navbar = view('navbar', ['page' => 'aktiviteter'], ['routes' => $routes]);
  return view('mainview', ['navbar' => $navbar, 'page' => 'aktiviteter', 'subpage' => $subpage, 'act_title' => $routes[$subpage], 'act_content' => '<p>So much content</p>']);
});

$router->get('om_aktiviteter', function() use ($router) {
  $routes = ActivitiesRoutes();
  $navbar = view('navbar', ['page' => 'aktiviteter'], ['routes' => $routes]);
  return view('mainview', ['navbar' => $navbar, 'page' => 'om_aktiviteter']);
});

$router->get('praktisk', function() use ($router) {
  $routes = ActivitiesRoutes();
  $navbar = view('navbar', ['page' => 'praktisk'], ['routes' => $routes]);
  return view('mainview', ['navbar' => $navbar, 'page' => 'praktisk']);
});

$router->get('tilmeld', function() use ($router) {
  $routes = ActivitiesRoutes();
  $navbar = view('navbar', ['page' => 'tilmeld'], ['routes' => $routes]);
  return view('mainview', ['navbar' => $navbar, 'page' => 'tilmeld']);
});

$router->get('tilmeld_udfyld', function() use ($router) {
    $routes = ActivitiesRoutes();
    $navbar = view('navbar', ['page' => 'tilmeld_udfyld'], ['routes' => $routes]);
    return view('mainview', ['navbar' => $navbar, 'page' => 'tilmeld_udfyld']);
});

$router->get('betaling', function() use ($router) {
  $routes = ActivitiesRoutes();
  $navbar = view('navbar', ['page' => 'betaling'], ['routes' => $routes]);
  return view('mainview', ['navbar' => $navbar, 'page' => 'betaling']);
});

$router->get('om_con2', function() use ($router) {
    $routes = ActivitiesRoutes();
    $navbar = view('navbar', ['page' => 'om_con2'], ['routes' => $routes]);
    return view('mainview', ['navbar' => $navbar, 'page' => 'om_con2']);
});



$router->get('routingtest', function () use ($router) {
    return 'routing provided this text';
});

$router->get('cwdtest', function () use ($router) {
    echo getcwd();
});
