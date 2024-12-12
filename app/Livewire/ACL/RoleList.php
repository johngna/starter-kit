<?php

namespace App\Livewire\ACL;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleList extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $name;
    public $selectedRole;
    public $isModalOpen = false;
    public $permissions = [];
    public $selectedPermissions = [];

    protected $rules = [
        'name' => 'required|min:3|unique:roles,name',
        'selectedPermissions' => 'required|array|min:1',
    ];

    public function render()
    {
        return view('livewire.acl.role-list', [
            'roles' => Role::with('permissions')->paginate(10)
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
        $this->selectedPermissions = [];
        $this->selectedRole = null;
    }

    public function store()
    {
        $this->validate();

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->selectedRole = $role;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|unique:roles,name,' . $this->selectedRole->id,
            'selectedPermissions' => 'required|array|min:1',
        ]);

        $this->selectedRole->update(['name' => $this->name]);
        $this->selectedRole->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('message', 'Role deleted successfully.');
    }
}
