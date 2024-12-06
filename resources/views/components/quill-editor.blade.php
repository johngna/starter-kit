<div wire:ignore>
  <label for="quill-editor-{{ $id }}" class="form-label">{{ $label }}</label>
  <div id="quill-editor-{{ $id }}" style="min-height: 200px; border-width: 2px;" ></div>

</div>
@error($model) <span class="text-danger">{{ $message }}</span> @enderror


<textarea id="quill-content-{{ $id }}" wire:model.defer="{{ $model }}" style="display: none;"></textarea>

<script>
  document.addEventListener('livewire:init', function () {


    var quill = new Quill('#quill-editor-{{ $id }}', {
        theme: 'snow',
        placeholder: '{{ $placeholder }}',
    });

    // Configurando o valor inicial como HTML
    var initialValue = @json($initialvalue);
    if (initialValue) {
        quill.clipboard.dangerouslyPasteHTML(initialValue); // Define o conteúdo inicial no editor
    }

    quill.on('text-change', function () {

        document.getElementById('quill-content-{{ $id }}').value = quill.root.innerHTML;

        var obj = { id: '{{ $model }}', description: quill.root.innerHTML };
        Livewire.dispatch('updateQuill', obj);

    });

    Livewire.on('quillSetContent-{{ $id }}', content => {
        quill.clipboard.dangerouslyPasteHTML(content || '');
    });
  });

  // Escuta o evento updateQuill de qualquer componente Livewire
  document.addEventListener('livewire:init', () => {

  Livewire.on('updateQuill', (event) => {
    const { id, description } = event;
    @this.set(id, description);
  });

  });




</script>


