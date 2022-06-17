<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Post;
use App\Models\Settings;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Models\PostImage;

Route::get('login', [LoginController::class, 'create'])->name('login'); 
Route::post('login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth'); 

Route::get('/', [PostController::class, 'home'])->name('home');

Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/about', function() {
    return Inertia::render('About', [
        'about' => Settings::where('field', 'about')->first()->text
    ]);
});

//MIDDLEWARE

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', function () {
        return Inertia::render('Dashboard/Dashboard');
    });
    Route::get('/admin/posts', function () {
        return Inertia::render('Dashboard/Posts');
    });
    Route::get('/admin/settings', function () {
        return Inertia::render('Dashboard/Settings', [
            'quote' => Settings::where('field', 'quote')->first()->text,
            'about' => Settings::where('field', 'about')->first()->text] 
        );
    });
    Route::post('/settings/about', [SettingsController::class, 'setAbout']);
    Route::post('/settings/quote', [SettingsController::class, 'setQuote']);


    Route::get('/admin/createPost', function () {
        return Inertia::render('Dashboard/CreatePost');
    });

    
    Route::get('/posts/create', function () {
        return Inertia::render('Posts/Create');
    });
    Route::post('/posts', [PostController::class, 'store']);

    Route::post('/users', function () {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        User::create($attributes);

        return redirect('/users');
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    });
});
