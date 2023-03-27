<x-app-layout>
    <x-slot name="header">
        {{ $jobcenter->name }}
    </x-slot>
    <div>
        <x-btn-back route="{{ route('admin.jobcenters.index') }}" />
    </div>
</x-app-layout>
