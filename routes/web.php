<?php
use App\Http\Controllers\BlogController;

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    return view('about');
});

Route::get('/welcome', function(){
    return 'welcome';
});

Route::get('profile',[ProfileController::class,'index']);

Route::view('master', 'template/master');

Route::get('data-mahasiswa',[MahasiswaController::class, 'index']);
Route::get('add-mahasiswa',[MahasiswaController::class, 'create']);
Route::post('getDataM',[MahasiswaController::class, 'ambilData'])->name('mahasiswa.getDataM');
Route::get('data-blog',[BlogController::class, 'index']);
Route::get('add-blog',[BlogController::class, 'create']);
Route::post('getData',[BlogController::class, 'ambilData'])->name('blog.getData');
Route::delete('delete-mahasiswa/{id}',[MahasiswaController::class, 'destroy'])->name('delete.mahasiswa');
//edit data
Route::get('edit-mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('edit.mahasiswa');
//proses update
Route::put('edit-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('update.mahasiswa');

// tugas web 3 web route :
Route::get('data-blog',[BlogController::class, 'index']);
Route::get('add-blog',[BlogController::class, 'create']);
Route::post('save-blog',[BlogController::class, 'ambilData'])->name('blog.save-blog');
Route::delete('delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete.blog');
Route::get('edit-blog/{id}/edit', [BlogController::class, 'edit'])->name('edit.blog');
Route::put('edit-blog/{id}', [BlogController::class, 'update'])->name('update.blog');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
