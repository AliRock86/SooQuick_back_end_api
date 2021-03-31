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
use App\Http\Controllers\MerchantControllerAPI;
use App\Http\Controllers\DeliveryCompanyControllerAPI;
use App\Http\Controllers\DriverControllerAPI;
use App\Http\Controllers\CompanyDriversControllerAPI;
use App\Http\Controllers\PartnershipControllerAPI;
use App\Http\Controllers\DeliveryPriceControllerAPI;
use App\Http\Controllers\OrderControllerAPI;
use App\Http\Controllers\DeliveryDriversControllerAPI;
use App\Http\Controllers\BillControllerAPI;



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
    //Route::post('/registre', [UserControllerAPI::class,'store'])->name('registre');
    Route::patch('/update', [UserControllerAPI::class,'update'])->name('update');
    Route::post('/login', [UserControllerAPI::class,'check'])->name('login');
    Route::post('/logout', [UserControllerAPI::class,'logout'])->name('logout');
    Route::get('/activation/{otpNumber}', [UserControllerAPI::class,'accountActivate'])->name('activation');
    Route::post('changePassword',[UserControllerAPI::class,'changePassword']);
    Route::get('/changeStatusByAdmin/{statusId}/{userId}', [UserControllerAPI::class,'changeStatus'])->name('changeStatus')->middleware(['jwt.auth.admin']);
    Route::get('/changeStatusByDelivery/{statusId}/{userId}', [UserControllerAPI::class,'changeStatus'])->name('changeStatus')->middleware(['jwt.auth.delivery']);
    Route::get('/refresh', [UserControllerAPI::class,'refresh'])->name('refresh');
    Route::get('/forgotPassword/{userPhone}', [UserControllerAPI::class,'forgotPassword'])->name('forgotPassword');
   
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
  //  Route::get('/{provinceId}', [RegionControllerAPI::class,'show'])->name('show');
    Route::get('/', [RegionControllerAPI::class,'index'])->name('index');
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
    Route::patch('/create', [MerchantControllerAPI::class,'store'])->name('create');
    Route::patch('/update/{merchantId}', [MerchantControllerAPI::class,'update'])->name('update')->middleware(['jwt.auth.owner']);
    Route::get('/',  [MerchantControllerAPI::class,'index'])->name('index')->middleware(['jwt.auth.admin']);  
    Route::get('show/{merchant}', [MerchantControllerAPI::class,'show'])->name('show');
 
});





/*
|--------------------------------------------------------------------------
| customer endpoints
|--------------------------------------------------------------------------
 */
Route::name('customer.')->prefix('customer')->group(function () {
    Route::patch('/create', [CustomerControllerAPI::class,'store'])->name('create');
    Route::patch('/update/{id}', [CustomerControllerAPI::class,'update'])->name('update');
    Route::get('/',  [CustomerControllerAPI::class,'index'])->name('index')->middleware(['jwt.auth.admin']);  
    Route::get('show/{merchant}', [CustomerControllerAPI::class,'show'])->name('show');
 
});

/*
|--------------------------------------------------------------------------
| DeliveryCompany endpoints 
|--------------------------------------------------------------------------
 */
Route::name('deliveryCompanies.')->prefix('deliveryCompanies')->group(function () {
    Route::post('/create', [DeliveryCompanyControllerAPI::class,'store'])->name('createCompany');
    Route::patch('update', [DeliveryCompanyControllerAPI::class,'update'])->name('updateCompany');
    Route::get('/show', [DeliveryCompanyControllerAPI::class,'show'])->middleware(['jwt.auth.delivery']);


    Route::get('/Dashbourd', [DeliveryCompanyControllerAPI::class,'Dashbourd'])->middleware(['jwt.auth.delivery']);


    Route::get('/allDrivers', [DeliveryCompanyControllerAPI::class,'GetAllDrivers'])->name('allDrivers');
    Route::post('/', [DriverControllerAPI::class,'store'])->name('createDriver');
    
     
    Route::name('Orders.')->prefix('Orders')->group(function () {
        Route::get('/', [OrderControllerAPI::class,'GetDeliveryCompanyOrders'])->middleware(['jwt.auth.delivery']);
        Route::post('/changeStatus', [OrderControllerAPI::class,'ChangeStatusByDeliveryComp'])->middleware(['jwt.auth.delivery']);
        Route::get('/GetByMerchantId/{merchant_id}', [OrderControllerAPI::class,'GetByMerchantId'])->middleware(['jwt.auth.delivery']);
        Route::get('/GetByDriverId/{Driver_id}', [OrderControllerAPI::class,'GetByDriverId'])->middleware(['jwt.auth.delivery']);


        
    });

    Route::get('/GetMerchants', [DeliveryCompanyControllerAPI::class,'GetMerchants'])->name('allMerchants');
    Route::get('/bills', [BillControllerAPI::class,'GeyByDeliveryCompanyId'])->middleware(['jwt.auth.delivery']);
    Route::get('/bills/Search', [BillControllerAPI::class,'SearchByDeliveryCom'])->middleware(['jwt.auth.delivery']);

    
 
    Route::patch('/{driverId}', [DriverControllerAPI::class,'update'])->name('update');
    Route::get('/{driverId}', [DriverControllerAPI::class,'driverChangeStatus'])->name('driverChangeStatus');
    Route::get('/{phoneNumber}', [DriverControllerAPI::class,'search'])->name('driverSearch');
    
    Route::post('/', [DeliveryDriversControllerAPI::class,'store'])->name('assignPackegs');
    Route::patch('/', [DeliveryDriversControllerAPI::class,'update'])->name('updateAssignedPackegs');
    Route::get('/{statusId}', [DeliveryDriversControllerAPI::class,'getPackegsByDriver'])->name('getPackegsByDriver');
    Route::get('/{dliveryId}', [DeliveryDriversControllerAPI::class,'destroy'])->name('deleteAssignedPackegs');

});

/*
|--------------------------------------------------------------------------
| CompanyDrivers endpoints
|--------------------------------------------------------------------------
 */

 
Route::name('CompanyDrivers.')->prefix('CompanyDrivers')->group(function () {
    Route::post('/create', [CompanyDriversControllerAPI::class,'store'])->name('createCompanyDrivers')->middleware(['jwt.auth.delivery']);
    Route::get('/SearchByDeliveryCom',[CompanyDriversControllerAPI::class,'SearchByDeliveryCom'] )->middleware(['jwt.auth.delivery']);

    //Driver
    Route::get('/SearchByDriver',[CompanyDriversControllerAPI::class,'SearchByDriver'] )->middleware(['jwt.auth.driver']);
    Route::post('/changeStatusByDriver', [CompanyDriversControllerAPI::class,'changeStatusByDriver'])->name('changeStatusByDriver')->middleware(['jwt.auth.driver']);


    Route::post('/changeStatus', [CompanyDriversControllerAPI::class,'changeStatus'])->name('changeStatus')->middleware(['jwt.auth.delivery']);
    Route::patch('/{customerId}', [CompanyDriversControllerAPI::class,'update'])->name('update')->middleware(['jwt.auth.owner']);
    Route::get('/', [CompanyDriversControllerAPI::class,'index'])->name('index');
    Route::post('/', [CompanyDriversControllerAPI::class,'store'])->name('create');

});



/*
|--------------------------------------------------------------------------
| Order endpoints
|--------------------------------------------------------------------------
 */


Route::name('orders.')->prefix('orders')->group(function () {
    Route::post('/create', [OrderControllerAPI::class,'store'])->name('create')->middleware(['jwt.auth.owner']);
    Route::patch('/{customerId}', [OrderControllerAPI::class,'update'])->name('update')->middleware(['jwt.auth.owner']);
    
    Route::get('/search', [OrderControllerAPI::class,'SearchByDeliveryCom'])->name('index')->middleware(['jwt.auth.delivery']);

    Route::get('/', [OrderControllerAPI::class,'index'])->name('index');
    
    Route::get('/{orderId}', [OrderControllerAPI::class,'show'])->name('show');
    Route::patch('/{orderId}', [OrderControllerAPI::class,'update'])->name('update');
    Route::delete('/{order}', [OrderControllerAPI::class,'destroy'])->name('destroy');
});


/*
|--------------------------------------------------------------------------
| Partnership endpoints
|--------------------------------------------------------------------------
 */
Route::name('partnerships.')->prefix('partnerships')->group(function () {
    Route::get('/', 'PartnershipControllerAPI@index')->name('index');
    Route::get('/SearchByDeliveryCom',[PartnershipControllerAPI::class,'SearchByDeliveryCom'] )->middleware(['jwt.auth.delivery']);
    Route::post('/create', [PartnershipControllerAPI::class,'store'])->name('create')->middleware(['jwt.auth.owner']);;
    Route::get('/{partnership}', 'PartnershipControllerAPI@show')->name('show');
    Route::post('/ChangStatusByDeliveryCom',[PartnershipControllerAPI::class,'ChangStatusByDeliveryCom'])->name('update')->middleware(['jwt.auth.delivery']);
    Route::delete('/{partnership}', 'PartnershipControllerAPI@destroy')->name('destroy');
});




/*
|--------------------------------------------------------------------------
| DeliveryPrice endpoints
|--------------------------------------------------------------------------
 */
Route::name('deliveryPrices.')->prefix('deliveryPrices')->middleware(['jwt.auth.delivery'])->group(function () {

    Route::get('/', [DeliveryPriceControllerAPI::class,'index'])->name('getAllPrices');
    Route::post('/create', [DeliveryPriceControllerAPI::class,'store'])->name('addPrice');
    Route::patch('/update/{id}', [DeliveryPriceControllerAPI::class,'update'])->name('updatePrice');
    Route::get('/{id}',  [DeliveryPriceControllerAPI::class,'show'])->name('show');
    Route::get('/{priceId}', [DeliveryPriceControllerAPI::class,'destroy'])->name('deletePrice');
    Route::delete('/{deliveryPrice}', 'DeliveryPriceControllerAPI@destroy')->name('destroy');


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

//http://127.0.0.1:7777/api/deliveryCompanies/Orders/GetByMerchantId/9

/*
|--------------------------------------------------------------------------
| Bill endpoints
|--------------------------------------------------------------------------
 */
Route::name('bills.')->prefix('bills')->group(function () {
    Route::get('/', 'BillControllerAPI@index')->name('index');
    Route::post('/store',  [BillControllerAPI::class,'store'])->middleware(['jwt.auth.delivery']);;
    Route::get('/{bill}', 'BillControllerAPI@show')->name('show');
    Route::patch('/{bill}', 'BillControllerAPI@update')->name('update');
    Route::delete('/delete/{bill_id}',[BillControllerAPI::class,'destroy'])->middleware(['jwt.auth.delivery']);
});

/*
|--------------------------------------------------------------------------
| Driver endpoints
|--------------------------------------------------------------------------
 */


Route::name('drivers.')->prefix('drivers')->group(function () {
   // Route::get('/',  [DriverControllerAPI::class,'index'])->name('index');
    Route::post('/create',  [DriverControllerAPI::class,'store'])->name('create');
   Route::get('/{driver}', [DriverControllerAPI::class,'show'])->name('show');
    Route::patch('update', [DriverControllerAPI::class,'update'])->middleware(['jwt.auth.driver']);
   // Route::delete('/{driver}', 'DriverControllerAPI@destroy')->name('destroy');

    Route::name('Orders.')->prefix('Orders')->middleware(['jwt.auth.driver'])->group(function () {
        Route::get('/',  [DeliveryDriversControllerAPI::class,'GetByDriverId']);
    });

//GetByDriverId
    //  Route::post('/create',  [DeliveryDriversControllerAPI::class,'store'] )->middleware(['jwt.auth.delivery']);
});


/*
|--------------------------------------------------------------------------
| DeliveryDrivers endpoints
|--------------------------------------------------------------------------
 */
Route::name('deliveryDrivers.')->prefix('deliveryDrivers')->group(function () {
    Route::get('/',  [DeliveryDriversControllerAPI::class,'index'])->name('index');
    Route::post('/create',  [DeliveryDriversControllerAPI::class,'store'] )->middleware(['jwt.auth.delivery']);
    Route::get('/{deliveryDrivers}',[DeliveryDriversControllerAPI::class,'show'])->name('show');
    Route::patch('/{deliveryDrivers}',[DeliveryDriversControllerAPI::class,'update'])->name('update');
    Route::delete('/{deliveryDrivers}', 'DeliveryDriversControllerAPI@destroy')->name('destroy');
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

