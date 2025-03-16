<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminVoterIdController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/vote-counts', function() {
    return response()->json(App\Models\Candidate::select('id', 'votes')->get());
})->name('admin.getVotes');


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');


    // Route::post('/voter/verify', [VoteController::class, 'verifyVoter'])->name('voter.verify');
    // Route::get('/voter/verify', function () {
    //     return view('voter.verify');
    // })->name('voter.showVerifyForm');
    Route::get('/voter/verify', [VoteController::class, 'showVerifyForm'])->name('voter.verify');
    Route::post('/voter/verify', [VoteController::class, 'verifyVoter']);

    Route::get('/vote', [VoteController::class, 'create'])->name('vote.create');
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/candidates', [CandidateController::class, 'index'])->name('admin.candidates.index');
    Route::get('/admin/candidates/create', [CandidateController::class, 'create'])->name('admin.candidates.create');
    Route::post('/admin/candidates/store', [CandidateController::class, 'store'])->name('admin.candidates.store');

    // Edit & Update Routes
    Route::get('/admin/candidates/{id}/edit', [CandidateController::class, 'edit'])->name('admin.candidates.edit');
    Route::put('/admin/candidates/{id}/update', [CandidateController::class, 'update'])->name('admin.candidates.update');

    // Delete Route
    Route::delete('/admin/candidates/{id}/delete', [CandidateController::class, 'destroy'])->name('admin.candidates.delete');

    // Admin Voter ID Routes
    Route::get('/admin/voter-ids', [AdminVoterIdController::class, 'index'])->name('admin.voter_ids.index');
    Route::post('/admin/voter-ids', [AdminVoterIdController::class, 'store'])->name('admin.voter_ids.store');
    Route::delete('/admin/voter-ids/{id}', [AdminVoterIdController::class, 'destroy'])->name('admin.voter_ids.destroy');
    // New search route
    Route::get('/admin/voter-ids/search', [AdminVoterIdController::class, 'search'])->name('admin.voter_ids.search');
    // Bulk delete route
    Route::post('/voter-ids/bulk-delete', [AdminVoterIdController::class, 'bulkDelete'])->name('admin.voter_ids.bulkDelete');
    Route::delete('/voter-ids/bulk-delete', [AdminVoterIdController::class, 'bulkDelete'])->name('admin.voter_ids.bulkDelete');
    // Get votes route
    Route::get('/admin/getVotes', [AdminController::class, 'getVotes'])->name('admin.getVotes');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
