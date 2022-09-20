<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Api\PublicationController;
use App\Http\Controllers\Auth\SO2\AuthS2Controller;
use App\Http\Controllers\Auth\SO1\AuthS1Controller;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CommentLikeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\BdController;
use App\Http\Controllers\Api\Search\SearchAudioBookController;
use App\Http\Controllers\Api\Search\SearchBdController;
use App\Http\Controllers\Api\Search\SearchOeuvreLitteraireController;
use App\Http\Controllers\Api\Search\SearchPublicationController;
use App\Http\Controllers\Api\OeuvreLitteraireController;
use App\Http\Controllers\Api\AudioBookController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors', 'json.response']], function () {
    // ...
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/forgot-password',[ForgotPasswordController::class,'sendResetLinkResponse']);
    Route::post('/forgot-password-failed',[ForgotPasswordController::class,'sendResetLinkFailedResponse']);
    Route::post('/reset-password',[ResetPasswordController::class,'resetPassword']);
    Route::post('/reset-reponse-reponse',[ResetPasswordController::class,'sendResetResponse']);
    Route::post('/reset-password-failed-response',[ResetPasswordController::class,'sendResetFailedResponse']);
    Route::post('social', [AuthS2Controller::class,'social']);
});

Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::post('logout',[AuthController::class,'logout']);
});

Route::group(['prefix' => 'S1'], function () {
    Route::post('login', [AuthS1Controller::class, 'login']);
    Route::post('register', [AuthS1Controller::class, 'register']);
    Route::post('forgot-password', [AuthS1Controller::class, 'forgotPassword']);
    Route::post('reset', [AuthS1Controller::class, 'passwordReset']);
    Route::get('refresh', [AuthS1Controller::class, 'refresh']);
    Route::post('google', [AuthS1Controller::class, 'google']);
    Route::post('github', [AuthS1Controller::class, 'github']);
    Route::post('facebook', [AuthS1Controller::class, 'facebook']);
});
/**
 * Publication Route
 */
Route::get('/publications',[PublicationController::class,'index']);
Route::get('/publication-paginate',[PublicationController::class,'getPublicationPaginate']);


Route::middleware('auth:api')->group(function() {
   Route::put('/update-publication/{publication_id}',[PublicationController::class,'update']);
   Route::delete('delete-publication/{publication_id}',[PublicationController::class,'destroy']);
   Route::post('/add-publication',[PublicationController::class,'addPublication']);
   Route::get('similar-publication/{publication_id}',[PublicationController::class,'getSimilarPublication']);
});
/**
 * Comment Route
 */
Route::middleware('auth:api')->group(function () {
    Route::apiResource('comments', CommentController::class);
    Route::post('comments/like', [CommentLikeController::class, 'commentLikeOrDislike']);
    Route::get('notifications', [NotificationController::class, 'index']);
    Route::apiResource('reviews', ReviewController::class);
    Route::post('/search_comments',[]);
});
/**
 * Route sur les mangas et bd
 */
Route::get('/bds',[BdController::class,'index']);
Route::get('/bdPagination',[BdController::class,'getBdPaginate']);
Route::get('/bd/{id}',[BdController::class,'show']);
Route::middleware('auth:api')->group(function() {
   Route::post('/add-bd',[BdController::class,'store1']);
   Route::apiResource('/ouevreLitteraires',OeuvreLitteraireController::class);
   Route::apiResource('/audioBooks',AudioBookController::class);
   Route::apiResource('bds',BdController::class);
});
/**
 * Search Route
 */
Route::post('/search_publication/',[SearchPublicationController::class,'index']);
Route::post('search_bd',[SearchBdController::class,'index']);
Route::post('search_audioBook',[SearchAudioBookController::class,'index']);
Route::post('search_oeuvre_litteraire',[SearchOeuvreLitteraireController::class,'index']);