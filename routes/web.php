<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\toko\produk\ProdukController;
use App\Http\Controllers\toko\produk\UlasanController;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\toko\profile\ProfileController;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\authentications\RegisterController;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\toko\pemasukan\PemasukanController;
use App\Http\Controllers\toko\penjualan\PemesananController;
use App\Http\Controllers\toko\penjualan\PenjualanController;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\admin\penjual\AdminPenjualController;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\toko\pemasukan\PemasukanController;
use App\Http\Controllers\user\home\UserHomeController;
use App\Http\Controllers\admin\Customer\AdminCustomerController;


Route::get('/', [UserHomeController::class, 'index'])->name('userHome');
Route::get('/cart', [UserHomeController::class, 'index'])->name('userHome');

// Main Page Route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/customer', [AdminCustomerController::class, 'index'])->name('admin-customer');
    Route::get('admin/penjual', [AdminPenjualController::class, 'index'])->name('admin-penjual');
    Route::get('admin/produk', [AdminProdukController::class, 'index'])->name('admin-produk');
});

Route::middleware(['auth', 'role:admin,penjual'])->group(function () {

});

Route::get('/toko/login', [LoginController::class, 'login'])->name('login');
Route::post('/toko/login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/toko/register', [RegisterController::class, 'register'])->name('register');
Route::post('/toko/register', [RegisterController::class, 'prosesRegis'])->name('ProsesRegis');

Route::middleware(['auth', 'role:penjual'])->group(function () {
    Route::get('/toko', [Analytics::class, 'index'])->name('dashboard-analytics');
    Route::get('/toko/deskripsi', [ProfileController::class, 'index'])->name('toko-deskripsi');
    Route::get('/toko/alamat', [ProfileController::class, 'alamat'])->name('toko-alamat');
    Route::get('/toko/hapus', [ProfileController::class, 'hapus'])->name('toko-hapus');
    Route::post('/toko/update_profile',[ProfileController::class, 'update_profile'])->name('update_profile');

    //Toko Produk
    Route::get('/toko/produk', [ProdukController::class, 'produk'])->name('toko-produk');
    Route::get('/toko/produk/edit{id}', [ProdukController::class, 'edit'])->name('toko-produk-edit');
    Route::post('/toko/produk/edit', [ProdukController::class, 'edit_proses'])->name('toko-produk-edit-proses');
    Route::get('/toko/produk/hapus{id}', [ProdukController::class, 'delate'])->name('toko-produk-delate');
    Route::get('/toko/produk/tambah', [ProdukController::class, 'tambah'])->name('toko-produk-tambah');
    Route::post('/toko/produk/tambah', [ProdukController::class, 'tambah_proses'])->name('toko-produk-tambah-proses');


    //Toko Produk Ulasan
    Route::get('/toko/ulasan', [UlasanController::class, 'ulasan'])->name('toko-ulasan');
    Route::get('/toko/ulasan/tambah', [UlasanController::class, 'tambah_ulasan'])->name('toko-ulasan-tambah');
    Route::get('/toko/ulasan/tambah/proses', [UlasanController::class, 'tambah_ulasan'])->name('toko-ulasan-tambah-peroses');

    //Kelola Pemesanan
    Route::get('/toko/pemesanan', [PemesananController::class, 'pemesanan'])->name('toko-pemesanan');
    Route::get('/toko/pemesanan/edit{id}', [PemesananController::class, 'edit'])->name('toko-pemesanan-edit');
    Route::post('/toko/pemesanan/edit', [PemesananController::class, 'edit_proses'])->name('toko-pemesanan-edit-proses');
    Route::get('/toko/pemesanan/detail{id}', [PemesananController::class, 'detail'])->name('toko-pemesanan-detail');
    Route::get('/toko/penjualan', [PenjualanController::class, 'penjualan'])->name('toko-penjualan');

    //Kelola Pemasukan
    Route::get('/toko/pemasukan', [PemasukanController::class, 'pemasukan'])->name('toko-pemasukan');
    Route::get('/toko/pemasukan/pemasukann', [PemasukanController::class, 'pemasukann'])->name('toko-pemasukann'); 

    //Kelola Pemasukan 
    Route::post('/toko/update_profile',[ProdukController::class, 'update_profile'])->name('update_profile');

    //pemasukan
    Route::get('/toko/pemasukan', [PemasukanController::class, 'pemasukan'])->name('toko-pemasukan');
    Route::get('/toko/pemasukan/pemasukann', [PemasukanController::class, 'pemasukann'])->name('toko-pemasukann'); 
    Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');

});


Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/icons-mdi', [MdiIcons::class, 'index'])->name('icons-mdi');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
