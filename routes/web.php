<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Controllers\ProjectController;

Route::get('/', [SkillController::class, 'index'])->name('portfolio');
// Route::get('/', [ProjectController::class, 'index'])->name('portofolio');
// Route::get('/send-email',function(){
//     $data = [
//         'name' => 'Syahrizal As',
//         'body' => 'Testing Kirim Email di Santri Koding'
//     ];
   
//     Mail::to('ahrahmadhani@gmail.com')->send(new ContactMail($data));
   
//     dd("Email Berhasil dikirim.");
// });
