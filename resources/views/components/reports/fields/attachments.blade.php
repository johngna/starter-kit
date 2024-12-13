<div class="attachment-section">
  <div class="mb-3">
      <label class="form-label">
          <i class="fas fa-paperclip me-2"></i>Anexar Documentos
      </label>
      <div class="upload-area p-3 border rounded @error('temporaryAttachments.*') border-danger @enderror">
          <div class="text-center mb-3">
              <input type="file"
                     class="d-none"
                     wire:model="temporaryAttachments"
                     multiple
                     id="attachment-input"
                     accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
              <label for="attachment-input" class="btn btn-outline-primary mb-0">
                  <i class="fas fa-cloud-upload-alt me-2"></i>Escolher Arquivos
              </label>
              <div class="small text-muted mt-2">
                  Arraste arquivos aqui ou clique para selecionar
                  <br>
                  Tipos permitidos: PDF, DOC, DOCX, JPG, JPEG, PNG (Máx: 10MB)
              </div>
          </div>

          @error('temporaryAttachments.*')
              <div class="alert alert-danger mb-2">
                  {{ $message }}
              </div>
          @enderror

          @if(count($attachments) > 0)
              <div class="attached-files">
                  @foreach($attachments as $index => $attachment)
                      <div class="attached-file d-flex align-items-center p-2 border rounded mb-2">
                          <i class="fas fa-file me-2"></i>
                          <div class="flex-grow-1">
                              <div class="fw-bold">{{ $attachment['name'] }}</div>
                              <div class="small text-muted">{{ $attachment['size'] }}</div>
                          </div>
                          <button type="button"
                                  class="btn btn-link text-danger"
                                  wire:click="removeAttachment({{ $index }})">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                  @endforeach
              </div>
          @endif
      </div>
  </div>
</div>
