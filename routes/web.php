<?php

use App\Http\Controllers\Reporting\BalaceSheetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::view('/file_manager', 'file_manager.index')->name('file_manager.index');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/set_decimal/{decimal}', 'HomeController@set_decimal')->name('set_decimal');

    Route::resource('accountingdashboard', 'AccountingDashboardController');

    Route::resource('accountclassification', 'Accounting\AccountClassificationController');
    Route::get('classificationdependent/ajax/{id}', array('as' => 'classificationdependent.ajax', 'uses' => 'Accounting\AccountClassificationController@dependentAjax'));

    Route::resource('accounttype', 'Accounting\AccountTypeController');
    Route::get('accounttypedependent/ajax/{id}', array('as' => 'accounttypedependent.ajax', 'uses' => 'Accounting\AccountTypeController@dependentAjax'));

    Route::resource('chartofaccount', 'Accounting\ChartofAccountController');
    Route::get('chartofaccountdependent/ajax/{id}', array('as' => 'chartofaccountdependent.ajax', 'uses' => 'Accounting\ChartofAccountController@dependentAjax'));

    Route::resource('subaccount', 'Accounting\SubAccountController');
    Route::resource('bankform', 'Accounting\BankFormController');

    // Customer 
    Route::resource('customer', 'Customer\CustomerController');
    Route::get('get_customer_ajax/{id}', array('as' => 'get_customer_ajax', 'uses' => 'Customer\CustomerController@get_customer_ajax'));
    Route::get('get_dealer_customer_ajax/{id}', array('as' => 'get_dealer_customer_ajax', 'uses' => 'Customer\CustomerController@get_dealer_customer_ajax'));
    Route::post('dealer_customer_import', 'Customer\CustomerController@dealer_customer_import')->name('dealer_customer_import');
    Route::get('dealer_customer_export', 'Customer\CustomerController@dealer_customer_export')->name('dealer_customer_export');

    // HP Customer
    Route::resource('hp_customer', 'Customer\HpCustomerController');
    Route::get('hp_customer_export', 'Customer\HpCustomerController@hp_customer_export')->name('hp_customer_export');

    // Cash Sale Customer
    Route::resource('cash_sale_customer', 'Customer\CashSaleCustomerController');


    // Supplier 
    Route::resource('supplier', 'SupplierController');
    Route::get('get_supplier_ajax/{id}', array('as' => 'get_supplier_ajax', 'uses' => 'SupplierController@get_supplier_ajax'));
    Route::post('supplier_import', 'SupplierController@supplier_import')->name('supplier_import');


    // Brand & Products 
    Route::resource('brand', 'BrandController');

    Route::resource('type_of_models', 'Accounting\TypeOfModelController');
    Route::get('get_type_of_models_ajax/{id}', array('as' => 'get_type_of_models_ajax', 'uses' => 'Accounting\TypeOfModelController@get_type_of_models_ajax'));

    Route::resource('products', 'ProductsController');
    Route::get('get_products_ajax/{id}', array('as' => 'get_products_ajax', 'uses' => 'ProductsController@get_products_ajax'));
    Route::post('product_import', 'ProductsController@product_import')->name('product_import');
    Route::resource('import_car', 'Accounting\ImportCarController');

    // CashBook 
    Route::resource('cashbook', 'Accounting\CashBookController');
    Route::get('cashbook_export', 'Accounting\CashBookController@cashbook_export')->name('cashbook_export');
    Route::resource('daily_report', 'Accounting\DailyReportController');

    // CashBook View Design Update 
    Route::resource('cash_book_view', 'CashBook\CashBookViewController');
    Route::post('cash_book_ajax_store', 'CashBook\CashBookViewController@store')->name('cash_book_ajax_store');
    Route::get('cash_book_quick_edit/{id}', 'CashBook\CashBookViewController@edit')->name('cash_book_quick_edit');
    Route::post('cash_book_ajax_update', 'CashBook\CashBookViewController@update')->name('cash_book_ajax_update');


    // Dealer Sales 
    Route::resource('sales_invoices', 'Accounting\SalesInvoicesController');
    Route::get('get_sales_invoices/{id}', array('as' => 'get_sales_invoices', 'uses' => 'Accounting\SalesInvoicesController@get_sales_invoices'));
    Route::get('get_sales_invoices_ajax/{type}', array('as' => 'get_sales_invoices_ajax', 'uses' => 'Accounting\SalesInvoicesController@get_sales_invoices_ajax'));
    Route::get('get_sales_items/{id}', array('as' => 'get_sales_items', 'uses' => 'Accounting\SalesInvoicesController@get_sales_items'));
    Route::get('sale_invoice_pdf_download/{id}', array('as' => 'sale_invoice_pdf_download', 'uses' => 'Accounting\SalesInvoicesController@sale_invoice_pdf_download'));

    // Dealer Sales Group
    Route::resource('sales_journal', 'Accounting\SalesJournalController');
    Route::get('get_sales_journals/{id}', array('as' => 'get_sales_journals', 'uses' => 'Accounting\SalesJournalController@get_sales_journals'));
    Route::resource('cash_collection', 'Accounting\CashCollectionController');
    Route::resource('sales_ledger', 'Accounting\SalesLedgerController');
    Route::resource('account_receivables', 'Accounting\AccountReceivablesController');
    Route::resource('sale_cash_book', 'Accounting\SaleCashBookController');

    // HP Sales 
    Route::resource('hp_sales_invoices', 'Hp\SalesInvoiceController');
    Route::get('hp_invoice_view/{id}', array('as' => 'hp_invoice_view', 'uses' => 'Hp\SalesInvoiceController@hp_invoice_view'));

    // HP Sales Group
    Route::resource('hp_sales_journal', 'HP\HpSalesJournalController');
    Route::resource('hp_cash_collection', 'Hp\HpCashCollectionController');
    Route::resource('hp_sales_ledger', 'Hp\HpSalesLedgerController');
    Route::resource('hp_account_receivables', 'Hp\HpAccountReceivablesController');
    Route::resource('hp_sale_cash_book', 'Hp\HpSaleCashBookController');

    Route::resource('hire_purchase', 'Hp\HirePurchaseController');
    Route::resource('hp_sales_account', 'Hp\HpSalesAccountController');
    Route::resource('hp_cash_account', 'Hp\HpCashAccountController');
    Route::resource('hp_interest_suspense_account', 'Hp\HpInterestSuspenseAccountController');
    Route::resource('hp_service_account', 'Hp\HpServiceAccountController');
    Route::resource('hp_interest_account', 'Hp\HpInterestAccountController');


    // Sale Pay Now
    Route::resource('sale_pay_now', 'Accounting\SalePaynowController');
    Route::get('sales_inv_paynow_create/{id}', array('as' => 'sales_inv_paynow_create', 'uses' => 'Accounting\SalePaynowController@salePayNow'));


    // Cart System
    Route::resource('sale_invoice_cart', 'Cart\SaleInvoiceCartController');
    Route::post('add_cart_temporary', 'Cart\SaleInvoiceCartController@store');
    Route::get('get_temporary_sales_items', array('as' => 'get_temporary_sales_items', 'uses' => 'Cart\SaleInvoiceCartController@index'));
    Route::get('temporary_sales_items_remove/{id}', array('as' => 'temporary_sales_items_remove', 'uses' => 'Cart\SaleInvoiceCartController@temporary_sales_items_remove'));
    Route::get('temporary_sales_items_delete/{id}', array('as' => 'temporary_sales_items_delete', 'uses' => 'Cart\SaleInvoiceCartController@temporary_sales_items_delete'));

    Route::resource('sales_items', 'Accounting\SalesItemsController');
    Route::get('sales_items_remove/{id}', array('as' => 'sales_items_remove', 'uses' => 'Accounting\SalesItemsController@sales_items_remove'));


    Route::post('add_cart_temp_journal_entry', 'Cart\TempJournalEntryController@store')->name('add_cart_temp_journal_entry');
    Route::get('get_cart_temp_journal_entry', array('as' => 'get_cart_temp_journal_entry', 'uses' => 'Cart\TempJournalEntryController@index'))->name('get_cart_temp_journal_entry');
    Route::get('remove_cart_temp_journal_entry/{id}', array('as' => 'remove_cart_temp_journal_entry', 'uses' => 'Cart\TempJournalEntryController@remove_cart_temp_journal_entry'));

    // Purchase 
    Route::resource('purchase_order', 'Purchase\PurchaseOrderController');
    Route::resource('purchase_item', 'Purchase\PurchaseItemController');
    Route::get('purchase_item_remove/{id}', array('as' => 'purchase_item_remove', 'uses' => 'Purchase\PurchaseItemController@purchase_item_remove'));
    Route::get('get_purchase_items_ajax/{id}', 'Purchase\PurchaseItemController@getPurchaseItemsAjax')->name('get_purchase_items_ajax');
    Route::get('get_purchase_item_detail_ajax/{id}', 'Purchase\PurchaseItemController@getPurchaseItemsDetailAjax')->name('get_purchase_item_detail_ajax');

    // Temporary Purchase Item 
    Route::post('store_temporary_purchase_item', 'Purchase\TemporaryPurchaseItemController@store');
    Route::get('get_temporary_purchase_items', array('as' => 'get_temporary_purchase_items', 'uses' => 'Purchase\TemporaryPurchaseItemController@index'));
    Route::get('remove_temporary_purchase_items/{id}', array('as' => 'remove_temporary_purchase_items', 'uses' => 'Purchase\TemporaryPurchaseItemController@remove_temporary_purchase_items'));

    // Temporary Purchase Group Item
    Route::get('get_temporary_purchase_group_item', 'Purchase\TemporaryPurchaseGroupItemContriller@index');
    Route::post('store_temporary_purchase_group_item', 'Purchase\TemporaryPurchaseGroupItemContriller@store');
    Route::post('add_temporary_purchase_group_item', 'Purchase\TemporaryPurchaseGroupItemContriller@add_temporary_purchase_group_item')->name('add_temporary_purchase_group_item');
    Route::get('remove_temporary_purchase_group_items/{id}', 'Purchase\TemporaryPurchaseGroupItemContriller@remove')->name('remove_temporary_purchase_group_items');
    Route::get('delete_temporary_purchase_group_items/{id}', 'Purchase\TemporaryPurchaseGroupItemContriller@delete')->name('delete_temporary_purchase_group_items');


    // Purchase Operation
    Route::resource('purchase_operation', 'Purchase\OperationController');
    Route::get('purchase_operation_create/{id}', array('as' => 'purchase_operation_create', 'uses' => 'Purchase\OperationController@operation_create'));
    Route::post('update_purchase_operation_items', 'Purchase\OperationController@UpdatePurchaseOperationItems');

    // Purchase Operation Group Invoice
    Route::resource('group_invoice_operation', 'Purchase\GroupInvoiceOperationController');
    Route::get('group_operation_create/{id}', 'Purchase\GroupInvoiceOperationController@group_operation_create')->name('group_operation_create');


    // Arrival Management 
    Route::resource('arrival_management', 'Purchase\ArrivalManagementController');
    Route::get('arrival_management_create/{id}', array('as' => 'arrival_management_create', 'uses' => 'Purchase\ArrivalManagementController@arrival_management_create'));
    Route::post('update_arrival_items', 'Purchase\ArrivalManagementController@UpdateArrivalItems');

    Route::resource('purchase_journal', 'Purchase\PurchaseJournalController');
    Route::resource('purchase_account_payable', 'Purchase\PurchaseAccountPayableController');

    Route::resource('group_invoice', 'Purchase\GroupInvoiceController');
    // Arrival Management  Group Invoice
    Route::resource('group_invoice_arrival_management', 'Purchase\GroupInvoiceArrivalManagementController');
    Route::get('group_invoice_arrival_management_create/{id}', 'Purchase\GroupInvoiceArrivalManagementController@group_invoice_arrival_management_create')->name('group_invoice_arrival_management_create');


    // Cash Sales Invoice 
    Route::resource('cash_sales_invoices', 'CashSales\CashSalesInvoicesController');

    // Sales Return 
    Route::resource('sales_return', 'SalesReturn\SalesReturnController');
    Route::get('select_return_invoice/{id}', array('as' => 'select_return_invoice', 'uses' => 'SalesReturn\SalesReturnController@SelectReturnInvoice'));
    Route::resource('sales_return_item', 'SalesReturn\SalesReturnItemController');
    Route::get('save_sales_return_item/{id}', array('as' => 'save_sales_return_item', 'uses' => 'SalesReturn\SalesReturnItemController@SaveSalesReturnItem'));
    Route::get('remove_sales_return_item/{id}', array('as' => 'remove_sales_return_item', 'uses' => 'SalesReturn\SalesReturnItemController@RemoveSalesReturnItem'));
    Route::post('update_sales_return_item_description', 'SalesReturn\SalesReturnItemController@update_sales_return_item_description');
    Route::post('update_sales_return_item_unit_price', 'SalesReturn\SalesReturnItemController@update_sales_return_item_unit_price');


    // Inventory
    Route::resource('inventory_dashboard', 'Inventory\InventoryDashboard');
    Route::resource('inventory', 'Inventory\InventoryController');
    Route::resource('inventory_shipping', 'Inventory\ShippingController');
    Route::resource('chassis_management', 'Inventory\ChassisManagementController');
    Route::get('create_chassis_management/{id}', 'Inventory\ChassisManagementController@CreateChassisManagement')->name('create_chassis_management');
    Route::post('import_shipping_chassis_management', 'Inventory\ChassisManagementController@importShippingChassisManagement')->name('import_shipping_chassis_management');


    // Spare Part 
    Route::resource('spare_part_item', 'SpareParts\ItemController');
    Route::get('get_spare_part_item_ajax/{id}', 'SpareParts\ItemController@getSparePartItemAjax')->name('get_spare_part_item_ajax');
    Route::post('spare_part_item_import', 'SpareParts\ItemController@item_import')->name('spare_part_item_import');

    Route::resource('spare_part_sale_invoice', 'SpareParts\PartSaleInvoiceController');
    Route::resource('temporary_part_item', 'SpareParts\TemporaryPartItemController');
    Route::get('get_temporary_part_item', 'SpareParts\TemporaryPartItemController@index')->name('get_temporary_part_item');
    Route::post('add_temporary_part_item', 'SpareParts\TemporaryPartItemController@store')->name('add_temporary_part_item');
    Route::get('temporary_part_items_remove/{id}', 'SpareParts\TemporaryPartItemController@remove')->name('temporary_part_items_remove');

    Route::resource('part_sale_items', 'SpareParts\PartSaleItemController');
    Route::get('remove_part_sale_items/{id}', 'SpareParts\PartSaleItemController@remove')->name('remove_part_sale_items');


    Route::resource('spare_part_purchase_invoice', 'SpareParts\PartPurchaseController');
    Route::resource('spare_part_inventory_list', 'SpareParts\InventoryListController');


    Route::resource('department', 'DepartmentController');
    Route::resource('employee', 'EmployeeController');
    Route::get('emp_export', 'EmployeeController@emp_export')->name('emp_export');
    Route::resource('changepassword', 'ChangePasswordController');
    Route::resource('activity', 'Activity\ActivityLogController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');


    Route::resource('purchase_group_invoice', 'PurchaseGroup\PurchaseGroupInvoiceController');

    Route::get('purchase_group_invoice_create/{purchase_order_id}', [
        'as' => 'purchase_group_invoice_create',
        'uses' => 'PurchaseGroup\PurchaseGroupInvoiceController@purchase_group_invoice_create'
    ]);


    // Reporting 
    Route::resource('balace_sheet', 'Reporting\BalaceSheetController');
    Route::resource('profit_loss', 'Reporting\ProfitLossController');
    Route::resource('cash_trial', 'Reporting\CashTrialController');
    Route::resource('journal_entry', 'Reporting\JournalEntryController');
    Route::resource('trial', 'Reporting\TrialController');

    // Services Module 
    Route::resource('types_of_service', 'Service\TypesOfServiceController');
    Route::resource('service_invoice', 'Service\ServiceInvoiceController');
    Route::get('spare_part_service_invoice', 'Service\ServiceInvoiceController@spare_part_service_invoice')->name('spare_part_service_invoice');
});
