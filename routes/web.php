<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminVehicleController;
use App\Http\Controllers\Admin\AdminBrokerController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminSellerInformationController;
use App\Http\Controllers\Admin\AdminBuyerInformationController;
use App\Http\Controllers\Admin\AdminRepairDetailController;
use App\Http\Controllers\Admin\AdminVehicleDetailsController;
use App\Http\Controllers\Admin\AdminGSTDetailsController;
use App\Http\Controllers\Admin\AdminInsuranceController;
use App\Http\Controllers\Admin\AdminInsuranceProviderController;
use App\Http\Controllers\Admin\AdminPriceListController;
use App\Http\Controllers\Admin\AdminInsuranceTypeController;
use App\Http\Controllers\Admin\AdminCostTypeController;
use App\Http\Controllers\Admin\AdminVehicleManufactureController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::resource('/Dashboard', AdminDashboardController::class)->names([
        'index' => 'dashboard.index'
    ]);
	
	Route::resource('vehicle', AdminVehicleController::class)->names([
        'index'  => 'vehicle.index',
        'store' => 'vehicle.store'
    ]);
	
	Route::any('/get_broker_details', [AdminBrokerController::class, 'get_broker_details'])->name('get_broker_details');
	Route::any('/edit_broker_details', [AdminBrokerController::class, 'edit_broker_details'])->name('edit_broker_details');
	Route::any('/delete_broker_details', [AdminBrokerController::class, 'delete_broker_details'])->name('delete_broker_details');
	Route::any('/update_broker_details', [AdminBrokerController::class, 'update_broker_details'])->name('update_broker_details');
	Route::resource('brokerdetails', AdminBrokerController::class)->names([
        'index'  => 'broker.index',
        'store' => 'broker.store'
    ]);
	
	Route::any('/get_employee_details', [AdminUserController::class, 'get_employee_details'])->name('get_employee_details');
	Route::any('/edit_employee_details', [AdminUserController::class, 'edit_employee_details'])->name('edit_employee_details');
	Route::any('/update_employee_details', [AdminUserController::class, 'update_employee_details'])->name('update_employee_details');
	Route::resource('userdetails', AdminUserController::class)->names([
        'index'  => 'user.index',
        'store' => 'user.store'
    ]);
    Route::resource('sellerdetails', AdminSellerInformationController::class)->names([
        'index'  => 'seller.index',
        'store' => 'seller.store'
    ]);
	Route::resource('buyerdetails', AdminBuyerInformationController::class)->names([
        'index'  => 'buyer.index',
        'store' => 'buyer.store'
    ]);
	Route::resource('repairdetails', AdminRepairDetailController::class)->names([
        'index'  => 'repair.index',
        'store' => 'repair.store'
    ]);
	//Route::any('/showData', [AdminVehicleDetailsController::class, 'showData'])->name('admin.view.index');
	Route::any('/get_vehicle_details', [AdminVehicleDetailsController::class, 'get_vehicle_details'])->name('get_vehicle_details');
	Route::any('/save_buyer_details', [AdminVehicleDetailsController::class, 'save_buyer_details'])->name('save_buyer_details');
	Route::any('/save_seller_details', [AdminVehicleDetailsController::class, 'save_seller_details'])->name('save_seller_details');
	Route::any('/save_repair_details', [AdminVehicleDetailsController::class, 'save_repair_details'])->name('save_repair_details');
	Route::any('/get_repair_details', [AdminVehicleDetailsController::class, 'get_repair_details'])->name('get_repair_details');
	Route::any('/get_miscellenous_details', [AdminVehicleDetailsController::class, 'get_miscellenous_details'])->name('get_miscellenous_details');
	Route::any('/whole_vehicle_details', [AdminVehicleDetailsController::class, 'whole_vehicle_details'])->name('whole_vehicle_details');
	Route::any('/edit_vehicle_details', [AdminVehicleDetailsController::class, 'edit_vehicle_details'])->name('edit_vehicle_details');
	Route::any('/save_miscellaneous_details', [AdminVehicleDetailsController::class, 'save_miscellaneous_details'])->name('save_miscellaneous_details');
	Route::any('/get_vehicleinsurance_details', [AdminVehicleDetailsController::class, 'get_vehicleinsurance_details'])->name('get_vehicleinsurance_details');
	Route::any('/view_vehicleinsurance_details', [AdminVehicleDetailsController::class, 'view_vehicleinsurance_details'])->name('view_vehicleinsurance_details');
	Route::any('/save_cost_details', [AdminVehicleDetailsController::class, 'save_cost_details'])->name('save_cost_details');
	Route::resource('vehicledetails', AdminVehicleDetailsController::class)->names([
        'index'  => 'vehicledetails.index',
        'store' => 'vehicledetails.store'
    ]);
	
	
	
	Route::any('/edit_gst_details', [AdminGSTDetailsController::class, 'edit_gst_details'])->name('edit_gst_details');
	Route::any('/get_gst_details', [AdminGSTDetailsController::class, 'get_gst_details'])->name('get_gst_details');
	Route::any('/delete_gst_details', [AdminGSTDetailsController::class, 'delete_gst_details'])->name('delete_gst_details');
	Route::resource('gstdetails', AdminGSTDetailsController::class)->names([
        'index'  => 'gst.index',
        'store' => 'gst.store'
    ]);


	Route::resource('pricelist', AdminPriceListController::class)->names([
        'index'  => 'pricelist.index',
        'store' => 'pricelist.store'
	]);
	
	
	Route::any('/get_insurance_details', [AdminInsuranceController::class, 'get_insurance_details'])->name('get_insurance_details');
	Route::any('/edit_insurance_details', [AdminInsuranceController::class, 'edit_insurance_details'])->name('edit_insurance_details');
	Route::any('/delete_insurance_details', [AdminInsuranceController::class, 'delete_insurance_details'])->name('delete_insurance_details');
	Route::resource('insurance', AdminInsuranceController::class)->names([
        'index'  => 'insurance.index',
        'store' => 'insurance.store'
    ]);
	
	Route::any('/edit_provider_details', [AdminInsuranceProviderController::class, 'edit_provider_details'])->name('edit_provider_details');
	Route::any('/get_provider_details', [AdminInsuranceProviderController::class, 'get_provider_details'])->name('get_provider_details');
	Route::any('/delete_provider_details', [AdminInsuranceProviderController::class, 'delete_provider_details'])->name('delete_provider_details');
	Route::resource('insuranceprovider', AdminInsuranceProviderController::class)->names([
        'index'  => 'insuranceprovider.index',
        'store' => 'insuranceprovider.store'
    ]);
	
	Route::any('/edit_type_details', [AdminInsuranceTypeController::class, 'edit_type_details'])->name('edit_type_details');
	Route::any('/get_type_details', [AdminInsuranceTypeController::class, 'get_type_details'])->name('get_type_details');
	Route::any('/delete_type_details', [AdminInsuranceTypeController::class, 'delete_type_details'])->name('delete_type_details');
	Route::resource('insurancetype', AdminInsuranceTypeController::class)->names([
        'index'  => 'insurancetype.index',
        'store' => 'insurancetype.store'
    ]);
	
	Route::any('/edit_costtype_details', [AdminCostTypeController::class, 'edit_costtype_details'])->name('edit_costtype_details');
	Route::any('/get_costtype_details', [AdminCostTypeController::class, 'get_costtype_details'])->name('get_costtype_details');
	Route::any('/delete_costtype_details', [AdminCostTypeController::class, 'delete_costtype_details'])->name('delete_costtype_details');
	Route::resource('costtype', AdminCostTypeController::class)->names([
        'index'  => 'costtype.index',
        'store' => 'costtype.store'
    ]);
	
	Route::any('/edit_manufacture_details', [AdminVehicleManufactureController::class, 'edit_manufacture_details'])->name('edit_manufacture_details');
	Route::any('/get_manufacture_details', [AdminVehicleManufactureController::class, 'get_manufacture_details'])->name('get_manufacture_details');
	Route::any('/delete_manufacture_details', [AdminVehicleManufactureController::class, 'delete_manufacture_details'])->name('delete_manufacture_details');
	Route::resource('vehiclemanufacture', AdminVehicleManufactureController::class)->names([
        'index'  => 'vehiclemanufacture.index',
        'store' => 'vehiclemanufacture.store'
    ]);
});



Route::get('/d', function () {
    return view('font.demo');
});



require __DIR__ . '/auth.php';
