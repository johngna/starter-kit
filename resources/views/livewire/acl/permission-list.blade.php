<div>
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Permissions Management</h4>
          <button class="btn btn-primary" wire:click="create">
              <i data-feather="plus"></i> Add New Permission
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
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($permissions as $permission)
                          <tr>
                              <td>{{ $permission->name }}</td>
                              <td>
                                  <button class="btn btn-sm btn-primary" wire:click="edit({{ $permission->id }})">
                                      <i data-feather="edit"></i>
                                  </button>
                                  <button class="btn btn-sm btn-danger" wire:click="delete({{ $permission->id }})"
                                          onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                      <i data-feather="trash"></i>
                                  </button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          {{ $permissions->links() }}
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
                  <h5 class="modal-title">{{ $selectedPermission ? 'Edit Permission' : 'Create Permission' }}</h5>
                  <button type="button" class="close" wire:click="closeModal">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="form-group">
                          <label>Permission Name</label>
                          <input type="text" class="form-control" wire:model="name">
                          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                  <button type="button" class="btn btn-primary"
                          wire:click="{{ $selectedPermission ? 'update' : 'store' }}">
                      {{ $selectedPermission ? 'Update' : 'Create' }}
                  </button>
              </div>
          </div>
      </div>
  </div>
  <div class="modal-backdrop fade show" style="display: @if($isModalOpen) block @else none @endif"></div>
</div>
