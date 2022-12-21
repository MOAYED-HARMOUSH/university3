<?php
namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\expereince;
use App\Models\phone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::post('/register',[auth::class,'register']);
    Route::post('/login'   ,[auth::class,'login']);



      Route::group(['middleware' => ['auth:sanctum']], function() {

        Route::post('logout',   [auth::class, 'logout']);

        Route::post('create_wallet',   [WalletController::class, 'create_wallet']);

        Route::post('create_phone',   [PhoneController::class, 'create_phone']);

        Route::post('expert',   [ExpereinceController::class, 'expert']);

        Route::post('create/expert',   [ExpereinceController::class, 'create']);

        Route::post('consultations',   [ConsultationsController::class, 'makeConsultation']);

        Route::get('consultations/type',  function(){
            return [
                'medical',
                'family',
                'psychology',
                'other',
                'finance'
            ];
        });
        Route::get('getexpertsforspecifectype/{spec}',   [ExpereinceController::class, 'indexbyconsultation']);

        Route::post('getexpert/{name}',   [ExpereinceController::class, 'search']);
        Route::post('makereserve',   [ReserveController::class, 'makereserve']);
        Route::get('getkind/{name}', function($name){
            $kind=[
                'medical',
                'family',
                'psychology',
                'other',
                'finance'
            ];
            if(in_array($name,$kind))
            return $name;
            else
            return 'not exist';
        });
        Route::get('showreserveofexpert',   [ReserveController::class, 'show']);
        Route::get('showreserveofuser',   [PersonController::class, 'show']);

    });


//Route::get('indexconst',   [PersonController::class, 'indexconst']); // بحث عن تصنيف
        //Route::post('serachexpert/{name}',   [PersonController::class, 'serachexpert']); // بحث عن خبير
