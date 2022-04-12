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

//route untuk mahasiswa
Route::get('data-mahasiswa',[MahasiswaController::class, 'index']);
Route::get('add-mahasiswa',[MahasiswaController::class, 'create']);
Route::post('getDataM',[MahasiswaController::class, 'ambilData'])->name('mahasiswa.getDataM');

// tugas web 3 web route :
Route::get('data-blog',[BlogController::class, 'index']);
Route::get('add-blog',[BlogController::class, 'create']);
Route::post('getData',[BlogController::class, 'ambilData'])->name('blog.getData');
