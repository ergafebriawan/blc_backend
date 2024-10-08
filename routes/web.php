<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
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
    return response()->json([
       'message' => 'Welcome to BLC Toelf API',
       'version' => '1.0',
       'author' => 'Fusionx Project'
    ]);
});

////API for admin
//admin
$router->group(
    ['prefix' => 'admin'],
    function ($router) {
        $router->get('/', 'AdminController@index');
        $router->get('/{id}', 'AdminController@detail');
        $router->post('/', 'AdminController@store');
        $router->put('/{id}', 'AdminController@update_password');
        $router->delete('/{id}', 'AdminController@delete');
    }
);

//soal
$router->group([
    'prefix' => 'soal'
], function ($router) {
    $router->post('/', 'SoalController@create');
    $router->get('/{jenis}', 'SoalController@get_soal');
    $router->get('/detail/{id}', 'SoalController@detail_soal');
    $router->put('/{id}', 'SoalController@update');
    $router->delete('/{id}', 'SoalController@delete');
    $router->post('/upload_audio/{id_soal}', 'MediaController@upload_audio');
});

//peserta
$router->group([
    'prefix' => 'peserta',
], function ($router) {
    $router->get('/', 'PesertaController@index');
    $router->post('/', 'PesertaController@create');
    $router->get('/{id}', 'PesertaController@detail');
    $router->put('/{id}', 'PesertaController@update');
    $router->delete('/{id}', 'PesertaController@delete');
    $router->post('/active/{id_peserta}', 'PesertaController@active_test');
    $router->post('/active/more/peserta', 'PesertaController@more_active');
    $router->get('/by-test/{id_test}', 'PesertaController@show_by_test');
    $router->get('/by-hasil/{id_test}', 'PesertaController@show_by_hasil');
    $router->post('/upload_photo/{id_peserta}', 'MediaController@upload_photo');
    $router->post('/upload/import_peserta', 'PesertaController@import_peserta');
    $router->get('/download/template_peserta', 'PesertaController@download_template');
    $router->get('/filter/{params}', 'PesertaController@filter');
    $router->get('/generate_kode/{id_peserta}/{id_test}', 'PesertaController@generate_kode');
    $router->delete('/test/{id}', 'HasilTestController@cancel');
    $router->get('/export/{id}/{from}/{to}', 'PesertaController@export_hasil');
});

//test
$router->group([
    'prefix' => 'test'
], function ($router) {
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

//option
$router->get('/role_peserta', 'OptionController@role_peserta');
$router->get('/jenis_kelas', 'OptionController@jenis_kelas');
$router->delete('/photo_profile/{id}', 'MediaController@delete_media');
$router->get('/media/{jenis_media}/{id_file}', 'MediaController@get_media');
$router->get('/jenis_soal', 'OptionController@jenis_soal');

//auth hasil peserta
$router->group([
    'prefix' => 'hasil'
], function ($router) {
    $router->get('/{id_peserta}/{id_soal}', 'HasilTestController@index');
});

////API for peserta
$router->group([
    'prefix' => 'user'
], function ($router) {
    $router->post('/login', 'UserTestController@login_peserta');
    $router->post('/logout', 'UserTestController@logout_peserta');
    $router->get('/result/{id}', 'UserTestController@hasil');
    $router->post('/profile/{token}', 'UserTestController@profile');
    $router->get('/soal/{jenis}', 'SoalController@get_soal');
    $router->get('/test', 'TestController@index');
    $router->post('/send_score/{id}', 'HasilTestController@hasil');
});
