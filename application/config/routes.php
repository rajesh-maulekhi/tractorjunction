<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['admin'] = 'admins/Login';
$route['vendor'] = 'vendor/Login';
$route['vendor/on-road-price'] = 'vendor/Home/onRoadPriceShow';
$route['on-road-price'] = 'Search/OnRoadPricePage';
$route['compare-tractors'] = 'Compare_tractor';
$route['dealers-result'] = 'dealers_result';
$route['blog'] = 'Blog';
$route['questionanswer'] = 'Questions/ShowAllQuestions';
$route['post-answer/(:any)/(:any)'] = 'Questions/SingleQuestion/$1/$2';
$route['user-reviews/(:any)/(:any)'] = 'Reviews/user_reviews/$1/$2';
$route['reviews/(:any)/(:any)'] = 'Reviews/show_user_reviews/$1/$2';
$route['reviews-tractors'] = 'Reviews/user_reviewsDirect';
$route['blog/(:any)'] = 'Blog/SingleBlog/$1';
$route['dealers-results/(:any)'] = 'Dealers_search/findbybrand/$1';

$route['about'] = 'Informations_page/about_us';
// $route['tractor-demo-request'] = 'Demorequestpage';
$route['tractor-demo-request'] = 'Home';
$route['compare-tractor-result'] = 'Compare_new_result';
$route['compare-result/(:any)/(:any)/(:any)'] = 'Compare_tractor/CompareFourth/$1/$2/$3';
$route['compare-results/(:any)/(:any)/(:any)'] = 'Compare_tractor/CompareSearch/$1/$2/$3';
$route['find-tractor-dealers'] = 'Dealers_search';
$route['tractor-loan-emi-calculator'] = 'EmiCalculator';
$route['tractor-loan-emi-result'] = 'EmiCalculatorEnd';
$route['sitemap\.xml'] = "Sitemap";
$route['about-us'] = 'Informations_page/about_us';
$route['my-demo-request'] = 'Demorequestshow';
$route['my-onroad-request'] = 'Onroadrequestshow';
$route['contact-us'] = 'Informations_page/Contact_us';
$route['privacy-policy'] = 'Informations_page/Policy';
$route['guest-post'] = 'Informations_page/guest_post';
$route['career'] = 'Informations_page/career_page';
$route['advertise-with-us'] = 'Informations_page/advertise';
$route['used-tractors-for-rent'] = 'RentTractor/SearchPageIni';
$route['used-tractors-for-rent'] = 'RentTractor/SearchPageIni';
$route['add-used-tractor-for-rent'] = 'RentTractor';

//new urls
$route['tractor-service-centers'] = 'TractorServiceCenters';
$route['tractor-customer-care'] = 'TractorCustomerCare';
$route['confirmemailsub/(:any)/(:any)'] = 'Newsletter/ConfirmeMailSub/$1/$2';
$route['sell-used-tractor'] = 'OldTractor';
// $route['add-used-tractor-information'] = 'OldTractor/addOtherinfo';
$route['used-tractors-for-sell'] = 'OldTractor/ShowOldTractor';
$route['used-tractor/(:any)'] = 'OldTractor/singleUsedTractor/$1';
$route['add-rent-tractor'] = 'RentTractor';
$route['products/(:any)'] = 'RentTractor/ShowrentTractor/$1';
$route['rent-tractor-info/(:any)'] = 'RentTractor/singleRentTractor/$1';
$route['add-used-products-for-rent'] = 'RentTractor';
$route['tractor-products-on-rent'] = 'RentTractor/SearchPageIni';
$route['rent-tractor/(:any)'] = 'RentTractor/singleRentTractor/$1';
$route['add-used-tractor-implement'] = 'ImplementTractor';
$route['used-tractor-implements'] = 'ImplementTractor/ShowImplementsOld';
$route['used-tractor-implement/(:any)'] = 'ImplementTractor/ImplementsOldSingle/$1';
$route['tractor-combine-harvesters'] = 'ImplementTractor/ShowHarvesterTractor';
$route['harvester/(:any)'] = 'ImplementTractor/singleharvesterTractor/$1';
$route['update-Implements-tractor/(:any)'] = 'profile/editOldImplement/$1';

$route['tractor-finance'] = 'Finance';
$route['scheme/(:any)/(:any)'] = 'Finance/SingleScheme/$1/$2';
$route['tractor-insurance'] = 'Insurance';
$route['tractor-dealership-enquiry'] = 'DealershipEnquiry';
$route['tractor-news'] = 'NewsAndUpdate';
$route['tractor-news/(:any)/(:any)'] = 'NewsAndUpdate/singlenews/$1/$2';
$route['terms-and-condition'] = 'Informations_page/termcondition';
$route['my-profile'] = 'Login/MyProfile';
$route['update-used-tractor/(:any)'] = 'Profile/update_old_tractor/$1';
$route['update-rent-tractor/(:any)'] = 'Profile/update_rent_tractor/$1';

$route['tractor-implements/(:any)'] = 'ImplementTractor/ImplementsNew/$1';
$route['tractor-implements'] = 'ImplementTractor/AllTractorImplementSearch';
$route['implement/(:any)'] = 'ImplementTractor/ImplementsNewSingle/$1';
$route['status-change/(:any)'] = 'Profile/UpadterentTractorStatus/$1';
$route['status-change-available/(:any)'] = 'Profile/UpadterentTractorStatusavailable/$1';
$route['popular-tractors'] = 'Search/PopularTractor';
$route['popular-tractor'] = 'Search/PopularTractor';
$route['user-registration'] = 'Search/UserRegistration';
$route['user-registration-details'] = 'Search/UserRegistrationStepDetails';
$route['latest-tractors'] = 'Search/LatestTractor';
$route['latest-tractor'] = 'Search/LatestTractor';
$route['upcoming-tractors'] = 'Search/UpcomingTractor';
$route['upcoming-tractor'] = 'Search/UpcomingTractor';

$route['centers/(:any)/(:any)'] = 'TractorServiceCenters/FilterBystaeandBrand/$1/$2';
$route['centers/(:any)'] = 'TractorServiceCenters/FilterByBrand/$1';
$route['add-used-tractor-rent-admin'] = 'admins/SemiAdmin/AdUsedTractorEnd';
$route['add-used-tractor-sell-admin'] = 'admins/SemiAdmin/AdUsedTractorForSell';
//new urls

$route['special-tractor-offers'] = 'Offer';
$route['tractors'] = 'Search';
$route['Single_link'] = 'Search/SingleT';
$route['tractor-features-and-specifications/(:any)'] = 'Search/TractorFeaturesSpecifications/$1';
$route['tractor-models'] = 'Search/AdvanceSearch';
$route['search-tractor/(:any)/(:any)'] = 'Search/brandsSearch/$1/$2';
$route['View_brand'] = 'Search/brandsSearchForError';
$route['brand/(:any)/(:any)'] = 'Search/brandsSearch/$1/$2';
$route['product/(:any)/(:any)'] = 'Search/SingleTractorPage/$1/$2';
$route['product/(:any)/(:any)/(:any)'] = 'Search/SingleTractorPageForError/$1/$2/$3';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//admin URL
$route['admins/add-service-center'] = 'admins/ServiceCenter';
$route['admins/show-service-center'] = 'admins/ServiceCenter/show_service_center';
$route['admins/edit-service-center/(:any)'] = 'admins/ServiceCenter/edit_service_center/$1';
$route['admins/add-customer-care'] = 'admins/CustomerCare';
$route['admins/show-customer-care'] = 'admins/CustomerCare/show_CustomerCare';
$route['admins/edit-customer-care/(:any)'] = 'admins/CustomerCare/edit_CustomerCare/$1';
$route['admins/show-newsletter-users'] = 'admins/ShowNewsletterUsers';
$route['admins/unsubscribe-users/(:any)'] = 'admins/ShowNewsletterUsers/unsubscribe/$1';
$route['admins/newsletter'] = 'admins/ShowNewsletterUsers/SendMessage';
$route['admins/news-update'] = 'admins/NewsAndUpdate';
$route['admins/show-news-update'] = 'admins/NewsAndUpdate/show_NewsAndUpdate';
$route['admins/edit-news/(:any)'] = 'admins/NewsAndUpdate/edit_news/$1';
$route['admins/list-old-tractors'] = 'admins/ListOldTractor';
$route['admins/view-old-tractor/(:any)'] = 'admins/ListOldTractor/view/$1';
$route['admins/edit-old-tractor/(:any)'] = 'admins/ListOldTractor/edit/$1';
$route['admins/list-rent-tractors'] = 'admins/ListRentTractor';
$route['admins/view-rent-tractor/(:any)'] = 'admins/ListRentTractor/view/$1';

$route['admins/list-implement-tractors'] = 'admins/ImplementTractor/ShowImplementsOld';

$route['admins/view-single-implement-tractor/(:any)'] = 'admins/ImplementTractor/singleOldImplements/$1';




$route['admins/list-Dealership-enquiry'] = 'admins/ListDealershipEnquiry';
$route['admins/view-dealership-tractor/(:any)'] = 'admins/ListDealershipEnquiry/view/$1';
$route['admins/insurance-tractor'] = 'admins/ListInsuranceTractor';
$route['admins/view-insurance-tractor/(:any)'] = 'admins/ListInsuranceTractor/view/$1';
$route['admins/finance-tractor'] = 'admins/ListFinanceTractor';
$route['admins/view-finance-tractor/(:any)'] = 'admins/ListFinanceTractor/view/$1';
$route['admins/buy-old-tractors-details'] = 'admins/PurchaseDetails';
$route['admins/view-old-tractor-purchase-details/(:any)'] = 'admins/PurchaseDetails/singleOld/$1';
$route['admins/buy-rent-tractors-details'] = 'admins/PurchaseDetails/ListRentTractorDetails';
$route['admins/view-rent-tractor-purchase-details/(:any)'] = 'admins/PurchaseDetails/singleRent/$1';
$route['admins/add-insurance-tractor-scheme'] = 'admins/ListInsuranceTractor/scheme';
$route['admins/add-finance-tractor-scheme'] = 'admins/ListFinanceTractor/scheme';
$route['admins/list-tractor-scheme'] = 'admins/ListFinanceTractor/ListTractorScheme';
$route['admins/view-tractor-scheme/(:any)'] = 'admins/ListFinanceTractor/ViewTractorScheme/$1';
$route['admins/edit-tractor-scheme/(:any)'] = 'admins/ListFinanceTractor/EditTractorScheme/$1';


$route['admins/add-harvester'] = 'admins/ImplementTractor';
$route['admins/show-harvester'] = 'admins/ImplementTractor/showharvesterList';
$route['admins/edit-harvester/(:any)'] = 'admins/ImplementTractor/editHarvesterNew/$1';

$route['admins/buy-implements-tractors-details'] = 'admins/PurchaseDetails/ListImplementTractorDetails';
$route['admins/view-implement-tractor-purchase-details/(:any)'] = 'admins/PurchaseDetails/singleimplemnt/$1';

$route['admins/show-implement-list'] = 'admins/ImplementTractor/showImplementListNew';
$route['admins/edit-implement-new/(:any)'] = 'admins/ImplementTractor/edit_ImplementNew/$1';


$route['admins/add-field-title'] = 'admins/ImplementTractor/addField';
$route['admins/add-fields'] = 'admins/ImplementTractor/addFieldsName';
$route['admins/show-field-title'] = 'admins/ImplementTractor/showField';
$route['admins/show-fields'] = 'admins/ImplementTractor/showFieldsname';
$route['admins/edit-field-title/(:any)'] = 'admins/ImplementTractor/editField/$1';
$route['admins/edit-field-name/(:any)'] = 'admins/ImplementTractor/editFieldName/$1';

$route['admins/add-implement'] = 'admins/ImplementTractor/Add_implementsNew';
$route['admins/compare-front'] = 'admins/CompareFront';


$route['admins/harvester-on-road-request'] = 'admins/ImplementRequest/harvesterrequest';
$route['admins/harvester-demo-request'] = 'admins/ImplementRequest/harvesterrequestDemo';
$route['admins/implement-on-road-request'] = 'admins/ImplementRequest/implementonroadReq';
$route['admins/implement-demo-request'] = 'admins/ImplementRequest/implementDemoReq';
$route['admins/request-single/(:any)'] = 'admins/ImplementRequest/ShowSingleHArvesterRequest/$1';
$route['admins/request-reply/(:any)'] = 'admins/ImplementRequest/ReplySingleHArvesterRequest/$1';



$route['admins/implement-request'] = 'admins/ImplementRequest/Implementrequest';
$route['admins/add-semi-admin'] = 'admins/SemiAdmin/AddAdmin';
$route['admins/show-semi-admin'] = 'admins/SemiAdmin/ShowAdmin';










?>