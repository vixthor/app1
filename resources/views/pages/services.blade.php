<x-app-layout>
  <div class="container mx-auto py-12 px-2">
    <h1 class="text-4xl font-bold text-center mb-8">Our Services</h1>
    <div class="grid grid-cols-1  md:grid-cols-2  lg:grid-cols-3 gap-6">
    <x-service-card class=""
            title="Wellhead Services"
            description="Proper wellhead management is critical for the safe and efficient extraction of oil and gas. At Madu Alliance, we provide end-to-end wellhead solutions..."
            image="images/services/service1.jpg"
        />

        <x-service-card 
            title="Reed Maintenance"
            description="Maintaining reed-based equipment is essential to prevent operational disruptions and ensure consistent performance in oil and gas operations.

"
            image="images/testing.jpg"
        />

        <x-service-card 
            title="Component Replacement"
            description="Replacing worn-out components to enhance system efficiency and longevity."
            image="images/replacement.jpg"
        />

        <x-service-card 
            title="Performance Monitoring"
            description="Continuous monitoring to track system performance and make improvements."
            image="images/monitoring.jpg"
        />+
    </div>
</div>
</x-app-layout>

