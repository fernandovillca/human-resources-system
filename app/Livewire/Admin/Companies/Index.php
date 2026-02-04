<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use App\Traits\WithToast;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $perPage = 5;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirm-delete', id: $id);
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $companyName = $company->name;

        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        $this->dispatch('confirm-delete', id: $id);

        $this->dispatch('success-delete', "Compañía '{$companyName}' eliminada correctamente");
    }


    public function render()
    {
        $companies = Company::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.companies.index', [
            'companies' => $companies,
        ]);
    }
}
