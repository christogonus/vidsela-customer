<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->away("https://emailwritr.com");
});


Route::get('/{video}', function (\App\Models\Video $video) {

    if (! $video->isPublished()) {
        abort(404, "RESOURCE NOT FOUND");
    }

    // return $video;

    if($video->isWebinar()) {
        return view('webinar', [
            'video' => $video,
        ]);
    }

    if($video->isVSL()) {
        return view('vsl', [
            'video' => $video,
        ]);
    }

});
