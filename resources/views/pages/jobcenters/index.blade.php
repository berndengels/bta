<x-app-layout>
    <x-slot name="header">
        {{ __('Jobcenters') }}
    </x-slot>

    <div>
        <div class="index-header mt-3 p-0">
            <div class="float-start">
                <x-btn-create route="{{ route('admin.jobcenters.create') }}" />
            </div>
            <div class="float-end">
                <x-search-filter name="name" action="{{ route('admin.jobcenters.index') }}" placeholder="Suche Jobcenter" />
            </div>
        </div>
        {{ $data->links() }}
        <x-table :items="$data" :fields="['Name']" hasActions isSmall>
            @foreach($data as $item)
                <tr>
                    @bindData($item)
                    <x-td field="name" />
                    <x-action routePrefix="admin.jobcenters" edit delete />
                    @endBindData
                </tr>
            @endforeach
        </x-table>
        {{ $data->links() }}
    </div>
</x-app-layout>
