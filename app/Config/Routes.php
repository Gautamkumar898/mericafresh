<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'SuperAdmin::index');
$routes->add('', 'Home::register_company');

#Home page 
$routes->add('register-company', 'Home::company_register');
$routes->add('veryfiy-email', 'Home::email_verify');
// Frontend Design 

// Farmer Dashboard 1
$routes->add('company-login', 'CompanyAdmin::farmer_login');
$routes->add('farmer-dashboard', 'CompanyAdmin::index');
$routes->add('verify-email', 'CompanyAdmin::email_verify');
$routes->add('forget-password', 'CompanyAdmin::forget_password');

#DashBoard Work 
$routes->add('add-category', 'CompanyAdmin::add_category');
// Super Admin 3
$routes->add('authenticate-admin', 'SuperAdmin::authenticate');
$routes->add('admin-dashboard', 'SuperAdmin::index');
$routes->add('super-admin-login', 'SuperAdmin::super_adminlogin');
$routes->add('admin-logout', 'SuperAdmin::admin_logout');
$routes->add('admin-change-password','SuperAdmin::admin_change_password');
$routes->post('change-password-admin','SuperAdmin::update_password');
$routes->post('update-admin-profile','SuperAdmin::update_admin_profile');



#Category 
$routes->add('category-page', 'SuperAdmin::category_page');
$routes->add('insert-category', 'SuperAdmin::insert_category');
$routes->add('edit-category/(:any)', 'SuperAdmin::edit_category/$1');
$routes->add('delete-category/(:any)', 'SuperAdmin::delete_category/$1');
$routes->add('category-list', 'SuperAdmin::listOfCategory');
$routes->add('category-list', 'SuperAdmin::listOfCategory');
#Product 
$routes->add('insert-product', 'ProductController::insert_product');
$routes->add('add-product', 'ProductController::addproduct_page');
$routes->add('product-list', 'ProductController::listOfproduct');
$routes->add('edit-product/(:any)', 'ProductController::edit_product/$1');
$routes->add('delete-product/(:any)', 'ProductController::delete_product/$1');


#user Produce
$routes->add('updateuser-produce/(:any)','FarmerproductController::adduser_produce/$1');
$routes->add('user-producelist/(:any)','FarmerproductController::produceofusers/$1');
$routes->add('addnew-produce','ProductController::extraadd');
$routes->add('produce-details','FarmerproductController::produce_details');
$routes->add('other-produce','FarmerproductController::other_produce');
$routes->add('category-byproduce','FarmerproductController::category_by_produce');
$routes->add('insert-userproduce','FarmerproductController::insert_user_produce');


#Add Farmer 
$routes->add('get-farmer-data','SuperAdmin::get_farmer_details');
$routes->add('update-farmer-data','SuperAdmin::update_farmerdata');
$routes->add('find-city','SuperAdmin::getCountyStateByZipCode');
$routes->add('insert-farmer', 'SuperAdmin::insert_farmer');
$routes->add('update-farmer','SuperAdmin::update_farmer');
$routes->add('add-farmer', 'SuperAdmin::addfarmer_page');
$routes->add('farmer-list', 'SuperAdmin::listOffarmer');
$routes->add('edit-farmer/(:any)', 'SuperAdmin::edit_farmer/$1');
$routes->add('delete-farmer/(:any)', 'SuperAdmin::delete_farmer/$1');

#farmer Product List 
$routes->add('farmer-data','ProductController::farmerProductList');
$routes->add('farmer-produce','ProductController::farmerProduct');



#product


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
