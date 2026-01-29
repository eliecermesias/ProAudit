<x-layouts::app :title="__('Licencias')">
    <div class="mb-4 flex items-center justify-between">
        <flux:breadcrumbs >
        <flux:breadcrumbs.item :href=" route('dashboard') ">Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{ __('Licences') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>
        <div class="flex items-center space-x-2">
            <a href="{{route('superadmin.licenses.create')}}" class="btn btn-yellow text-xs font-semibold">
                {{ __('New Licence') }}
            </a>
        </div>
    </div>
    <div class="relative overflow-x-auto mb-4">
        <div class="space-y-4 px-6 py-8 rounded-lg" style="background-color: rgb(235, 236, 236); ">
            <table  class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-xs">
                <thead  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="px-6 py-3">{{ __('Company') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Active modules') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Licenses key') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Expires at') }}</th>
                    <th scope="col" class="px-6 py-3 content-end"  style="width:200px"> Acciones</th>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $company->name }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $company->licenses->first()->modules_enabled ?? 'Sin licencia' }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $company->licenses->first()->license_key ?? 'Sin licencia' }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $company->licenses->first()->expires_at ?? 'Sin licencia' }}
                            </td>
                            <td class="px-6 py-4 content-end"> 
                                <div class="flex space-x-2 object-right">
                                    <a href="{{ route('superadmin.companies.edit', $company) }}" class= "btn btn-yellow text-xs">Editar</a>
                                    <form action="{{ route('superadmin.companies.destroy', $company) }}" class="delete-form" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-yellow text-xs">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>
