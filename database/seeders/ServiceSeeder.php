<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Service::create([
        //     'title' => 'Web Development',
        //     'description' => 'We build responsive and scalable websites tailored to your needs.'
        // ]);

        // Service::create([
        //     'title' => 'Mobile App Development',
        //     'description' => 'Create cutting-edge mobile applications for Android and iOS platforms.'
        // ]);
        Service::create([
            'title' => 'Wellhead Services',
            'description' => '<p>At <strong>Madu Alliance</strong>, we provide thorough maintenance services to prevent unexpected breakdowns and ensure the continuous functionality of essential systems.</p>

<h3>Our Reed Maintenance Services Include:</h3>
<ul>
    <li>✔ Routine inspections and preventive maintenance</li>
    <li>✔ Diagnostic testing and troubleshooting</li>
    <li>✔ Replacement of damaged or worn reed components</li>
    <li>✔ Lubrication, alignment checks, and calibration</li>
    <li>✔ Equipment performance monitoring and reporting</li>
</ul>

<p>With our proactive approach, we help clients minimize downtime, extend equipment lifespan, and maintain optimal production efficiency.</p>

✔ Lubrication, alignment checks, and calibration
✔ Equipment performance monitoring and reporting \<br\>

With our proactive approach, we help clients minimize downtime, extend equipment lifespan, and maintain optimal production efficiency.',
            'image' => 'services/service1.jpg'
        ]);
        Service::create([
            'title' => 'Reed Maintenance',
            'description' => 'Our reed maintenance services focus on routine upkeep, diagnostics, component replacement, and performance monitoring, ensuring critical equipment remains durable and efficient while minimizing downtime.',
            'image' => 'services/service1.jpg.jpg'
        ]);
    }

}
