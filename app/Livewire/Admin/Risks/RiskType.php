<?php

namespace App\Livewire\Admin\Risks;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RiskType as RiskTypeModel;

#[Layout('layouts.app')]
class RiskType extends Component
{
    use WithPagination;

    public $showForm = false;
    public $editingId = null;
    public $name = '';
    public $description = '';
    public $search = '';

    protected $rules = [
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:500',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEdit($id)
    {
        $risk = RiskTypeModel::findOrFail($id);
        $this->editingId = $risk->id;
        $this->name = $risk->name;
        $this->description = $risk->description;
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            RiskTypeModel::findOrFail($this->editingId)->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Risk type updated successfully.');
        } else {
            RiskTypeModel::create([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Risk type created successfully.');
        }

        $this->resetForm();
    }

    public function delete($id)
    {
        RiskTypeModel::findOrFail($id)->delete();
        session()->flash('message', 'Risk type deleted successfully.');
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->editingId = null;
        $this->name = '';
        $this->description = '';
        $this->showForm = false;
    }

    public function render()
    {
        $riskTypes = RiskTypeModel::withCount('reviews')
            ->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.admin.risks.risk-type', [
            'riskTypes' => $riskTypes,
        ]);
    }
}
