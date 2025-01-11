<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\V1\FolderController;
use App\Http\Controllers\Api\V1\NoteController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
});


Route::group(['prefix' => 'v1' , 'middleware' => 'jwt-auth'] , function(){

    Route::group(['prefix' => 'folders'] ,function(){
        Route::post('store-folder' , [FolderController::class,'storeFolder'])->name('api.folders.store');
        Route::get('my-folders' , [FolderController::class,'myFolders'])->name('api.folders.my-folders');
    });

    Route::group(['prefix' => 'notes'] ,function(){
        Route::post('store-note' , [NoteController::class,'storeNote'])->name('api.notes.store');
        Route::get('my-notes' , [NoteController::class,'myNotes'])->name('api.notes.my-folders');
        Route::get('notes-for-all' , [NoteController::class,'notesForAll'])->name('api.notes.for-all');
    });

});