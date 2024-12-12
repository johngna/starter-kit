<div>
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">User Roles Management</h4>
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
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                          <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                  @foreach($user->roles as $role)
                                      <span class="badge badge-light-primary">{{ $role->name }}</span>
                                  @endforeach
                              </td>
                              <td>
                                  <button class="btn btn-sm btn-primary" wire:click="edit({{ $user->id }})">
                                      <i data-feather="edit"></i> Manage Roles
                                  </button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          {{ $users->links() }}
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
                  <h5 class="modal-title">Manage User Roles</h5>
                  <button type="button" class="close" wire:click="closeModal">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  @if($selectedUser)
                      <h6>User: {{ $selectedUser->name }}</h6>
                      <form>
                          <div class="form-group">
                              @foreach($roles as $role)
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox"
                                             class="custom-control-input"
                                             id="role_{{ $role->id }}"
                                             value="{{ $role->name }}"
                                             wire:model="selectedRoles">
                                      <label class="custom-control-label" for="role_{{ $role->id }}">
                                          {{ $role->name }}
                                      </label>
                                  </div>
                              @endforeach
                              @error('selectedRoles') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                      </form>
                  @endif
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                  <button type="button" class="btn btn-primary" wire:click="update">Update</button>
              </div>
          </div>
      </div>
  </div>
  <div class="modal-backdrop fade show" style="display: @if($isModalOpen) block @else none @endif"></div>
</div>
