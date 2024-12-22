<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\AdminSpecializationController;
use App\Http\Controllers\AdminContactMsgController;
use App\Http\Controllers\AdminConsultationController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\AppointmentController;




Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/signup', [DoctorAuthController::class, 'showSignupForm'])->name('signup');
    Route::post('/signup', [DoctorAuthController::class, 'signup']);
    Route::get('/login', [DoctorAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [DoctorAuthController::class, 'login']);
    Route::post('/logout', [DoctorAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth.doctor')->group(function () {
        Route::get('/profile', [DoctorAuthController::class, 'profile'])->name('pages.doctors.profile');
        Route::get('/profile/edit', [DoctorAuthController::class, 'showEditForm'])->name('profile.edit');
        Route::put('/profile/update/{id}', [DoctorAuthController::class, 'update'])->name('profile.update');
    });
});


Route::post('appointments/checkout', [AppointmentController::class, 'checkout'])->name('appointments.checkout');
Route::post('appointments/payment/confirm', [AppointmentController::class, 'confirmPayment'])->name('appointments.payment.confirm');



Route::get('user/sign-up', [UserAuthController::class, 'showSignupForm'])->name('user.signup.form');
Route::post('user/signup', [UserAuthController::class, 'signup'])->name('user.signup');
Route::get('user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login.form');
Route::post('user/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('user/profile', [UserAuthController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserAuthController::class, 'showEditForm'])->name('profile.edit');
    Route::post('/profile/update/{id}', [UserAuthController::class, 'update'])->name('profile.update');
    Route::get('appointments/book/{doctorId}', [AppointmentController::class, 'showAvailableTimes'])->name('appointments.book');
Route::post('appointments/book/{doctorId}', [AppointmentController::class, 'bookAppointment']);

Route::get('appointments', [AppointmentController::class, 'index']);
   

});



Route::middleware(['auth'])->group(function () {
    Route::get('/reviews/{review}/edit', [AdminReviewController::class, 'edits'])->name('reviews.edit');
    Route::put('/reviews/{review}', [AdminReviewController::class, 'updates'])->name('reviews.update');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroys'])->name('reviews.delete');
});







Route::get('/', [AdminDoctorController::class, 'showSpecialization'])->name('home.specializations');
Route::get('/home', [AdminDoctorController::class, 'showSpecialization'])->name('home.specializations');
Route::post('/doctor/{doctorId}/review', [AdminReviewController::class, 'storeDetails'])->name('reviews.store');

Route::get('/doctors', [AdminDoctorController::class, 'getAllDoctors'])->name('user.doctors');
Route::get('/doctors/show/{id}', [AdminDoctorController::class, 'showAllDoctors'])->name('user.doctorsdetailes');











Route::prefix('admin')->group(function () {
    // Authentication Routes for Admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
       
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        // Admin Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
        Route::put('/profile/update', [AdminController::class, 'update'])->name('admin.profile.update');
        // Admin Routes
        Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews');
        Route::get('/reviews/show/{id}', [AdminReviewController::class, 'show'])->name('admin.reviews.show');
        Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');
        Route::post('/reviews/{id}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
        Route::post('/reviews/{id}/reject', [AdminReviewController::class, 'reject'])->name('admin.reviews.reject');
    
    
        
        Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports');
       Route::get('/reports/export', [AdminReportController::class, 'export'])->name('admin.reports.export');

    
    
    Route::get('/doctors', [AdminDoctorController::class, 'index'])->name('admin.doctors');
    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
    Route::get('/doctors/show/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctors.show');
    Route::get('/doctors/edit/{id}', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
    Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');
    Route::put('/doctors/update/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
    Route::post('/doctors/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
    
    
    
    
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::get('/users/show/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
        Route::get('/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
        Route::put('/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::post('/users/store', [AdminUserController::class, 'store'])->name('admin.users.store');
    
    
    
    
        Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments');
        Route::get('/payments/create', [AdminPaymentController::class, 'create'])->name('admin.payments.create');
        Route::get('/payments/show/{id}', [AdminPaymentController::class, 'show'])->name('admin.payments.show');
        Route::get('/payments/edit/{id}', [AdminPaymentController::class, 'edit'])->name('admin.payments.edit');
        Route::delete('/payments/{user}', [AdminPaymentController::class, 'destroy'])->name('admin.payments.destroy');
        Route::put('/payments/update/{id}', [AdminPaymentController::class, 'update'])->name('admin.payments.update');
        Route::post('/payments/store', [AdminPaymentController::class, 'store'])->name('admin.payments.store');
    
    
    
        
        Route::get('/specializations', [AdminSpecializationController::class, 'index'])->name('admin.specializations');
        Route::get('/specializations/create', [AdminSpecializationController::class, 'create'])->name('admin.specializations.create');
        Route::get('/specializations/show/{id}', [AdminSpecializationController::class, 'show'])->name('admin.specializations.show');
        Route::get('/specializations/edit/{id}', [AdminSpecializationController::class, 'edit'])->name('admin.specializations.edit');
        Route::delete('/specializations/{specialization}', [AdminSpecializationController::class, 'destroy'])->name('admin.specializations.destroy');
        Route::put('/specializations/update/{specialization}', [AdminSpecializationController::class, 'update'])->name('admin.specializations.update');
        Route::post('/specializations/store', [AdminSpecializationController::class, 'store'])->name('admin.specializations.store');
        
        
    
        
        Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials');
        Route::patch('/testimonials/{id}/approve', [AdminTestimonialController::class, 'approve'])->name('admin.testimonials.approve');
        Route::patch('/testimonials/{id}/reject', [AdminTestimonialController::class, 'reject'])->name('admin.testimonials.reject');
        Route::delete('/testimonials/{id}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
        Route::get('/testimonials/{id}', [AdminTestimonialController::class, 'show'])->name('admin.testimonials.show');

        
        
            Route::get('/contacts', [AdminContactMsgController::class, 'index'])->name('admin.contacts');
            Route::get('/contact_messages', [AdminContactMsgController::class, 'index'])->name('admin.contact_messages.index');
            Route::get('/contact_messages/{id}', [AdminContactMsgController::class, 'show'])->name('admin.contact_messages.show');
            Route::post('/contact_messages/{id}/update-status', [AdminContactMsgController::class, 'updateStatus'])->name('admin.contact_messages.updateStatus');
            Route::patch('/contact-messages/{id}/mark-as-read', [AdminContactMsgController::class, 'markAsRead'])->name('admin.contact_messages.markAsRead');
            Route::patch('/contact-messages/{id}/mark-as-unread', [AdminContactMsgController::class, 'markAsUnread'])->name('admin.contact_messages.markAsUnread');
            
    
            Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments');
            Route::get('/appointments/create', [AdminAppointmentController::class, 'create'])->name('admin.appointments.create');
            Route::get('/appointments/show/{id}', [AdminAppointmentController::class, 'show'])->name('admin.appointments.show');
            Route::get('/appointments/edit/{id}', [AdminAppointmentController::class, 'edit'])->name('admin.appointments.edit');
            Route::delete('/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
            Route::put('/appointments/update/{id}', [AdminAppointmentController::class, 'update'])->name('admin.appointments.update');
            Route::post('/appointments/store', [AdminAppointmentController::class, 'store'])->name('admin.appointments.store');
    
    
            Route::get('/consultations', [AdminConsultationController::class, 'index'])->name('admin.consultations');
            Route::get('/consultations/create', [AdminConsultationController::class, 'create'])->name('admin.consultations.create');
            Route::get('/consultations/show/{id}', [AdminConsultationController::class, 'show'])->name('admin.consultations.show');
            Route::get('/consultations/edit/{id}', [AdminConsultationController::class, 'edit'])->name('admin.consultations.edit');
            Route::delete('/consultations/{consultation}', [AdminConsultationController::class, 'destroy'])->name('admin.consultations.destroy');
            Route::put('/consultations/update/{id}', [AdminConsultationController::class, 'update'])->name('admin.consultations.update');
            Route::post('/consultations/store', [AdminConsultationController::class, 'store'])->name('admin.consultations.store');
        
           
          
    });
});









Route::get('/contact-us', [UserContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [UserContactController::class, 'store'])->name('contact.store');















Route::get('/about', [UserAuthController::class,'showAbout'])->name('about');


Route::get('/doctor/appointments', [DoctorAuthController::class, 'showAppointments'])->name('doctor.appointments');
