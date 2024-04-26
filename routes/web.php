<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AuthController;
use FastRoute\Route;
use Laravel\Lumen\Routing\Router;

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

$router->get('/', function () use ($router) {
    return "BLC Toelf API";
});

////API for admin
//admin
$router->group(
    ['prefix' => 'admin'],
    function ($router){
        $router->get('/', 'AdminController@index');
        $router->get('/{id}', 'AdminController@detail');
    }
);

//soal
$router->group([
    'prefix' => 'soal'
],function($router){
    $router->post('/', 'SoalController@create');
    $router->get('/{jenis}', 'SoalController@get_soal');
    $router->get('/detail/{id}', 'SoalController@detail_soal');
    $router->put('/{id}', 'SoalController@update');
    $router->delete('/{id}', 'SoalController@delete');
});

//peserta
$router->group([
    'prefix' => 'peserta',
], function ($router){
    $router->get('/', 'PesertaController@index');
    $router->post('/', 'PesertaController@create');
    $router->get('/{id}', 'PesertaController@detail');
    $router->put('/{id}', 'PesertaController@update');
    $router->delete('/{id}', 'PesertaController@delete');
    $router->put('/active/{id_peserta}','PesertaController@active_test');
    $router->get('/by-test/{id_test}','PesertaController@show_by_test');
    $router->put('/upload_photo/{id_peserta}', 'PesertaController@upload_photo');
    $router->get('/filter/{params}','PesertaController@filter');
});

//test
$router->group([
    'prefix' => 'test'
], function ($router){
    $router->get('/', 'TestController@index');
    $router->get('/{id}', 'TestController@detail');
    $router->get('/update/{id}', 'TestController@update');
});

//auth admin
$router->group([
    'prefix' => 'auth'
], function ($router) { 
    $router->post('/login/admin', 'AuthController@login_admin');
    $router->post('/logout/admin', 'AuthController@logout_admin');
    $router->post('/refresh/admin', 'AuthController@refresh');
    $router->post('/profile/admin', 'AuthController@me');
});

//auth peserta

//option
$router->get('/role_peserta', 'OptionController@role_peserta');
$router->get('/jenis_kelas', 'OptionController@jenis_kelas');