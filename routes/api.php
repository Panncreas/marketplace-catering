use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuMakananController;
use App\Http\Controllers\OrderController;

Route::apiResource('users', UserController::class);
Route::apiResource('menu', MenuMakananController::class);
Route::apiResource('orders', OrderController::class);
