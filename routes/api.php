<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Models\Scategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*route::get("/categories",[CategorieController::class,"index"]);
route::post("/categories",[CategorieController::class,"store"]);
route::post("/categories/{id}",[CategorieController::class,"show"]);
route::delete("/categories/{id}",[CategorieController::class,"destroy"]);
route::put("/categories/{id}",[CategorieController::class,"update"]);*/

Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    });
    
Route::middleware('api')->group(function () {
    Route::resource('Scategories', ScategorieController::class);
});
Route::get('/scat/{idcat}', [ScategorieController::class,'showSCategorieByCAT']);

Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class);
    });
 Route::get('/listarticles/{idscat}', [ArticleController::class,'showArticlesBySCAT']);