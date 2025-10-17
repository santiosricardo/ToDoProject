<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('task')->group(function () {
        Route::get("/", [TaskController::class, "index"])->name("task.index");
        Route::post("/", [TaskController::class, "store"])->name("task.store");
        Route::get("/{task}", [TaskController::class, "show"])->name("task.show");
        Route::patch("/{task}", [TaskController::class, "update"])->name("task.update");
        Route::delete("/{task}", [TaskController::class, "destroy"])->name("task.destroy");
    }
); 
