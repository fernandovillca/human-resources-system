<div>
    <div class="relative mb-6 w-full">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">
                    Compañías
                </flux:heading>
                <flux:subheading size="lg" class="mb-6">
                    Crear nueva compañía
                </flux:subheading>
            </div>
            <flux:button variant="ghost" icon="arrow-left" href="{{ route('companies.index') }}" wire:navigate>
                Volver
            </flux:button>
        </div>
        <flux:separator />
    </div>

    <div class="max-w-3xl mx-auto">
        <form wire:submit="save" class="space-y-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-6">
                    Información de la Compañía
                </h3>

                <div class="space-y-6">
                    <div>
                        <flux:input label="Nombre de la Compañía" placeholder="Ej: Acme Corporation"
                            wire:model.blur="company.name" type="text" />
                        @error('company.name')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <div>
                        <flux:input label="Correo Electrónico" placeholder="correo@empresa.com"
                            wire:model.blur="company.email" type="email" />
                        @error('company.email')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <div>
                        <flux:input label="Sitio Web" placeholder="https://www.empresa.com"
                            wire:model.blur="company.website" type="url" />
                        <flux:description>
                            Opcional. Incluir http:// o https://
                        </flux:description>
                        @error('company.website')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <div>
                        <flux:label>Logo de la Compañía</flux:label>
                        <flux:description class="mb-3">
                            Formatos permitidos: JPG, PNG, WEBP. Tamaño máximo: 2MB
                        </flux:description>

                        <div class="space-y-4">
                            @if ($logoPreview)
                                <div class="relative inline-block">
                                    <img src="{{ $logoPreview }}" alt="Vista previa del logo"
                                        class="w-32 h-32 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-600 shadow-sm">
                                    <button type="button" wire:click="removeLogo"
                                        class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1.5 shadow-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endif

                            <div class="flex items-center gap-4">
                                <label class="flex-1">
                                    <input type="file" wire:model="logo"
                                        accept="image/jpeg,image/png,image/jpg,image/webp"
                                        class="block w-full text-sm text-gray-500 dark:text-gray-400
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-lg file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-nos-800 file:text-white
                                            dark:file:bg-nos-600
                                            hover:file:bg-nos-700
                                            dark:hover:file:bg-nos-500
                                            file:cursor-pointer
                                            cursor-pointer
                                            border border-gray-300 dark:border-gray-600 rounded-lg
                                            focus:outline-none focus:ring-2 focus:ring-nos-500">
                                </label>

                                <div wire:loading wire:target="logo"
                                    class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    <span>Cargando...</span>
                                </div>
                            </div>

                            @error('logo')
                                <flux:error>{{ $message }}</flux:error>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4">
                <flux:button variant="ghost" href="{{ route('companies.index') }}" wire:navigate>
                    Cancelar
                </flux:button>

                <flux:button variant="primary" type="submit" icon="check">
                    Crear Compañía
                </flux:button>
            </div>
        </form>
    </div>
</div>
