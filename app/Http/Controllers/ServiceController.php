<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    private $services = [
        [
            'title' => 'Wellhead Services',
            'description' => 'Proper wellhead management is critical for the safe and efficient extraction of oil and gas. At Madu Alliance, we provide end-to-end wellhead solutions, ensuring that all components function seamlessly from installation to decommissioning. Our team of skilled engineers and technicians work diligently to maintain pressure control, prevent leaks, and enhance the overall safety of your operations.

            We specialize in installing and commissioning wellheads, ensuring they meet industry standards and regulatory requirements. Our maintenance programs involve regular inspections, pressure testing, and emergency system integrations to minimize risks and extend the lifespan of wellhead equipment. Whether it’s repairing or replacing critical components or conducting routine safety checks, we ensure that your wellheads operate efficiently and reliably, even in the most challenging environments.',
            'image' => 'images/inspection.jpg'
        ],
        [
            'title' => 'Diagnostic Testing',
            'description' => 'Advanced diagnostics to identify and resolve issues before they escalate.',
            'image' => 'images/testing.jpg'
        ],
        [
            'title' => 'Component Replacement',
            'description' => 'Replacing worn-out components to enhance system efficiency and longevity.',
            'image' => 'images/replacement.jpg'
        ],
        [
            'title' => 'Performance Monitoring',
            'description' => 'Continuous monitoring to track system performance and make improvements.',
            'image' => 'images/monitoring.jpg'
        ],
    ];

    public function show($slug): View
    {
        $service = collect($this->services)->firstWhere('title', function ($title) use ($slug) {
            return Str::slug($title) === $slug;
        });

        if (!$service) {
            abort(404);
        }

        return view('pages.service-detail', ['service' => $service]);
    }
}
