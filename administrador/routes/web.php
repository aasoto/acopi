<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('plantilla');
});

Route::view('/', 'paginas.inicio');

/*==================================================
=            Rutas de módulo página web            =
==================================================*/

/*Route::view('/pagina_web/carrusel', 'paginas.pagina_web.carrusel');
Route::view('/pagina_web/entrevistas', 'paginas.pagina_web.entrevistas');
Route::view('/pagina_web/eventos', 'paginas.pagina_web.eventos');
Route::view('/pagina_web/footer', 'paginas.pagina_web.footer');
Route::view('/pagina_web/interesados', 'paginas.pagina_web.interesados');
Route::view('/pagina_web/noticias', 'paginas.pagina_web.noticias');
Route::view('/pagina_web/info/contacto', 'paginas.pagina_web.info.contacto');
Route::view('/pagina_web/info/estatutos', 'paginas.pagina_web.info.estatutos');
Route::view('/pagina_web/info/gremio', 'paginas.pagina_web.info.gremio');
Route::view('/pagina_web/info/productos', 'paginas.pagina_web.info.productos');
Route::view('/pagina_web/info/redes', 'paginas.pagina_web.info.redes');*/

/*=====  End of Rutas de módulo página web  ======*/


/*=================================================
=            Rutas de módulo afiliados            =
=================================================*/

/*Route::view('/afiliados/agregar', 'paginas.afiliados.agregar');
Route::view('/afiliados/consultar', 'paginas.afiliados.consultar');
Route::view('/afiliados/modificar', 'paginas.afiliados.modificar');
Route::view('/afiliados/eliminar', 'paginas.afiliados.eliminar');*/

/*=====  End of Rutas de módulo afiliados  ======*/


/*========================================
=            Rutas metodo GET            =
========================================*/

/*Route::get('/pagina_web/carrusel', 'PaginaWebController@traerCarrusel');
Route::get('/pagina_web/entrevistas', 'PaginaWebController@traerPaginaWeb');
Route::get('/pagina_web/noticias', 'NoticiasController@traerNoticias'); */

/*=====  End of Rutas metodo GET  ======*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*=================================================================
=            Rutas que incluyen todos los metodos HTML            =
=================================================================*/

Route::resource('/pagina_web/carrusel', 'PaginaWebController');
Route::resource('/pagina_web/entrevistas', 'PaginaWebController');
Route::resource('/pagina_web/noticias', 'CategoriasController');
Route::resource('/pagina_web/eventos', 'PaginaWebController');
Route::resource('/pagina_web/footer', 'PaginaWebController');
Route::resource('/paginas/pagina_web/interesados', 'PaginaWebController');
Route::resource('/pagina_web/info/contacto', 'PaginaWebController');
Route::resource('/pagina_web/info/estatutos', 'PaginaWebController');
Route::resource('/pagina_web/info/gremio', 'PaginaWebController');
Route::resource('/pagina_web/info/productos', 'PaginaWebController');
Route::resource('/pagina_web/info/redes', 'PaginaWebController');

/*=====  End of Rutas que incluyen todos los metodos HTML  ======*/
