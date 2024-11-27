<x-app-layout>
    <x-client-reviews :reviews="[
        [
            'name' => 'John Doe',
            'designation' => 'CEO, TechCorp',
            'avatar' => 'https://via.placeholder.com/150',
            'testimonial' => 'This company exceeded my expectations. Highly recommended!',
        ],
        [
            'name' => 'Jane Smith',
            'designation' => 'Marketing Manager, BizWorld',
            'avatar' => 'https://via.placeholder.com/150',
            'testimonial' => 'Exceptional service and outstanding support. Kudos to the team!',
        ],
        [
            'name' => 'Sam Wilson',
            'designation' => 'Freelancer',
            'avatar' => 'https://via.placeholder.com/150',
            'testimonial' => 'Great experience! I will definitely work with them again.',
        ],
    ]" />
</x-app-layout>