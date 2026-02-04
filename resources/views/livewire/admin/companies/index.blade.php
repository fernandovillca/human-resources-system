<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">
            Compañías
        </flux:heading>
        <flux:subheading size="lg" class="mb-6">
            Lista de Compañías
        </flux:subheading>
        <flux:separator />
    </div>

    <div class="mb-4 flex justify-between items-center gap-4">
        <div class="flex-1 max-w-md">
            <flux:input wire:model.live.debounce.300ms="search" placeholder="Buscar compañía..."
                icon="magnifying-glass" />
        </div>

        <flux:button variant="primary" icon="plus" class="cursor-pointer">
            Nueva Compañía
        </flux:button>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md rounded-lg">
                    <table class="min-w-full table">
                        <thead class="bg-gray-50 font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                                <th class="font-bold">#</th>
                                <th class="text-left">Nombre de la Compañía</th>
                                <th class="text-center">N° de empleados</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($companies as $company)
                            <tr
                                class="border-b dark:border-neutral-500 hover:bg-gray-50 dark:hover:bg-neutral-700 transition-colors">
                                <td class="text-center font-bold">
                                    {{ $company->id }}
                                </td>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $company->logo_url }}" alt="{{ $company->name }}"
                                            class="w-10 h-10 rounded-lg object-cover" />
                                        <span class="font-medium">{{ $company->name }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <flux:badge color="zinc" size="sm">
                                        {{ $company->departments->flatMap->designations->flatMap->employees->count() }}
                                    </flux:badge>
                                </td>

                                <td>
                                    <div class="flex justify-center items-center gap-2">
                                        <flux:button variant="ghost" icon="pencil" size="sm" class="cursor-pointer" />
                                        <flux:button variant="danger" icon="trash" size="sm" class="cursor-pointer" />
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <flux:icon.building-office-2 class="w-12 h-12 text-gray-400" />
                                        <p class="text-gray-500 dark:text-gray-400">
                                            No se encontraron compañías
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
