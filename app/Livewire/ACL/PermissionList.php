<?php

namespace App\Livewire\ACL;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PermissionList extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $name;
    public $selectedPermission;
    public $isModalOpen = false;

    protected $rules = [
        'name' => 'required|min:3|unique:permissions,name',
    ];

    public function render()
    {
        return view('livewire.acl.permission-list', [
            'permissions' => Permission::paginate(10)
        ])->extends('layouts.layoutMaster');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->selectedPermission = null;
    }

    public function store()
    {
        $this->validate();

        Permission::create(['name' => $this->name]);

        session()->flash('message', 'Permission created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->selectedPermission = $permission;
        $this->name = $permission->name;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|unique:permissions,name,' . $this->selectedPermission->id,
        ]);

        $this->selectedPermission->update(['name' => $this->name]);

        session()->flash('message', 'Permission updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Permission::find($id)->delete();
        session()->flash('message', 'Permission deleted successfully.');
    }
}
