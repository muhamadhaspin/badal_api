<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;

Route::controller(CountryController::class)->group(function () {
    Route::get('country', 'index');
    Route::post('country', 'store');

    Route::get('nationality', 'nationalities');
    Route::get('currency', 'currencies');
    Route::get('phonecode', 'phoneCodes');
});

// Route::post('seeker', function (Request $request) {
//     return [
//         "type" => str()->upper(($request->type)),
//         "first_name" => $request->first_name,
//         "last_name" => $request->last_name,

//         "gender" => str()->upper($request->gender),
//         "birth_date" => (new Carbon('12-10-1975'))->toDateString(),

//         "email" => $request->email,
//         "phone_number" => $request->phone_code . $request->phone_number,
//         "whatsapp" => $request->whatsapp,
//         "instagram" => $request->instagram,
//         "facebook" => $request->facebook,

//         "address" => str()->title($request->address),
//         "city" => str()->title($request->city),
//         "country" => str()->title($request->country),
//         "postcode" => $request->postcode,
//         "nationality" => str()->title($request->nationality),

//         "hajj_name" => str()->title($request->hajj_name),
//         "price" => Number::currency($request->price, $request->currency),
//     ];
// });
