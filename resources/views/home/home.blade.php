<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
<!-- Start block -->
<livewire:all-product></livewire:all-product>
<!-- End block -->
<!-- Create modal -->
<livewire:product-modal>
    
</livewire:product-modal>

<livewire:edit-modal>
    
</livewire:edit-modal>
<!-- Read modal -->
<livewire:preview-modal>
    
</livewire:preview-modal>
<!-- Delete modal -->
<livewire:delete-modal>
    
</livewire:delete-modal>
@livewireScripts
</body>
</html>