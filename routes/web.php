<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

use App\Models\Product;

Route::get('/', function () {
    $products = Product::where('stok', '>', 0)->get();
    return view('home', compact('products'));
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/pesan', [OrderController::class, 'store'])->name('pesan.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([Authenticate::class, AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/sales-data', [\App\Http\Controllers\AdminDashboardController::class, 'salesData'])->name('admin.sales.data');
    Route::get('/produk', [AdminProductController::class, 'index'])->name('admin.produk.index');
    Route::get('/pesanan', [AdminOrderController::class, 'index'])->name('admin.pesanan.index');
    Route::get('/pesanan/{id}', [AdminOrderController::class, 'show'])->name('admin.pesanan.show');
    Route::get('/pesanan/{id}/cetak', [AdminOrderController::class, 'cetak'])->name('admin.pesanan.cetak');
    Route::get('/user', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('admin.user.create');
    Route::post('/user', [AdminUserController::class, 'store'])->name('admin.user.store');
    Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni.index');
    Route::post('/testimoni/{id}/approve', [AdminTestimoniController::class, 'approve'])->name('admin.testimoni.approve');
    Route::post('/testimoni/{id}/reject', [AdminTestimoniController::class, 'reject'])->name('admin.testimoni.reject');
    Route::get('/laporan', [AdminReportController::class, 'index'])->name('admin.laporan.index');
    Route::get('/laporan/pdf', [AdminReportController::class, 'exportPdf'])->name('admin.laporan.export_pdf');
    Route::get('/laporan/excel', [AdminReportController::class, 'exportExcel'])->name('admin.laporan.export_excel');
    Route::get('/diskon', [AdminPageController::class, 'diskon'])->name('admin.diskon.index');
    Route::get('/transaksi-delivery', [AdminPageController::class, 'delivery'])->name('admin.delivery.index');
    Route::get('/transaksi-takein', [AdminPageController::class, 'takein'])->name('admin.takein.index');
});
