<?php
require __DIR__ . '/auth.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WhoWeAreController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Str;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/reviews', [WhoWeAreController::class, 'index'])->name('reviews');
// Route::get('/testimonials', [AboutController::class, 'index'])->name('testimonials');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribers.store');




Route::get('/services', function () {
    return view('pages.services');
})->name('services.index');

Route::get('/services/{slug}', function ($slug) {
    $services = [
        'wellhead-services' => [
            'title' => 'Wellhead Services',
            'description' => 'Proper wellhead management is critical for the safe and efficient extraction of oil and gas. At Madu Alliance, we provide end-to-end wellhead solutions, ensuring that all components function seamlessly from installation to decommissioning. Our team of skilled engineers and technicians work diligently to maintain pressure control, prevent leaks, and enhance the overall safety of your operations.

            We specialize in installing and commissioning wellheads, ensuring they meet industry standards and regulatory requirements. Our maintenance programs involve regular inspections, pressure testing, and emergency system integrations to minimize risks and extend the lifespan of wellhead equipment. Whether it’s repairing or replacing critical components or conducting routine safety checks, we ensure that your wellheads operate efficiently and reliably, even in the most challenging environments.',
            'image' => 'images/services/service1.jpg'
        ],
        'diagnostic-testing' => [
            'title' => 'Diagnostic Testing',
            'description' => 'Advanced diagnostics to identify and resolve issues before they escalate.',
            'image' => 'images/testing.jpg'
        ],
        'component-replacement' => [
            'title' => 'Component Replacement',
            'description' => 'Replacing worn-out components to enhance system efficiency and longevity.',
            'image' => 'images/replacement.jpg'
        ],
        'performance-monitoring' => [
            'title' => 'Performance Monitoring',
            'description' => 'Continuous monitoring to track system performance and make improvements.',
            'image' => 'images/monitoring.jpg'
        ],
    ];

    if (!isset($services[$slug])) {
        abort(404);
    }

    return view('pages.service-detail', [
        'title' => $services[$slug]['title'],
        'description' => $services[$slug]['description'],
        'image' => $services[$slug]['image']
    ]);
})->name('services.show');



Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');

