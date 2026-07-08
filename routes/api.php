<?php

use App\Http\Controllers\Api\AttendanceApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Profile routes
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::post('/profile/password', [ProfileController::class, 'updatePassword']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);

    // Employee Management routes
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees', [EmployeeController::class, 'store']);
    Route::patch('/employees/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);

    // Shift Management routes
    Route::get('/shifts', [\App\Http\Controllers\Api\ShiftController::class, 'index']);
    Route::post('/shifts', [\App\Http\Controllers\Api\ShiftController::class, 'store']);
    Route::patch('/shifts/{shift}', [\App\Http\Controllers\Api\ShiftController::class, 'update']);
    Route::delete('/shifts/{shift}', [\App\Http\Controllers\Api\ShiftController::class, 'destroy']);
    
    // Attendance specific API routes
    Route::get('/sync', [AttendanceApiController::class, 'sync']);
    Route::post('/attendance/save', [AttendanceApiController::class, 'store']);
    Route::post('/attendance/recognize', [AttendanceApiController::class, 'recognize']);
    Route::get('/attendance/download', [AttendanceApiController::class, 'download']);
    Route::get('/attendance/summary', [AttendanceApiController::class, 'summary']);
    Route::get('/attendance/download-pdf', [AttendanceApiController::class, 'downloadPdf']);
    Route::get('/attendance/employee/{code}', [AttendanceApiController::class, 'employeeReport']);
    Route::get('/attendance/employee/{code}/download-pdf', [AttendanceApiController::class, 'downloadEmployeePdf']);
    Route::delete('/attendance/cycle', [AttendanceApiController::class, 'deleteCycle']);
    
    // Subscription verification route
    Route::post('/subscription/verify', [\App\Http\Controllers\Api\SubscriptionController::class, 'verify']);
});
