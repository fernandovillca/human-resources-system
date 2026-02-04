<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use App\Traits\WithToast;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, WithToast;

    public $company;
    public $logo;
    public $logoPreview = null;

    protected function rules()
    {
        return [
            'company.name' => 'required|string|max:150',
            'company.email' => 'required|email|max:150|unique:companies,email',
            'company.website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    protected $messages = [
        'company.name.required' => 'El nombre de la compañía es obligatorio.',
        'company.name.max' => 'El nombre no debe exceder 150 caracteres.',
        'company.email.required' => 'El correo electrónico es obligatorio.',
        'company.email.email' => 'Debe ser un correo electrónico válido.',
        'company.email.unique' => 'Este correo ya está registrado.',
        'company.website.url' => 'El sitio web debe ser una URL válida.',
        'logo.image' => 'El archivo debe ser una imagen.',
        'logo.mimes' => 'El logo debe ser un archivo tipo: jpeg, png, jpg o webp.',
        'logo.max' => 'El logo no debe exceder 2MB.',
    ];

    public function mount()
    {
        $this->company = new Company();
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($this->logo) {
            $this->logoPreview = $this->logo->temporaryUrl();
        }
    }

    public function removeLogo()
    {
        $this->logo = null;
        $this->logoPreview = null;
    }

    public function save()
    {
        $this->validate();

        if ($this->logo) {
            $this->company->logo = $this->logo->store('logos', 'public');
        }

        $this->company->save();

        $this->toastSuccess('¡Compañía creada exitosamente!');


        return $this->redirect(route('companies.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}
