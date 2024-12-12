<div>
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Roles Management</h4>
          <button class="btn btn-primary" wire:click="create">
              <i data-feather="plus"></i> Add New Role
          </button>
      </div>
      <div class="card-body">
          @if (session()->has('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif

          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Permissions</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($roles as $role)
                          <tr>
                              <td>{{ $role->name }}</td>
                              <td>
                                  @foreach($role->permissions as $permission)
                                      <span class="badge badge-light-primary">{{ $permission->name }}</span>
                                  @endforeach
                              </td>
                              <td>
                                  <button class="btn btn-sm btn-primary" wire:click="edit({{ $role->id }})">
                                      <i data-feather="edit"></i>
                                  </button>
                                  <button class="btn btn-sm btn-danger" wire:click="delete({{ $role->id }})"
                                          onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                      <i data-feather="trash"></i>
                                  </button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          {{ $roles->links() }}
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade @if($isModalOpen) show @endif"
       style="display: @if($isModalOpen) block @else none @endif"
       tabindex="-1"
       role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">{{ $selectedRole ? 'Edit Role' : 'Create Role' }}</h5>
                  <button type="button" class="close" wire:click="closeModal">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="form-group">
                          <label>Role Name</label>
                          <input type="text" class="form-control" wire:model="name">
                          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="form-group">
                          <label>Permissions</label>
                          @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox"
                                         class="custom-control-input"
                                         id="permission_{{ $permission->id }}"
                                         value="{{ $permission->name }}"
                                         wire:model="selectedPermissions">
                                  <label class="custom-control-label" for="permission_{{ $permission->id }}">
                                      {{ $permission->name }}
                                  </label>
                              </div>
                          @endforeach
                          @error('selectedPermissions') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                  <button type="button" class="btn btn-primary" wire:click="{{ $selectedRole ? 'update' : 'store' }}">
                      {{ $selectedRole ? 'Update' : 'Create' }}
                  </button>
              </div>
          </div>
      </div>
  </div>
  <div class="modal-backdrop fade show" style="display: @if($isModalOpen) block @else none @endif"></div>
</div>
