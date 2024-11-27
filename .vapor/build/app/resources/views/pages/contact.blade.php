<x-app-layout>
<div class="mt-6 p-3">
    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif
    <x-contact-form />
</div>
</x-app-layout>
