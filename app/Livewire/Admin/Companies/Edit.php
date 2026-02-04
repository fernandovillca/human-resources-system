<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use App\Traits\WithToast;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, WithToast;

    public Company $company;
    public $logo;
    public $logoPreview = null;

    protected function rules()
    {
        return [
            'company.name' => 'required|string|max:150',
            'company.email' => 'required|email|max:150|unique:companies,email,' . $this->company->id,
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

    public function mount(int $id)
    {
        $company = Company::findOrFail($id);
        $this->company = $company;

        if ($company->logo) {
            $this->logoPreview = Storage::url($company->logo);
        }
    }

    public function updatedLogo()
    {
        $this->validateOnly('logo');

        if ($this->logo) {
            $this->logoPreview = $this->logo->temporaryUrl();
        }
    }

    public function removeLogo()
    {
        if ($this->company->logo) {
            Storage::disk('public')->delete($this->company->logo);
            $this->company->logo = null;
        }

        $this->logo = null;
        $this->logoPreview = null;

        $this->company->logo = null;
        $this->company->save();
    }

    public function update()
    {
        $this->validate();

        if ($this->logo) {

            $this->company->logo = $this->logo->store('logos', 'public');
        }

        $this->company->save();

        $this->toastSuccess('¡Compañía actualizada correctamente!');

        return $this->redirect(route('companies.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.companies.edit');
    }
}
