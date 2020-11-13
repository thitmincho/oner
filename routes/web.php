<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
// API route group
$router->group([
    // 'middleware' => 'api',
    'prefix' => 'api'
], function () use ($router) {
    $router->post('registers', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    
    
});
// API route group
$router->group([
    'middleware' => ['auth:api','lvl'],
    'prefix' => 'api'
], function () use ($router) {    
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');

    $router->post('users', 'UserController@all');
    $router->post('users/add', 'UserController@add');
    $router->post('users/{id}', 'UserController@get');
    $router->post('users/{id}/update', 'UserController@put');
    $router->post('users/{id}/remove', 'UserController@remove');
    
    $router->post('employees', 'EmployeeController@all');
    $router->post('employees/add', 'EmployeeController@add');
    $router->post('employees/{id}', 'EmployeeController@get');
    $router->post('employees/{id}/update', 'EmployeeController@put');
    $router->post('employees/{id}/remove', 'EmployeeController@remove');

    $router->post('roles', 'RoleController@all');
    $router->post('roles/add', 'RoleController@add');
    $router->post('roles/{id}', 'RoleController@get');
    $router->post('roles/{id}/update', 'RoleController@put');
    $router->post('roles/{id}/remove', 'RoleController@remove');

    $router->post('departments', 'DepartmentController@all');
    $router->post('departments/add', 'DepartmentController@add');
    $router->post('departments/{id}', 'DepartmentController@get');
    $router->post('departments/{id}/update', 'DepartmentController@put');
    $router->post('departments/{id}/remove', 'DepartmentController@remove');

    $router->post('positions', 'PositionController@all');
    $router->post('positions/add', 'PositionController@add');
    $router->post('positions/{id}', 'PositionController@get');
    $router->post('positions/{id}/update', 'PositionController@put');
    $router->post('positions/{id}/remove', 'PositionController@remove');

    $router->post('doctors', 'DoctorController@all');
    $router->post('doctors/add', 'DoctorController@add');
    $router->post('doctors/{id}', 'DoctorController@get');
    $router->post('doctors/{id}/update', 'DoctorController@put');
    $router->post('doctors/{id}/remove', 'DoctorController@remove');

    $router->post('patients', 'PatientController@all');
    $router->post('patients/add', 'PatientController@add');
    $router->post('patients/{id}', 'PatientController@get');
    $router->post('patients/{id}/update', 'PatientController@put');
    $router->post('patients/{id}/remove', 'PatientController@remove');

    $router->post('appointments', 'AppointmentController@all');
    $router->post('appointments/add', 'AppointmentController@add');
    $router->post('appointments/{id}', 'AppointmentController@get');
    $router->post('appointments/{id}/update', 'AppointmentController@put');
    $router->post('appointments/{id}/remove', 'AppointmentController@remove');

    $router->post('medical_records', 'MedicalRecordController@all');
    $router->post('medical_records/add', 'MedicalRecordController@add');
    $router->post('medical_records/{id}', 'MedicalRecordController@get');
    $router->post('medical_records/{id}/update', 'MedicalRecordController@put');
    $router->post('medical_records/{id}/remove', 'MedicalRecordController@remove');

    $router->post('suppliers', 'SupplierController@all');
    $router->post('suppliers/add', 'SupplierController@add');
    $router->post('suppliers/{id}', 'SupplierController@get');
    $router->post('suppliers/{id}/update', 'SupplierController@put');
    $router->post('suppliers/{id}/remove', 'SupplierController@remove');

    $router->post('pharmacy_categorys', 'PharmacyCategoryController@all');
    $router->post('pharmacy_categorys/add', 'PharmacyCategoryController@add');
    $router->post('pharmacy_categorys/{id}', 'PharmacyCategoryController@get');
    $router->post('pharmacy_categorys/{id}/update', 'PharmacyCategoryController@put');
    $router->post('pharmacy_categorys/{id}/remove', 'PharmacyCategoryController@remove');

    $router->post('pharmacy_items', 'PharmacyItemController@all');
    $router->post('pharmacy_items/add', 'PharmacyItemController@add');
    $router->post('pharmacy_items/{id}', 'PharmacyItemController@get');
    $router->post('pharmacy_items/{id}/update', 'PharmacyItemController@put');
    $router->post('pharmacy_items/{id}/remove', 'PharmacyItemController@remove');
    
    $router->post('pharmacy_sales', 'PharmacySaleController@all');
    $router->post('pharmacy_sales/add', 'PharmacySaleController@add');
    $router->post('pharmacy_sales/{id}', 'PharmacySaleController@get');
    $router->post('pharmacy_sales/{id}/update', 'PharmacySaleController@put');
    $router->post('pharmacy_sales/{id}/remove', 'PharmacySaleController@remove');

    $router->post('pharmacy_sale_receipts', 'PharmacySaleReceiptController@all');
    $router->post('pharmacy_sale_receipts/add', 'PharmacySaleReceiptController@add');
    $router->post('pharmacy_sale_receipts/{id}', 'PharmacySaleReceiptController@get');
    $router->post('pharmacy_sale_receipts/{id}/update', 'PharmacySaleReceiptController@put');
    $router->post('pharmacy_sale_receipts/{id}/remove', 'PharmacySaleReceiptController@remove');
    
    $router->post('pharmacy_sale_items', 'PharmacySaleItemController@all');
    $router->post('pharmacy_sale_items/add', 'PharmacySaleItemController@add');
    $router->post('pharmacy_sale_items/{id}', 'PharmacySaleItemController@get');
    $router->post('pharmacy_sale_items/{id}/update', 'PharmacySaleItemController@put');
    $router->post('pharmacy_sale_items/{id}/remove', 'PharmacySaleItemController@remove');

    $router->post('pharmacy_purchases', 'PharmacyPurchaseController@all');
    $router->post('pharmacy_purchases/add', 'PharmacyPurchaseController@add');
    $router->post('pharmacy_purchases/{id}', 'PharmacyPurchaseController@get');
    $router->post('pharmacy_purchases/{id}/update', 'PharmacyPurchaseController@put');
    $router->post('pharmacy_purchases/{id}/remove', 'PharmacyPurchaseController@remove');

    $router->post('pharmacy_purchase_items', 'PharmacyPurchaseItemController@all');
    $router->post('pharmacy_purchase_items/add', 'PharmacyPurchaseItemController@add');
    $router->post('pharmacy_purchase_items/{id}', 'PharmacyPurchaseItemController@get');
    $router->post('pharmacy_purchase_items/{id}/update', 'PharmacyPurchaseItemController@put');
    $router->post('pharmacy_purchase_items/{id}/remove', 'PharmacyPurchaseItemController@remove');

    $router->post('pharmacy_purchase_payments', 'PharmacyPurchasePaymentController@all');
    $router->post('pharmacy_purchase_payments/add', 'PharmacyPurchasePaymentController@add');
    $router->post('pharmacy_purchase_payments/{id}', 'PharmacyPurchasePaymentController@get');
    $router->post('pharmacy_purchase_payments/{id}/update', 'PharmacyPurchasePaymentController@put');
    $router->post('pharmacy_purchase_payments/{id}/remove', 'PharmacyPurchasePaymentController@remove');

    $router->post('pharmacy_issues', 'PharmacyIssueController@all');
    $router->post('pharmacy_issues/add', 'PharmacyIssueController@add');
    $router->post('pharmacy_issues/{id}', 'PharmacyIssueController@get');
    $router->post('pharmacy_issues/{id}/update', 'PharmacyIssueController@put');
    $router->post('pharmacy_issues/{id}/remove', 'PharmacyIssueController@remove');
    
    $router->post('pharmacy_issue_items', 'PharmacyIssueItemController@all');
    $router->post('pharmacy_issue_items/add', 'PharmacyIssueItemController@add');
    $router->post('pharmacy_issue_items/{id}', 'PharmacyIssueItemController@get');
    $router->post('pharmacy_issue_items/{id}/update', 'PharmacyIssueItemController@put');
    $router->post('pharmacy_issue_items/{id}/remove', 'PharmacyIssueItemController@remove');

    $router->post('pharmacy_inventorys', 'PharmacyInventoryController@all');
    $router->post('pharmacy_inventorys/add', 'PharmacyInventoryController@add');
    $router->post('pharmacy_inventorys/{id}', 'PharmacyInventoryController@get');
    $router->post('pharmacy_inventorys/{id}/update', 'PharmacyInventoryController@put');
    $router->post('pharmacy_inventorys/{id}/remove', 'PharmacyInventoryController@remove');

    $router->post('pharmacy_warehouses', 'PharmacyWarehouseController@all');
    $router->post('pharmacy_warehouses/add', 'PharmacyWarehouseController@add');
    $router->post('pharmacy_warehouses/{id}', 'PharmacyWarehouseController@get');
    $router->post('pharmacy_warehouses/{id}/update', 'PharmacyWarehouseController@put');
    $router->post('pharmacy_warehouses/{id}/remove', 'PharmacyWarehouseController@remove');

    $router->post('prescriptions', 'PrescriptionController@all');
    $router->post('prescriptions/add', 'PrescriptionController@add');
    $router->post('prescriptions/{id}', 'PrescriptionController@get');
    $router->post('prescriptions/{id}/update', 'PrescriptionController@put');
    $router->post('prescriptions/{id}/remove', 'PrescriptionController@remove');

    $router->post('diagnosis_requests', 'DiagnosisRequestController@all');
    $router->post('diagnosis_requests/add', 'DiagnosisRequestController@add');
    $router->post('diagnosis_requests/{id}', 'DiagnosisRequestController@get');
    $router->post('diagnosis_requests/{id}/update', 'DiagnosisRequestController@put');
    $router->post('diagnosis_requests/{id}/remove', 'DiagnosisRequestController@remove');

    $router->post('diagnosis_request_items', 'DiagnosisRequestItemController@all');
    $router->post('diagnosis_request_items/add', 'DiagnosisRequestItemController@add');
    $router->post('diagnosis_request_items/{id}', 'DiagnosisRequestItemController@get');
    $router->post('diagnosis_request_items/{id}/update', 'DiagnosisRequestItemController@put');
    $router->post('diagnosis_request_items/{id}/remove', 'DiagnosisRequestItemController@remove');

    $router->post('diagnosis_reports', 'DiagnosisReportController@all');
    $router->post('diagnosis_reports/add', 'DiagnosisReportController@add');
    $router->post('diagnosis_reports/{id}', 'DiagnosisReportController@get');
    $router->post('diagnosis_reports/{id}/update', 'DiagnosisReportController@put');
    $router->post('diagnosis_reports/{id}/remove', 'DiagnosisReportController@remove');

    $router->post('diagnosis_report_items', 'DiagnosisReportItemController@all');
    $router->post('diagnosis_report_items/add', 'DiagnosisReportItemController@add');
    $router->post('diagnosis_report_items/{id}', 'DiagnosisReportItemController@get');
    $router->post('diagnosis_report_items/{id}/update', 'DiagnosisReportItemController@put');
    $router->post('diagnosis_report_items/{id}/remove', 'DiagnosisReportItemController@remove');

    $router->post('opd_rooms', 'OPDRoomController@all');
    $router->post('opd_rooms/add', 'OPDRoomController@add');
    $router->post('opd_rooms/{id}', 'OPDRoomController@get');
    $router->post('opd_rooms/{id}/update', 'OPDRoomController@put');
    $router->post('opd_rooms/{id}/remove', 'OPDRoomController@remove');

    $router->post('service_categorys', 'ServiceCategoryController@all');
    $router->post('service_categorys/add', 'ServiceCategoryController@add');
    $router->post('service_categorys/{id}', 'ServiceCategoryController@get');
    $router->post('service_categorys/{id}/update', 'ServiceCategoryController@put');
    $router->post('service_categorys/{id}/remove', 'ServiceCategoryController@remove');

    $router->post('service_items', 'ServiceItemController@all');
    $router->post('service_items/add', 'ServiceItemController@add');
    $router->post('service_items/{id}', 'ServiceItemController@get');
    $router->post('service_items/{id}/update', 'ServiceItemController@put');
    $router->post('service_items/{id}/remove', 'ServiceItemController@remove');

    $router->post('bills', 'BillController@all');
    $router->post('bills/add', 'BillController@add');
    $router->post('bills/{id}', 'BillController@get');
    $router->post('bills/{id}/update', 'BillController@put');
    $router->post('bills/{id}/remove', 'BillController@remove');

    $router->post('bill_service_items', 'BillServiceItemController@all');
    $router->post('bill_service_items/add', 'BillServiceItemController@add');
    $router->post('bill_service_items/{id}', 'BillServiceItemController@get');
    $router->post('bill_service_items/{id}/update', 'BillServiceItemController@put');
    $router->post('bill_service_items/{id}/remove', 'BillServiceItemController@remove');

    $router->post('bill_service_receipt', 'BillServiceReceiptController@all');
    $router->post('bill_service_receipt/add', 'BillServiceReceiptController@add');
    $router->post('bill_service_receipt/{id}', 'BillServiceReceiptController@get');
    $router->post('bill_service_receipt/{id}/update', 'BillServiceReceiptController@put');
    $router->post('bill_service_receipt/{id}/remove', 'BillServiceReceiptController@remove');
    
});