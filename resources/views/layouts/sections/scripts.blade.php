<!-- BEGIN: Vendor JS-->

@vite([
'resources/assets/vendor/libs/jquery/jquery.js',
'resources/assets/vendor/libs/popper/popper.js',
'resources/assets/vendor/js/bootstrap.js',
'resources/assets/vendor/libs/node-waves/node-waves.js',
'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
'resources/assets/vendor/libs/hammer/hammer.js',
'resources/assets/vendor/libs/typeahead-js/typeahead.js',
'resources/assets/vendor/js/menu.js',
'resources/assets/vendor/libs/toastr/toastr.js',
'resources/assets/vendor/libs/quill/katex.js',
'resources/assets/vendor/libs/quill/quill.js',
'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
'resources/assets/vendor/libs/bs-stepper/bs-stepper.js'
])

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
@vite(['resources/assets/js/main.js'])

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

@stack('modals')
@livewireScripts

{{-- Toast Function --}}
<script>
  function showToast(msg, title = '', type = 'text-primary', animation = 'animate__fade', placement = 'top-0 end-0') {
    const toastExample = document.querySelector('.toast-ex');
    let toast;


    if(type == 'text-undefined'){
      type = 'text-primary';
    }

    // Dispose toast when open another
    function toastDispose(toast) {
      if (toast && toast._element !== null) {
        toastExample.classList.remove(type, animation);
        toastExample.querySelector('.ti').classList.remove(type);
        DOMTokenList.prototype.remove.apply(toastExample.classList, placement.split(' '));
        toast.dispose();
      }
    }

    if (toast) {
      toastDispose(toast);
    }

    // Set the toast content
    toastExample.querySelector('.toast-title').innerText = title;
    toastExample.querySelector('.toast-message').innerText = msg;

    // Apply classes
    toastExample.classList.add(animation);
    toastExample.querySelector('.ti').classList.add(type);
    DOMTokenList.prototype.add.apply(toastExample.classList, placement.split(' '));

    // Show the toast
    toast = new bootstrap.Toast(toastExample);
    toast.show();
  }
</script>

{{-- Livewire Toast --}}
<script>
  document.addEventListener('livewire:init', () => {
      Livewire.on('toast', (event) => {
          window.showToast(event[0].message, event[0].title, 'text-'+event[0].type, event[0].animation, event[0].placement);
      });
  });
</script>


<script>
  confirmText = document.querySelector('#confirm-text')

  var id = confirmText.getAttribute('data-id')
  var method = confirmText.getAttribute('data-method')

if (confirmText) {
    confirmText.onclick = function () {
      Swal.fire({
        title: 'Confirma esta exclusão?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar',
        customClass: {
          confirmButton: 'btn btn-danger me-3 waves-effect waves-light',
          cancelButton: 'btn btn-label-secondary waves-effect waves-light'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Livewire.dispatch(method, {'id': id})
        }
      });
    };
  }

</script>