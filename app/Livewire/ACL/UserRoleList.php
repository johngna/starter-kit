<?php

namespace App\Livewire\ACL;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserRoleList extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $selectedUser;
    public $selectedRoles = [];
    public $isModalOpen = false;

    protected $rules = [
        'selectedRoles' => 'required|array|min:1',
    ];

    public function render()
    {
        return view('livewire.acl.user-role-list', [
            'users' => User::with('roles')->paginate(10),
            'roles' => Role::all()
        ])->extends('layouts.layoutMaster');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->selectedUser = $user;
        $this->selectedRoles = $user->roles->pluck('name')->toArray();
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

    public function update()
    {
        $this->validate();

        $this->selectedUser->syncRoles($this->selectedRoles);

        session()->flash('message', 'User roles updated successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->selectedUser = null;
        $this->selectedRoles = [];
    }
}
