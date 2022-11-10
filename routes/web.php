<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'guest'])->group(function() {
    Route::get("/", [AuthController::class, "index"])->name("index");
    Route::post("/login", [AuthController::class, "login"])->name("login");
    Route::get("/register", [AuthController::class, "register_view"])->name("register-view");
    Route::post("/register/store", [AuthController::class, "register"])->name("register");
});

Route::middleware(['auth'])->group(function() {
    Route::get("/dashboard", function() {
        return view("dashboard.index");
    })->name('dashboard');
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::prefix('dashboard/students')->group(function() {
        Route::get("/", [StudentController::class, "index"])->name("student-list");
        Route::get("/create", [StudentController::class, "create"])->name("student-create");
        Route::post("/create/store", [StudentController::class, "store"])->name("student-store");
        Route::get("/{id}", [StudentController::class, "details"])->name("student-details");
        Route::get("/{id}/edit", [StudentController::class, "edit"])->name("student-edit");
        Route::get("/{id}/delete", [StudentController::class, "delete"])->name("student-delete");
        Route::post("/update", [StudentController::class, "update"])->name("student-update");

    });
});
