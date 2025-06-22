<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\LoyaltyController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\ReasonController;
use App\Http\Controllers\admin\SectorsController;
use App\Http\Controllers\admin\WorkflowController;
use App\Http\Controllers\customer\ContactController;
use App\Http\Controllers\customer\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');

Route::get('/admin/login-form', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('signin');

Route::get('/about', [AboutController::class, 'showFrontendAbout'])->name('about.frontend');
Route::post('/contact', [ContactController::class, 'store'])->name('customer.contact.store');

Route::group(['prefix' => '/admin', 'as' => 'admin.', "middleware" => "auth"], function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/customer/contact/data', [DashboardController::class, 'customerContactData'])->name('dashboard.customer.contact.data');

    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::post('/projects/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/projects/show', [ProjectsController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/show', [AboutController::class, 'show'])->name('about.show');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    Route::get('/loyalty', [LoyaltyController::class, 'index'])->name('loyalty.index');
    Route::post('/loyalty/store', [LoyaltyController::class, 'store'])->name('loyalty.store');
    Route::get('/loyalty/show', [LoyaltyController::class, 'show'])->name('loyalty.show');
    Route::get('/loyalty/{id}/edit', [LoyaltyController::class, 'edit'])->name('loyalty.edit');
    Route::post('/loyalty/update/{id}', [LoyaltyController::class, 'update'])->name('loyalty.update');
    Route::delete('loyalty/{id}', [LoyaltyController::class, 'destroy'])->name('loyalty.destroy');

    Route::get('/sectors', [SectorsController::class, 'index'])->name('sectors.index');
    Route::post('/sectors/store', [SectorsController::class, 'store'])->name('sectors.store');
    Route::get('/sectors/show', [SectorsController::class, 'show'])->name('sectors.show');
    Route::get('/sectors/{id}/edit', [SectorsController::class, 'edit'])->name('sectors.edit');
    Route::post('/sectors/update/{id}', [SectorsController::class, 'update'])->name('sectors.update');
    Route::delete('sectors/{id}', [SectorsController::class, 'destroy'])->name('sectors.destroy');

    Route::get('/reasons', [ReasonController::class, 'index'])->name('reasons.index');
    Route::post('reasons/store', [ReasonController::class, 'store'])->name('reasons.store');
    Route::get('/reasons/show', [ReasonController::class, 'show'])->name('reasons.show');
    Route::get('/reasons/{id}/edit', [ReasonController::class, 'edit'])->name('reasons.edit');
    Route::post('/reasons/update/{id}', [ReasonController::class, 'update'])->name('reasons.update');
    Route::delete('/reasons/{id}', [ReasonController::class, 'destroy'])->name('reasons.destroy');

    Route::get('/workflow', [WorkflowController::class, 'index'])->name('workflow.index');
    Route::post('/workflow/store', [WorkflowController::class, 'store'])->name('workflow.store');
    Route::get('/workflow/show', [WorkflowController::class, 'show'])->name('workflow.show');
    Route::get('/workflow/{id}/edit', [WorkflowController::class, 'edit'])->name('workflow.edit');
    Route::post('/workflow/update/{id}', [WorkflowController::class, 'update'])->name('workflow.update');
    Route::delete('/workflow/{id}', [WorkflowController::class, 'destroy'])->name('workflow.destroy');

    Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
    Route::post('/features/store', [FeatureController::class, 'store'])->name('features.store');
    Route::get('/features/show', [FeatureController::class, 'show'])->name('feature.show');
    Route::get('/features/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::post('/features/update/{id}', [FeatureController::class, 'update'])->name('feature.update');
    Route::delete('/feature/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');

    Route::get('/office', [OfficeController::class, 'index'])->name('office.index');
    Route::post('/office/store', [OfficeController::class, 'store'])->name('office.store');
    Route::get('/office/show', [OfficeController::class, 'show'])->name('office.show');
    Route::get('/office/{id}/edit', [OfficeController::class, 'edit'])->name('office.edit');
    Route::post('/office/update/{id}', [OfficeController::class, 'update'])->name('office.update');
    Route::delete('/office/{id}', [OfficeController::class, 'destroy'])->name('office.destroy');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/show', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/messages/show', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/toggle-status/{id}', [MessageController::class, 'toggleStatus'])->name('messages.toggleStatus');
    Route::get('/messages/unread-count', [MessageController::class, 'unreadCount'])->name('messages.unreadCount');
    Route::post('/messages/mark-all-read', [MessageController::class, 'markAllRead'])->name('messages.markAllRead');
    Route::get('/admin/messages/latest-dropdown', [DashboardController::class, 'latestMessagesForDropdown'])->name('messages.latestDropdown');

});
