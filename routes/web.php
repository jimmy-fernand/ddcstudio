<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategorieController;
use App\Http\Controllers\admin\PhotoController;
use App\Http\Controllers\PageController;

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


Route::get('/',[PageController::class, "index"])->name('site.index');
Route::get('/about',[PageController::class, "about"])->name('site.about');
Route::get('/service',[PageController::class, "service"])->name('site.service');
Route::get('/categorie',[PageController::class, "service"])->name('site.categorie');
Route::get('/project',[PageController::class, "project"])->name('site.project');
Route::get('/contact',[PageController::class, "contact"])->name('site.contact');
Route::post('/contact',[PageController::class, "sendMessage"])->name('site.send.message');
Route::get('/project/{id}',[PageController::class, "projectDetail"])->name('site.projectDetail');

Route::get('/login', [LoginController::class, "login"])->name('login');
Route::get('/register',[LoginController::class,'registerPost'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login',[LoginController::class,'loginPost'])->name('login.post');
Route::group(['prefix' => 'admins', 'middleware' => 'auth'], function () {
    Route::get('/', [LoginController::class, "welcome"])->name('admin.home');
    Route::get('/service',[ServiceController::class,'index'])->name('admin.service.index');
    Route::get('/service/create',[ServiceController::class,'create'])->name('admin.service.create');
    Route::post('/service/create',[ServiceController::class,'store'])->name('admin.service.store');
    Route::get('/service/show/{id}',[ServiceController::class,'show'])->name('admin.service.show');
    Route::patch('/service/show/{id}',[ServiceController::class,'update'])->name('admin.service.update');
    Route::delete('/service/delete/{id}',[ServiceController::class,'destroy'])->name('admin.service.delete'); 
    Route::get('/categorie',[CategorieController::class,'index'])->name('admin.categorie.index');
    Route::get('/categories/create',[CategorieController::class,'create'])->name('admin.categorie.create');
    Route::post('/categories/create',[CategorieController::class,'store'])->name('admin.categorie.store');
    Route::get('/categorie/show/{id}',[CategorieController::class,'show'])->name('admin.categorie.show');
    Route::patch('/categorie/show/{id}',[CategorieController::class,'update'])->name('admin.categorie.update');
    Route::delete('/categorie/delete/{id}',[CategorieController::class,'destroy'])->name('admin.categorie.delete'); 
    Route::get('/project',[ProjectController::class,'index'])->name('admin.project.index');
    Route::get('/project/create',[ProjectController::class,'create'])->name('admin.project.create');
    Route::post('/project/create',[ProjectController::class,'store'])->name('admin.project.post');
    Route::get('/project/show/{id}',[ProjectController::class,'show'])->name('admin.project.show');
    Route::patch('/project/show/{id}',[ProjectController::class,'update'])->name('admin.project.update');
    Route::delete('/project/delete/{id}',[ProjectController::class,'destroy'])->name('admin.project.delete');

    Route::delete('/project/{id}/photo/{photo_id}',[ProjectController::class,'deleteProjectPhoto'])->name('admin.project.deleteProjectPhoto');
    Route::post('/project/{id}/photo/store', [ProjectController::class, 'storeProjectPhoto'])->name('admin.project.storeProjectPhoto');
    
    Route::get('/photo',[PhotoController::class,'index'])->name('admin.photo.index');
    Route::get('/photo/create',[PhotoController::class,'create'])->name('admin.photo.create');
    Route::post('/photo/create',[PhotoController::class,'store'])->name('admin.photo.store');
    Route::get('/photo/show/{id}',[PhotoController::class,'show'])->name('admin.photo.show');
    Route::patch('/photo/show/{id}',[PhotoController::class,'update'])->name('admin.photo.update');
    Route::delete('/photo/delete/{id}',[PhotoController::class,'destroy'])->name('admin.photo.delete');

    

    Route::get("/user/index",[UserController::class,'index'])->name('admin.user.index');
    Route::get("/user/create",[UserController::class,'create'])->name('admin.user.create');
    Route::post("/user/create",[UserController::class,'store'])->name('admin.user.post');
    Route::get("/user/show/{id}",[UserController::class,'show'])->name('admin.user.show');
    Route::patch("/user/show/{id}",[UserController::class,'update'])->name('admin.user.update');
    Route::delete("/user/delete/{id}",[UserController::class,'destroy'])->name('admin.user.delete');
    Route::get("/message/index",[UserController::class,'allMessage'])->name('admin.message.index');
    Route::get("/user/profile",[UserController::class,'profilAdmin'])->name('admin.profil');
    Route::patch("/user/profile",[UserController::class,'updateProfilAdmin'])->name('admin.profil.update');
    Route::get("/user/change-password",[UserController::class,'changePassword'])->name('admin.change.password');
    Route::patch("/user/change-password",[UserController::class,'updatePassword'])->name('admin.change.password.update');
});
