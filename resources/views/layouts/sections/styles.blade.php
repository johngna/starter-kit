<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet">

@vite([
'resources/assets/vendor/fonts/tabler-icons.scss',
'resources/assets/vendor/fonts/fontawesome.scss',
'resources/assets/vendor/fonts/flag-icons.scss',
'resources/assets/vendor/libs/node-waves/node-waves.scss',
'resources/assets/vendor/libs/toastr/toastr.scss',
'resources/assets/vendor/libs/animate-css/animate.scss',
'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
'resources/assets/vendor/libs/bs-stepper/bs-stepper.scss',
])
<!-- Core CSS -->
@vite(['resources/assets/vendor/scss'.$configData['rtlSupport'].'/core' .($configData['style'] !== 'light' ? '-' .
$configData['style'] : '') .'.scss',
'resources/assets/vendor/scss'.$configData['rtlSupport'].'/' .$configData['theme'] .($configData['style'] !== 'light' ?
'-' . $configData['style'] : '') .'.scss',
'resources/assets/css/demo.css'])


<!-- Vendor Styles -->
@vite([
'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss',
'resources/assets/vendor/libs/typeahead-js/typeahead.scss',
'resources/assets/vendor/libs/quill/typography.scss',
'resources/assets/vendor/libs/quill/katex.scss',
'resources/assets/vendor/libs/quill/editor.scss',
])
@yield('vendor-style')

<!-- Page Styles -->
@yield('page-style')

@livewireStyles




<!-- Custom Styles -->
<style>

.upload-area {
    background-color: #f8f9fa;
    border: 2px dashed #dee2e6;
    transition: all 0.3s ease;
}

.upload-area:hover {
    border-color: #6c757d;
    background-color: #fff;
}

.upload-area.drag-over {
    border-color: #0d6efd;
    background-color: #e9ecef;
}

.attached-file {
    background-color: #fff;
    transition: all 0.2s ease;
}

.attached-file:hover {
    background-color: #f8f9fa;
}

.attached-file .btn-link {
    padding: 0;
    font-size: 1.1rem;
}

.attached-file .btn-link:hover {
    color: #dc3545;
    text-decoration: none;
}

</style>
