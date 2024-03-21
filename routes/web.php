<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\OptionController;

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
$router->get('/admin', 'AdminController@index');
$router->get('/admin/{id}', 'AdminController@detail');

//soal
$router->get('/soal/{jenis}', 'SoalController@get_soal');
$router->post('/soal', 'SoalController@create');
$router->get('/soal/detail/{id}', 'SoalController@detail_soal');
$router->put('/soal/{id}', 'SoalController@update');
$router->delete('/soal/{id}', 'SoalController@delete');

//peserta
$router->get('/peserta', 'PesertaController@index');
$router->get('/peserta/{id}', 'PesertaController@detail');
$router->post('/peserta', 'PesertaController@create');
$router->put('/peserta/{id}', 'PesertaController@update');
$router->delete('/peserta/{id}', 'PesertaController@delete');
$router->put('/peserta/active/{id_peserta}','PesertaController@active_test');
$router->get('/peserta/by-test/{id_test}','PesertaController@show_by_test');
$router->put('/peserta/upload_photo/{id_peserta}', 'PesertaController@upload_photo');
$router->get('/peserta/filter/{params}','PesertaController@filter');

//test
$router->get('/test', 'TestController@index');
$router->get('/test/{id}', 'TestController@detail');
$router->get('/test/update/{id}', 'TestController@update');

//auth admin
$router->post('/login/admin', 'AuthController@login_admin');
$router->get('/logout/admin/{id_admin}', 'AuthController@logout_admin');

//auth peserta

//option
$router->get('/role_peserta', 'OptionController@role_peserta');
$router->get('/jenis_kelas', 'OptionController@jenis_kelas');