<?php

use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('React.build');
});

Route::get('/admin', function () {
    return view('auth.login');
});

//  LOGIN
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@authenticate');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');

    //CONVERGE
    Route::get('/converge', 'App\Http\Controllers\ConvergeController@index')->name('converge-index');

    //CONVERGE TOPIC
    Route::get('/add_converge_topic', 'App\Http\Controllers\ConvergeTopicController@add')->name('add_converge_topic');
    Route::post('/save_converge_topic', 'App\Http\Controllers\ConvergeTopicController@insert')->name('save_converge_topic');
    Route::get('/edit_topic/{id}', 'App\Http\Controllers\ConvergeTopicController@edit')->name('edit_topic');
    Route::post('/update_topic/{id}', 'App\Http\Controllers\ConvergeTopicController@update')->name('update_topic');
    Route::get('/delete_topic/{id}', 'App\Http\Controllers\ConvergeTopicController@delete')->name('delete_topic');

    //COLLABORATE HEADING
    Route::get('/collaborate_heading', 'App\Http\Controllers\CollaborateController@collaborate_heading')->name('collaborate_heading');

    //COLLABORATE PORTFOLIO
    Route::get('/collaborate_portfolio', 'App\Http\Controllers\CollaborateController@collaborate_portfolio')->name('collaborate_portfolio');
    Route::get('/add_portfolio', 'App\Http\Controllers\CollaborateController@add_portfolio')->name('add_portfolio');
    Route::post('/save_portfolio', 'App\Http\Controllers\CollaborateController@save_portfolio')->name('save_portfolio');
    Route::get('/view_portfolio/{id}', 'App\Http\Controllers\CollaborateController@view_portfolio')->name('view_portfolio');
    Route::get('/edit_portfolio/{id}', 'App\Http\Controllers\CollaborateController@edit_portfolio')->name('edit_portfolio');
    Route::post('/update_portfolio/{id}', 'App\Http\Controllers\CollaborateController@update_portfolio')->name('update_portfolio');
    Route::post('/image_upload/{id}', 'App\Http\Controllers\CollaborateController@image_upload')->name('image_upload');
    Route::get('/delete_image/{id}', 'App\Http\Controllers\CollaborateController@deleteImage')->name('delete_image');
    Route::get('/delete_portfolio/{id}', 'App\Http\Controllers\CollaborateController@delete_portfolio')->name('delete_portfolio');
    Route::get('/portfolio_projects', 'App\Http\Controllers\CollaborateController@portfolio_projects')->name('portfolio_projects');
    Route::get('/archive_projects', 'App\Http\Controllers\CollaborateController@archive_projects')->name('archive_projects');

    //COGITATE HEADING
    Route::get('/cogitate_heading', 'App\Http\Controllers\CogitateController@cogitate_heading')->name('cogitate_heading');

    //COGITATE SERVICE
    Route::get('/serviceIndex', 'App\Http\Controllers\CogitateController@serviceIndex')->name('serviceIndex');
    Route::get('/add_service', 'App\Http\Controllers\CogitateController@add_service')->name('add_service');
    Route::post('/save_service', 'App\Http\Controllers\CogitateController@save_service')->name('save_service');
    Route::get('/edit_service/{id}', 'App\Http\Controllers\CogitateController@edit_service')->name('edit_service');
    Route::post('/update_service/{id}', 'App\Http\Controllers\CogitateController@update_service')->name('update_service');
    Route::get('/delete_service/{id}', 'App\Http\Controllers\CogitateController@delete_service')->name('delete_service');

    //COGITATE SERVICE LINK
    Route::get('/serviceLinkIndex', 'App\Http\Controllers\CogitateController@serviceLinkIndex')->name('serviceLinkIndex');
    Route::get('/add_serviceLink', 'App\Http\Controllers\CogitateController@add_serviceLink')->name('add_serviceLink');
    Route::post('/save_serviceLink', 'App\Http\Controllers\CogitateController@save_serviceLink')->name('save_serviceLink');
    Route::get('/edit_serviceLink/{id}', 'App\Http\Controllers\CogitateController@edit_serviceLink')->name('edit_serviceLink');
    Route::post('/update_serviceLink/{id}', 'App\Http\Controllers\CogitateController@update_serviceLink')->name('update_serviceLink');
    Route::get('/delete_serviceLink/{id}', 'App\Http\Controllers\CogitateController@delete_serviceLink')->name('delete_serviceLink');

    //COMMUNICATE HEADING
    Route::get('/communicate_heading', 'App\Http\Controllers\CommunicateController@communicate_heading')->name('communicate_heading');

    //COMMUNICATE MESSAGE
    Route::get('/communicate_message', 'App\Http\Controllers\CommunicateController@communicate_message')->name('communicate_message');
    Route::get('/update_readStatus', 'App\Http\Controllers\CommunicateController@update_readStatus')->name('update_readStatus');
    Route::get('/messageData/{id}', 'App\Http\Controllers\CommunicateController@messageData')->name('messageData');
    Route::get('/messageDetails/{id}', 'App\Http\Controllers\CommunicateController@messageDetails')->name('messageDetails');
    Route::get('/view_data/{id}', 'App\Http\Controllers\CommunicateController@view_data')->name('view_data');

    //PARTNERS
    Route::get('/partners', 'App\Http\Controllers\ConvergeLinkController@index')->name('partners-index');
    Route::get('/partnerData', 'App\Http\Controllers\ConvergeLinkController@partnerData')->name('partnerData');
    Route::get('/view_partner/{id}', 'App\Http\Controllers\ConvergeLinkController@view_partner')->name('view_partner');
    Route::get('/add_converge_link', 'App\Http\Controllers\ConvergeLinkController@add')->name('add_converge_link');
    Route::post('/save_converge_link', 'App\Http\Controllers\ConvergeLinkController@insert')->name('save_converge_link');
    Route::get('/edit_link/{id}', 'App\Http\Controllers\ConvergeLinkController@edit')->name('edit_link');
    Route::post('/update_link/{id}', 'App\Http\Controllers\ConvergeLinkController@update')->name('update_link');
    Route::get('/delete_link/{id}', 'App\Http\Controllers\ConvergeLinkController@delete')->name('delete_link');

    //content
    Route::get('/content/{page}', 'App\Http\Controllers\ContentController@index')->name('content-index');
    Route::get('/add_content/{page}', 'App\Http\Controllers\ContentController@add_content')->name('add_content');
    Route::post('/set_content', 'App\Http\Controllers\ContentController@set_content')->name('set_content');
    Route::get('/delete_content/{page}/{id}', 'App\Http\Controllers\ContentController@delete_content')->name('delete_content');
    Route::get('/edit_content/{page}/{id}', 'App\Http\Controllers\ContentController@edit_content')->name('edit_content');
    Route::post('/update_content/{id}', 'App\Http\Controllers\ContentController@update_content')->name('update_content');

    //HEADING
    Route::get('/heading/{page}', 'App\Http\Controllers\ContentController@heading')->name('heading');
    Route::get('/update_heading/{type}', 'App\Http\Controllers\HeadingController@update_heading')->name('update_heading');
    Route::post('/heading_update', 'App\Http\Controllers\HeadingController@heading_update')->name('heading_update');


    //OTHER 

    Route::get('/apps-calendar', function () {
        return view('apps-calendar');
    });
    Route::get('/apps-chat', function () {
        return view('apps-chat');
    });
    Route::get('/apps-mailbox', function () {
        return view('apps-mailbox');
    });
    Route::get('/apps-email-basic', function () {
        return view('apps-email-basic');
    });
    Route::get('/apps-email-ecommerce', function () {
        return view('apps-email-ecommerce');
    });
    Route::get('/apps-ecommerce-products', function () {
        return view('apps-ecommerce-products');
    });
    Route::get('/apps-ecommerce-product-details', function () {
        return view('apps-ecommerce-product-details');
    });
    Route::get('/apps-ecommerce-add-product', function () {
        return view('apps-ecommerce-add-product');
    });
    Route::get('/apps-ecommerce-orders', function () {
        return view('apps-ecommerce-orders');
    });
    Route::get('/apps-ecommerce-order-details', function () {
        return view('apps-ecommerce-order-details');
    });
    Route::get('/apps-ecommerce-customers', function () {
        return view('apps-ecommerce-customers');
    });
    Route::get('/apps-ecommerce-cart', function () {
        return view('apps-ecommerce-cart');
    });
    Route::get('/apps-ecommerce-checkout', function () {
        return view('apps-ecommerce-checkout');
    });
    Route::get('/apps-ecommerce-sellers', function () {
        return view('apps-ecommerce-sellers');
    });
    Route::get('/apps-ecommerce-seller-details', function () {
        return view('apps-ecommerce-seller-details');
    });
    Route::get('/apps-projects-list', function () {
        return view('apps-projects-list');
    });
    Route::get('/apps-projects-overview', function () {
        return view('apps-projects-overview');
    });
    Route::get('/apps-projects-create', function () {
        return view('apps-projects-create');
    });
    Route::get('/apps-tasks-kanban', function () {
        return view('apps-tasks-kanban');
    });
    Route::get('/apps-tasks-list-view', function () {
        return view('apps-tasks-list-view');
    });
    Route::get('/apps-tasks-details', function () {
        return view('apps-tasks-details');
    });
    Route::get('/apps-crm-contacts', function () {
        return view('apps-crm-contacts');
    });
    Route::get('/apps-crm-companies', function () {
        return view('apps-crm-companies');
    });
    Route::get('/apps-crm-deals', function () {
        return view('apps-crm-deals');
    });
    Route::get('/apps-crm-leads', function () {
        return view('apps-crm-leads');
    });
    Route::get('/apps-crypto-transactions', function () {
        return view('apps-crypto-transactions');
    });
    Route::get('/apps-crypto-buy-sell', function () {
        return view('apps-crypto-buy-sell');
    });
    Route::get('/apps-crypto-wallet', function () {
        return view('apps-crypto-wallet');
    });
    Route::get('/apps-crypto-orders', function () {
        return view('apps-crypto-orders');
    });
    Route::get('/apps-crypto-ico', function () {
        return view('apps-crypto-ico');
    });
    Route::get('/apps-crypto-kyc', function () {
        return view('apps-crypto-kyc');
    });
    Route::get('/apps-invoices-list', function () {
        return view('apps-invoices-list');
    });
    Route::get('/apps-invoices-details', function () {
        return view('apps-invoices-details');
    });
    Route::get('/apps-invoices-create', function () {
        return view('apps-invoices-create');
    });
    Route::get('/apps-tickets-list', function () {
        return view('apps-tickets-list');
    });
    Route::get('/apps-tickets-details', function () {
        return view('apps-tickets-details');
    });
    Route::get('/apps-nft-marketplace', function () {
        return view('apps-nft-marketplace');
    });
    Route::get('/apps-nft-explore', function () {
        return view('apps-nft-explore');
    });
    Route::get('/apps-nft-auction', function () {
        return view('apps-nft-auction');
    });
    Route::get('/apps-nft-item-details', function () {
        return view('apps-nft-item-details');
    });
    Route::get('/apps-nft-collections', function () {
        return view('apps-nft-collections');
    });
    Route::get('/apps-nft-creators', function () {
        return view('apps-nft-creators');
    });
    Route::get('/apps-nft-ranking', function () {
        return view('apps-nft-ranking');
    });
    Route::get('/apps-nft-wallet', function () {
        return view('apps-nft-wallet');
    });
    Route::get('/apps-nft-create', function () {
        return view('apps-nft-create');
    });
    Route::get('/apps-file-manager', function () {
        return view('apps-file-manager');
    });
    Route::get('/apps-todo', function () {
        return view('apps-todo');
    });
    Route::get('/apps-job-statistics', function () {
        return view('apps-job-statistics');
    });
    Route::get('/apps-job-lists', function () {
        return view('apps-job-lists');
    });
    Route::get('/apps-job-grid-lists', function () {
        return view('apps-job-grid-lists');
    });
    Route::get('/apps-job-details', function () {
        return view('apps-job-details');
    });
    Route::get('/apps-job-candidate-lists', function () {
        return view('apps-job-candidate-lists');
    });
    Route::get('/apps-job-candidate-grid', function () {
        return view('apps-job-candidate-grid');
    });
    Route::get('/apps-job-application', function () {
        return view('apps-job-application');
    });
    Route::get('/apps-job-new', function () {
        return view('apps-job-new');
    });
    Route::get('/apps-job-companies-lists', function () {
        return view('apps-job-companies-lists');
    });
    Route::get('/apps-job-categories', function () {
        return view('apps-job-categories');
    });
    Route::get('/apps-api-key', function () {
        return view('apps-api-key');
    });
    Route::get('/layouts-horizontal', function () {
        return view('layouts-horizontal');
    });
    Route::get('/layouts-detached', function () {
        return view('layouts-detached');
    });
    Route::get('/layouts-two-column', function () {
        return view('layouts-two-column');
    });
    Route::get('/layouts-vertical-hovered', function () {
        return view('layouts-vertical-hovered');
    });
    Route::get('/auth-signin-basic', function () {
        return view('auth-signin-basic');
    });
    Route::get('/auth-signin-cover', function () {
        return view('auth-signin-cover');
    });
    Route::get('/auth-signup-basic', function () {
        return view('auth-signup-basic');
    });
    Route::get('/auth-signup-cover', function () {
        return view('auth-signup-cover');
    });
    Route::get('/auth-pass-reset-basic', function () {
        return view('auth-pass-reset-basic');
    });
    Route::get('/auth-pass-reset-cover', function () {
        return view('auth-pass-reset-cover');
    });
    Route::get('/auth-pass-change-basic', function () {
        return view('auth-pass-change-basic');
    });
    Route::get('/auth-pass-change-cover', function () {
        return view('auth-pass-change-cover');
    });
    Route::get('/auth-lockscreen-basic', function () {
        return view('auth-lockscreen-basic');
    });
    Route::get('/auth-lockscreen-cover', function () {
        return view('auth-lockscreen-cover');
    });
    Route::get('/auth-logout-basic', function () {
        return view('auth-logout-basic');
    });
    Route::get('/auth-logout-cover', function () {
        return view('auth-logout-cover');
    });
    Route::get('/auth-success-msg-basic', function () {
        return view('auth-success-msg-basic');
    });
    Route::get('/auth-success-msg-cover', function () {
        return view('auth-success-msg-cover');
    });
    Route::get('/auth-twostep-basic', function () {
        return view('auth-twostep-basic');
    });
    Route::get('/auth-twostep-cover', function () {
        return view('auth-twostep-cover');
    });
    Route::get('/auth-404-basic', function () {
        return view('auth-404-basic');
    });
    Route::get('/auth-404-cover', function () {
        return view('auth-404-cover');
    });
    Route::get('/auth-404-alt', function () {
        return view('auth-404-alt');
    });
    Route::get('/auth-500', function () {
        return view('auth-500');
    });
    Route::get('/auth-offline', function () {
        return view('auth-offline');
    });
    Route::get('/pages-starter', function () {
        return view('pages-starter');
    });
    Route::get('/pages-profile', function () {
        return view('pages-profile');
    });
    Route::get('/pages-profile-settings', function () {
        return view('pages-profile-settings');
    });
    Route::get('/pages-team', function () {
        return view('pages-team');
    });
    Route::get('/pages-timeline', function () {
        return view('pages-timeline');
    });
    Route::get('/pages-faqs', function () {
        return view('pages-faqs');
    });
    Route::get('/pages-pricing', function () {
        return view('pages-pricing');
    });
    Route::get('/pages-gallery', function () {
        return view('pages-gallery');
    });
    Route::get('/pages-maintenance', function () {
        return view('pages-maintenance');
    });
    Route::get('/pages-coming-soon', function () {
        return view('pages-coming-soon');
    });
    Route::get('/pages-sitemap', function () {
        return view('pages-sitemap');
    });
    Route::get('/pages-search-results', function () {
        return view('pages-search-results');
    });
    Route::get('/pages-privacy-policy', function () {
        return view('pages-privacy-policy');
    });
    Route::get('/pages-term-conditions', function () {
        return view('pages-term-conditions');
    });
    Route::get('/landing', function () {
        return view('landing');
    });
    Route::get('/nft-landing', function () {
        return view('nft-landing');
    });
    Route::get('/job-landing', function () {
        return view('job-landing');
    });
    Route::get('/ui-alerts', function () {
        return view('ui-alerts');
    });
    Route::get('/ui-badges', function () {
        return view('ui-badges');
    });
    Route::get('/ui-buttons', function () {
        return view('ui-buttons');
    });
    Route::get('/ui-colors', function () {
        return view('ui-colors');
    });
    Route::get('/ui-cards', function () {
        return view('ui-cards');
    });
    Route::get('/ui-carousel', function () {
        return view('ui-carousel');
    });
    Route::get('/ui-dropdowns', function () {
        return view('ui-dropdowns');
    });
    Route::get('/ui-grid', function () {
        return view('ui-grid');
    });
    Route::get('/ui-images', function () {
        return view('ui-images');
    });
    Route::get('/ui-tabs', function () {
        return view('ui-tabs');
    });
    Route::get('/ui-accordions', function () {
        return view('ui-accordions');
    });
    Route::get('/ui-modals', function () {
        return view('ui-modals');
    });
    Route::get('/ui-offcanvas', function () {
        return view('ui-offcanvas');
    });
    Route::get('/ui-placeholders', function () {
        return view('ui-placeholders');
    });
    Route::get('/ui-progress', function () {
        return view('ui-progress');
    });
    Route::get('/ui-notifications', function () {
        return view('ui-notifications');
    });
    Route::get('/ui-media', function () {
        return view('ui-media');
    });
    Route::get('/ui-embed-video', function () {
        return view('ui-embed-video');
    });
    Route::get('/ui-typography', function () {
        return view('ui-typography');
    });
    Route::get('/ui-lists', function () {
        return view('ui-lists');
    });
    Route::get('/ui-general', function () {
        return view('ui-general');
    });
    Route::get('/ui-ribbons', function () {
        return view('ui-ribbons');
    });
    Route::get('/ui-utilities', function () {
        return view('ui-utilities');
    });
    Route::get('/advance-ui-sweetalerts', function () {
        return view('advance-ui-sweetalerts');
    });
    Route::get('/advance-ui-nestable', function () {
        return view('advance-ui-nestable');
    });
    Route::get('/advance-ui-scrollbar', function () {
        return view('advance-ui-scrollbar');
    });
    Route::get('/advance-ui-animation', function () {
        return view('advance-ui-animation');
    });
    Route::get('/advance-ui-tour', function () {
        return view('advance-ui-tour');
    });
    Route::get('/advance-ui-swiper', function () {
        return view('advance-ui-swiper');
    });
    Route::get('/advance-ui-ratings', function () {
        return view('advance-ui-ratings');
    });
    Route::get('/advance-ui-highlight', function () {
        return view('advance-ui-highlight');
    });
    Route::get('/advance-ui-scrollspy', function () {
        return view('advance-ui-scrollspy');
    });
    Route::get('/widgets', function () {
        return view('widgets');
    });
    Route::get('/forms-elements', function () {
        return view('forms-elements');
    });
    Route::get('/forms-select', function () {
        return view('forms-select');
    });
    Route::get('/forms-checkboxs-radios', function () {
        return view('forms-checkboxs-radios');
    });
    Route::get('/forms-pickers', function () {
        return view('forms-pickers');
    });
    Route::get('/forms-masks', function () {
        return view('forms-masks');
    });
    Route::get('/forms-advanced', function () {
        return view('forms-advanced');
    });
    Route::get('/forms-range-sliders', function () {
        return view('forms-range-sliders');
    });
    Route::get('/forms-validation', function () {
        return view('forms-validation');
    });
    Route::get('/forms-wizard', function () {
        return view('forms-wizard');
    });
    Route::get('/forms-editors', function () {
        return view('forms-editors');
    });
    Route::get('/forms-file-uploads', function () {
        return view('forms-file-uploads');
    });
    Route::get('/forms-layouts', function () {
        return view('forms-layouts');
    });
    Route::get('/forms-select2', function () {
        return view('forms-select2');
    });
    Route::get('/tables-basic', function () {
        return view('tables-basic');
    });
    Route::get('/tables-gridjs', function () {
        return view('tables-gridjs');
    });
    Route::get('/tables-listjs', function () {
        return view('tables-listjs');
    });
    Route::get('/tables-datatables', function () {
        return view('tables-datatables');
    });
    Route::get('/charts-apex-line', function () {
        return view('charts-apex-line');
    });
    Route::get('/charts-apex-area', function () {
        return view('charts-apex-area');
    });
    Route::get('/charts-apex-column', function () {
        return view('charts-apex-column');
    });
    Route::get('/charts-apex-bar', function () {
        return view('charts-apex-bar');
    });
    Route::get('/charts-apex-mixed', function () {
        return view('charts-apex-mixed');
    });
    Route::get('/charts-apex-timeline', function () {
        return view('charts-apex-timeline');
    });
    Route::get('/charts-apex-candlestick', function () {
        return view('charts-apex-candlestick');
    });
    Route::get('/charts-apex-boxplot', function () {
        return view('charts-apex-boxplot');
    });
    Route::get('/charts-apex-bubble', function () {
        return view('charts-apex-bubble');
    });
    Route::get('/charts-apex-scatter', function () {
        return view('charts-apex-scatter');
    });
    Route::get('/charts-apex-heatmap', function () {
        return view('charts-apex-heatmap');
    });
    Route::get('/charts-apex-treemap', function () {
        return view('charts-apex-treemap');
    });
    Route::get('/charts-apex-pie', function () {
        return view('charts-apex-pie');
    });
    Route::get('/charts-apex-radialbar', function () {
        return view('charts-apex-radialbar');
    });
    Route::get('/charts-apex-radar', function () {
        return view('charts-apex-radar');
    });
    Route::get('/charts-apex-polar', function () {
        return view('charts-apex-polar');
    });
    Route::get('/charts-chartjs', function () {
        return view('charts-chartjs');
    });
    Route::get('/charts-echarts', function () {
        return view('charts-echarts');
    });
    Route::get('/icons-remix', function () {
        return view('icons-remix');
    });
    Route::get('/icons-boxicons', function () {
        return view('icons-boxicons');
    });
    Route::get('/icons-materialdesign', function () {
        return view('icons-materialdesign');
    });
    Route::get('/icons-lineawesome', function () {
        return view('icons-lineawesome');
    });
    Route::get('/icons-feather', function () {
        return view('icons-feather');
    });
    Route::get('/icons-crypto', function () {
        return view('icons-crypto');
    });
    Route::get('/maps-google', function () {
        return view('maps-google');
    });
    Route::get('/maps-vector', function () {
        return view('maps-vector');
    });
    Route::get('/maps-leaflet', function () {
        return view('maps-leaflet');
    });
});