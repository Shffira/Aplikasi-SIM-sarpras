
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\KategoriSaranaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\LaporanSaranaController;
use App\Http\Controllers\BeritaAcaraController;
use App\Models\Sarana;
use App\Models\LaporanSarana;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Arahkan pengguna berdasarkan role
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('dashboard.admin'),
        'petugas_sarpras' => redirect()->route('dashboard.petugas'),
        'guru' => redirect()->route('dashboard.guru'),
        'murid' => redirect()->route('dashboard.murid'),
        default => abort(403),
    };
})->middleware('auth')->name('dashboard');
Route::resource('sarana', SaranaController::class)
    ->middleware(['auth', 'role:admin,petugas_sarpras']);
// Dashboard Admin
Route::get('/admin/dashboard', function () {
    $totalSarana = Sarana::count();

    $saranaRusak = Sarana::whereIn('kondisi', [
        'rusak_ringan',
        'rusak_berat',
    ])->count();

    $dalamPerbaikan = Sarana::where(
        'status_perbaikan',
        'dalam_perbaikan'
    )->count();

    $totalLaporan = LaporanSarana::count();

    return view('dashboards.admin', compact(
        'totalSarana',
        'saranaRusak',
        'dalamPerbaikan',
        'totalLaporan'
    ));
})->middleware(['auth', 'role:admin'])->name('dashboard.admin');

// Dashboard Petugas Sarpras

Route::get('/petugas/dashboard', function () {
    $totalSarana = Sarana::count();

    $saranaRusak = Sarana::whereIn('kondisi', [
        'rusak_ringan',
        'rusak_berat',
    ])->count();

    $dalamPerbaikan = Sarana::where(
        'status_perbaikan',
        'dalam_perbaikan'
    )->count();

    $laporanMenunggu = LaporanSarana::where(
        'status',
        'pending'
    )->count();

    return view('dashboards.petugas', compact(
        'totalSarana',
        'saranaRusak',
        'dalamPerbaikan',
        'laporanMenunggu'
    ));
})->middleware(['auth', 'role:petugas_sarpras'])
  ->name('dashboard.petugas');


// Dashboard Guru
Route::get('/guru/dashboard', function () {
    return view('dashboards.guru');
})->middleware(['auth', 'role:guru'])->name('dashboard.guru');

// Dashboard Murid
Route::get('/murid/dashboard', function () {
    return view('dashboards.murid');
})->middleware(['auth', 'role:murid'])->name('dashboard.murid');

Route::resource('kategori', KategoriSaranaController::class)
    ->parameters(['kategori' => 'kategori'])
    ->middleware(['auth', 'role:admin,petugas_sarpras']);

Route::resource('ruangan', RuanganController::class)
    ->middleware(['auth', 'role:admin,petugas_sarpras']);
// Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware(['auth', 'role:murid'])->group(function () {
    Route::get('/laporan/create', [LaporanSaranaController::class, 'create'])
        ->name('laporan.create');

    Route::post('/laporan', [LaporanSaranaController::class, 'store'])
        ->name('laporan.store');
});

Route::get('/laporan', [LaporanSaranaController::class, 'index'])
    ->middleware(['auth', 'role:admin,petugas_sarpras,murid'])
    ->name('laporan.index');

Route::patch('/laporan/{laporan}/status', [LaporanSaranaController::class, 'updateStatus'])
    ->middleware(['auth', 'role:admin,petugas_sarpras'])
    ->name('laporan.status');


Route::resource('berita-acara', BeritaAcaraController::class)
    ->middleware(['auth', 'role:admin,petugas_sarpras']);