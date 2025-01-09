@extends('layouts.app')  <!-- Use the layout you created -->

@section('product_crud', 'Home')  <!-- Set the title for this page -->

@section('content')  <!-- Define the content for this page -->
    <!-- Livewire Components -->
    <livewire:all-product></livewire:all-product>
    <livewire:product-modal></livewire:product-modal>
    <livewire:edit-modal></livewire:edit-modal>
    <livewire:preview-modal></livewire:preview-modal>
    <livewire:delete-modal></livewire:delete-modal>
@endsection
