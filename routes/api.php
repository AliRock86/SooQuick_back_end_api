<?php
namespace Database\Seeds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllerAPI;
use App\Http\Controllers\RegionControllerAPI;
use App\Http\Controllers\StatusControllerAPI;
use App\Http\Controllers\CountryControllerAPI;
use App\Http\Controllers\CustomerControllerAPI;
use App\Http\Controllers\ProvinceControllerAPI;
use App\Http\Controllers\StatusTypeControllerAPI;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
|--------------------------------------------------------------------------
| User endpoints 
|--------------------------------------------------------------------------
 */
Route::name('auth.')->prefix('users')->group(function () {
    Route::get('/index', [UserControllerAPI::class,'index'])->name('index');
    Route::post('/registre', [UserControllerAPI::class,'store'])->name('registre');
    Route::patch('/update', [UserControllerAPI::class,'update'])->name('update');
    Route::post('/login', [UserControllerAPI::class,'check'])->name('login');
    Route::get('/activation/{otpNumber}', [UserControllerAPI::class,'accountActivate'])->name('activation');
    Route::get('/changeStatusByAdmin/{statusId}/{userId}', [UserControllerAPI::class,'changeStatus'])->name('changeStatus')->middleware(['jwt.auth.admin']);
    Route::get('/changeStatusByDelivery/{statusId}/{userId}', [UserControllerAPI::class,'changeStatus'])->name('changeStatus')->middleware(['jwt.auth.delivery']);
    Route::get('/refresh', [UserControllerAPI::class,'refresh'])->name('refresh');
    Route::get('/forgotPassword/{userPhone}', [UserControllerAPI::class,'forgotPassword'])->name('forgotPassword');
    Route::post('/changePassword', [UserControllerAPI::class,'changePassword'])->name('changePassword');
});

/*
|--------------------------------------------------------------------------
| StatusType endpoints
|--------------------------------------------------------------------------
 */
Route::name('status-types.')->prefix('status-types')->group(function () {
    Route::get('/', [StatusTypeControllerAPI::class,'index'])->name('index');
});

/*
|--------------------------------------------------------------------------
| Status endpoints
|--------------------------------------------------------------------------
 */
Route::name('statuses.')->prefix('statuses')->group(function () {
    Route::get('/{statusTypeId}', [StatusControllerAPI::class,'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| Role endpoints
|--------------------------------------------------------------------------
 *//*
Route::name('roles.')->prefix('roles')->group(function () {
    Route::get('/', 'RoleControllerAPI@index')->name('index');
});
*/
/*
|--------------------------------------------------------------------------
| Country endpoints
|--------------------------------------------------------------------------
 */
Route::name('countries.')->prefix('countries')->group(function () {
    Route::get('/', [CountryControllerAPI::class,'index'])->name('index');
});

/*
|--------------------------------------------------------------------------
| Province endpoints
|--------------------------------------------------------------------------
 */
Route::name('provinces.')->prefix('provinces')->group(function () {
    Route::get('/{countryId}', [ProvinceControllerAPI::class,'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| Region endpoints
|--------------------------------------------------------------------------
 */
Route::name('regions.')->prefix('regions')->group(function () {
    Route::get('/{provinceId}', [RegionControllerAPI::class,'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| Permision endpoints
|--------------------------------------------------------------------------
 */
Route::name('permisions.')->prefix('permisions')->group(function () {
    Route::get('/', 'PermisionControllerAPI@index')->name('index');
    Route::post('/', 'PermisionControllerAPI@store')->name('create');
    Route::get('/{permision}', 'PermisionControllerAPI@show')->name('show');
    Route::patch('/{permision}', 'PermisionControllerAPI@update')->name('update');
    Route::delete('/{permision}', 'PermisionControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Customer endpoints
|--------------------------------------------------------------------------
 */
Route::name('customers.')->prefix('customers')->group(function () {
    Route::patch('/{customerId}', [CustomerControllerAPI::class,'update'])->name('update')->middleware(['jwt.auth.owner']);
});

/*
|--------------------------------------------------------------------------
| Address endpoints
|--------------------------------------------------------------------------
 */
Route::name('addresses.')->prefix('addresses')->group(function () {
    Route::get('/', 'AddressControllerAPI@index')->name('index');
    Route::post('/', 'AddressControllerAPI@store')->name('create');
    Route::get('/{address}', 'AddressControllerAPI@show')->name('show');
    Route::patch('/{address}', 'AddressControllerAPI@update')->name('update');
    Route::delete('/{address}', 'AddressControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Merchant endpoints
|--------------------------------------------------------------------------
 */
Route::name('merchants.')->prefix('merchants')->group(function () {
    Route::patch('/create', [MerchantControllerAPI::class,'store'])->name('create')->middleware(['jwt.auth.owner']);
    Route::patch('/{merchantId}', [MerchantControllerAPI::class,'update'])->name('update')->middleware(['jwt.auth.owner']);
    Route::get('/', 'MerchantControllerAPI@index')->name('index');
    Route::post('/', 'MerchantControllerAPI@store')->name('create');
    Route::get('/{merchant}', 'MerchantControllerAPI@show')->name('show');
    Route::patch('/{merchant}', 'MerchantControllerAPI@update')->name('update');
    Route::delete('/{merchant}', 'MerchantControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| DeliveryCompany endpoints 
|--------------------------------------------------------------------------
 */
Route::middleware(['jwt.auth.delivery-company'])->name('delivery-companies.')->prefix('delivery-companies')->group(function () {
    Route::post('/', [DeliveryCompanyControllerAPI::class,'store'])->name('createCompany');
    Route::patch('/', [DeliveryCompanyControllerAPI::class,'update'])->name('updateCompany');

    Route::get('/', [CompanyDriversControllerAPI::class,'index'])->name('allDrivers');
    Route::post('/', [DriverControllerAPI::class,'store'])->name('createDriver');
    Route::patch('/{driverId}', [DriverControllerAPI::class,'update'])->name('update');
    Route::get('/{driverId}', [DriverControllerAPI::class,'driverChangeStatus'])->name('driverChangeStatus');
    Route::get('/{phoneNumber}', [DriverControllerAPI::class,'search'])->name('driverSearch');
    
    Route::post('/', [DeliveryDriversControllerAPI::class,'store'])->name('assignPackegs');
    Route::patch('/', [DeliveryDriversControllerAPI::class,'update'])->name('updateAssignedPackegs');
    Route::get('/{statusId}', [DeliveryDriversControllerAPI::class,'getPackegsByDriver'])->name('getPackegsByDriver');
    Route::get('/{dliveryId}', [DeliveryDriversControllerAPI::class,'destroy'])->name('deleteAssignedPackegs');

    Route::post('/', [DeliveryPriceControllerAPI::class,'store'])->name('addPrice');
    Route::patch('/', [DeliveryPriceControllerAPI::class,'update'])->name('updatePrice');
    Route::get('/', [DeliveryPriceControllerAPI::class,'getAllByCompany'])->name('getAllPrices');
    Route::get('/{priceId}', [DeliveryPriceControllerAPI::class,'destroy'])->name('deletePrice');
});

/*
|--------------------------------------------------------------------------
| Order endpoints
|--------------------------------------------------------------------------
 */
Route::name('orders.')->prefix('orders')->group(function () {
    Route::patch('/{customerId}', [OrderControllerAPI::class,'update'])->name('update')->middleware(['jwt.auth.owner']);
    Route::get('/', [OrderControllerAPI::class,'index'])->name('index');
    Route::post('/', [OrderControllerAPI::class,'store'])->name('create');
    Route::get('/{orderId}', [OrderControllerAPI::class,'show'])->name('show');
    Route::patch('/{orderId}', [OrderControllerAPI::class,'update'])->name('update');
    Route::delete('/{order}', [OrderControllerAPI::class,'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Image endpoints
|--------------------------------------------------------------------------
 */
Route::name('images.')->prefix('images')->group(function () {
    Route::get('/', 'ImageControllerAPI@index')->name('index');
    Route::post('/', 'ImageControllerAPI@store')->name('create');
    Route::get('/{image}', 'ImageControllerAPI@show')->name('show');
    Route::patch('/{image}', 'ImageControllerAPI@update')->name('update');
    Route::delete('/{image}', 'ImageControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| NotificationType endpoints
|--------------------------------------------------------------------------
 */
Route::name('notification-types.')->prefix('notification-types')->group(function () {
    Route::get('/', 'NotificationTypeControllerAPI@index')->name('index');
    Route::post('/', 'NotificationTypeControllerAPI@store')->name('create');
    Route::get('/{notificationType}', 'NotificationTypeControllerAPI@show')->name('show');
    Route::patch('/{notificationType}', 'NotificationTypeControllerAPI@update')->name('update');
    Route::delete('/{notificationType}', 'NotificationTypeControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Notification endpoints
|--------------------------------------------------------------------------
 */
Route::name('notifications.')->prefix('notifications')->group(function () {
    Route::get('/', 'NotificationControllerAPI@index')->name('index');
    Route::post('/', 'NotificationControllerAPI@store')->name('create');
    Route::get('/{notification}', 'NotificationControllerAPI@show')->name('show');
    Route::patch('/{notification}', 'NotificationControllerAPI@update')->name('update');
    Route::delete('/{notification}', 'NotificationControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| DeliveryPrice endpoints
|--------------------------------------------------------------------------
 */
Route::name('delivery-prices.')->prefix('delivery-prices')->group(function () {
    Route::get('/', 'DeliveryPriceControllerAPI@index')->name('index');
    Route::post('/', 'DeliveryPriceControllerAPI@store')->name('create');
    Route::get('/{deliveryPrice}', 'DeliveryPriceControllerAPI@show')->name('show');
    Route::patch('/{deliveryPrice}', 'DeliveryPriceControllerAPI@update')->name('update');
    Route::delete('/{deliveryPrice}', 'DeliveryPriceControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Bill endpoints
|--------------------------------------------------------------------------
 */
Route::name('bills.')->prefix('bills')->group(function () {
    Route::get('/', 'BillControllerAPI@index')->name('index');
    Route::post('/', 'BillControllerAPI@store')->name('create');
    Route::get('/{bill}', 'BillControllerAPI@show')->name('show');
    Route::patch('/{bill}', 'BillControllerAPI@update')->name('update');
    Route::delete('/{bill}', 'BillControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Driver endpoints
|--------------------------------------------------------------------------
 */
Route::name('drivers.')->prefix('drivers')->group(function () {
    Route::get('/', 'DriverControllerAPI@index')->name('index');
    Route::post('/', 'DriverControllerAPI@store')->name('create');
    Route::get('/{driver}', 'DriverControllerAPI@show')->name('show');
    Route::patch('/{driver}', 'DriverControllerAPI@update')->name('update');
    Route::delete('/{driver}', 'DriverControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Otp endpoints
|--------------------------------------------------------------------------
 */
Route::name('otps.')->prefix('otps')->group(function () {
    Route::get('/', 'OtpControllerAPI@index')->name('index');
    Route::post('/', 'OtpControllerAPI@store')->name('create');
    Route::get('/{otp}', 'OtpControllerAPI@show')->name('show');
    Route::patch('/{otp}', 'OtpControllerAPI@update')->name('update');
    Route::delete('/{otp}', 'OtpControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Offer endpoints
|--------------------------------------------------------------------------
 */
Route::name('offers.')->prefix('offers')->group(function () {
    Route::get('/', 'OfferControllerAPI@index')->name('index');
    Route::post('/', 'OfferControllerAPI@store')->name('create');
    Route::get('/{offer}', 'OfferControllerAPI@show')->name('show');
    Route::patch('/{offer}', 'OfferControllerAPI@update')->name('update');
    Route::delete('/{offer}', 'OfferControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Action endpoints
|--------------------------------------------------------------------------
 */
Route::name('actions.')->prefix('actions')->group(function () {
    Route::get('/', 'ActionControllerAPI@index')->name('index');
    Route::post('/', 'ActionControllerAPI@store')->name('create');
    Route::get('/{action}', 'ActionControllerAPI@show')->name('show');
    Route::patch('/{action}', 'ActionControllerAPI@update')->name('update');
    Route::delete('/{action}', 'ActionControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Partnership endpoints
|--------------------------------------------------------------------------
 */
Route::name('partnerships.')->prefix('partnerships')->group(function () {
    Route::get('/', 'PartnershipControllerAPI@index')->name('index');
    Route::post('/', 'PartnershipControllerAPI@store')->name('create');
    Route::get('/{partnership}', 'PartnershipControllerAPI@show')->name('show');
    Route::patch('/{partnership}', 'PartnershipControllerAPI@update')->name('update');
    Route::delete('/{partnership}', 'PartnershipControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| DeliveryDrivers endpoints
|--------------------------------------------------------------------------
 */
Route::name('delivery-drivers.')->prefix('delivery-drivers')->group(function () {
    Route::get('/', 'DeliveryDriversControllerAPI@index')->name('index');
    Route::post('/', 'DeliveryDriversControllerAPI@store')->name('create');
    Route::get('/{deliveryDrivers}', 'DeliveryDriversControllerAPI@show')->name('show');
    Route::patch('/{deliveryDrivers}', 'DeliveryDriversControllerAPI@update')->name('update');
    Route::delete('/{deliveryDrivers}', 'DeliveryDriversControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Instruction endpoints
|--------------------------------------------------------------------------
 */
Route::name('instructions.')->prefix('instructions')->group(function () {
    Route::get('/', 'InstructionControllerAPI@index')->name('index');
    Route::post('/', 'InstructionControllerAPI@store')->name('create');
    Route::get('/{instruction}', 'InstructionControllerAPI@show')->name('show');
    Route::patch('/{instruction}', 'InstructionControllerAPI@update')->name('update');
    Route::delete('/{instruction}', 'InstructionControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| OrderInstruction endpoints
|--------------------------------------------------------------------------
 */
Route::name('order-instructions.')->prefix('order-instructions')->group(function () {
    Route::get('/', 'OrderInstructionControllerAPI@index')->name('index');
    Route::post('/', 'OrderInstructionControllerAPI@store')->name('create');
    Route::get('/{orderInstruction}', 'OrderInstructionControllerAPI@show')->name('show');
    Route::patch('/{orderInstruction}', 'OrderInstructionControllerAPI@update')->name('update');
    Route::delete('/{orderInstruction}', 'OrderInstructionControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| OrderAcation endpoints
|--------------------------------------------------------------------------
 */
Route::name('order-acations.')->prefix('order-acations')->group(function () {
    Route::get('/', 'OrderAcationControllerAPI@index')->name('index');
    Route::post('/', 'OrderAcationControllerAPI@store')->name('create');
    Route::get('/{orderAcation}', 'OrderAcationControllerAPI@show')->name('show');
    Route::patch('/{orderAcation}', 'OrderAcationControllerAPI@update')->name('update');
    Route::delete('/{orderAcation}', 'OrderAcationControllerAPI@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| CompanyDrivers endpoints
|--------------------------------------------------------------------------
 */
Route::name('company-drivers.')->prefix('company-drivers')->group(function () {
    Route::get('/', [CompanyDriversControllerAPI::class, 'index'])->name('index');
    Route::post('/', [CompanyDriversControllerAPI::class, 'store'])->name('create');
    Route::get('/{companyDrivers}', [CompanyDriversControllerAPI::class, 'show'])->name('show');
    Route::patch('/{companyDrivers}', [CompanyDriversControllerAPI::class, 'update'])->name('update');
    Route::delete('/{companyDrivers}', [CompanyDriversControllerAPI::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| TransferredOrders endpoints
|--------------------------------------------------------------------------
 */
Route::name('transferred-orders.')->prefix('transferred-orders')->group(function () {
    Route::get('/', [TransferredOrdersControllerAPI::class, 'index'])->name('index');
    Route::post('/', [TransferredOrdersControllerAPI::class, 'store'])->name('create');
    Route::get('/{transferredOrders}', [TransferredOrdersControllerAPI::class, 'show'])->name('show');
    Route::patch('/{transferredOrders}', [TransferredOrdersControllerAPI::class, 'update'])->name('update');
    Route::delete('/{transferredOrders}', [TransferredOrdersControllerAPI::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Price endpoints
|--------------------------------------------------------------------------
 */
Route::name('prices.')->prefix('prices')->group(function () {
    Route::get('/', [PriceControllerAPI::class, 'index'])->name('index');
    Route::post('/', [PriceControllerAPI::class, 'store'])->name('create');
    Route::get('/{price}', [PriceControllerAPI::class, 'show'])->name('show');
    Route::patch('/{price}', [PriceControllerAPI::class, 'update'])->name('update');
    Route::delete('/{price}', [PriceControllerAPI::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Wallet endpoints
|--------------------------------------------------------------------------
 */
Route::name('wallets.')->prefix('wallets')->group(function () {
    Route::get('/', [WalletControllerAPI::class, 'index'])->name('index');
    Route::post('/', [WalletControllerAPI::class, 'store'])->name('create');
    Route::get('/{wallet}', [WalletControllerAPI::class, 'show'])->name('show');
    Route::patch('/{wallet}', [WalletControllerAPI::class, 'update'])->name('update');
    Route::delete('/{wallet}', [WalletControllerAPI::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Transaction endpoints
|--------------------------------------------------------------------------
 */
Route::name('transactions.')->prefix('transactions')->group(function () {
    Route::get('/', [TransactionControllerAPI::class, 'index'])->name('index');
    Route::post('/', [TransactionControllerAPI::class, 'store'])->name('create');
    Route::get('/{transaction}', [TransactionControllerAPI::class, 'show'])->name('show');
    Route::patch('/{transaction}', [TransactionControllerAPI::class, 'update'])->name('update');
    Route::delete('/{transaction}', [TransactionControllerAPI::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| TransferOrderByDrivers endpoints
|--------------------------------------------------------------------------
 */
Route::name('transfer-order-by-drivers.')->prefix('transfer-order-by-drivers')->group(function () {
    Route::get('/', [TransferOrderByDriversControllerAPI::class, 'index'])->name('index');
    Route::post('/', [TransferOrderByDriversControllerAPI::class, 'store'])->name('create');
    Route::get('/{transferOrderByDrivers}', [TransferOrderByDriversControllerAPI::class, 'show'])->name('show');
    Route::patch('/{transferOrderByDrivers}', [TransferOrderByDriversControllerAPI::class, 'update'])->name('update');
    Route::delete('/{transferOrderByDrivers}', [TransferOrderByDriversControllerAPI::class, 'destroy'])->name('destroy');
});

