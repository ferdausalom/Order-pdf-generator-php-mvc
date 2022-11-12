@extends('layout')

@section('title', 'Edit Product')

@section('content')

@component('message', ['sessionName' => 'error'])@endcomponent

{{-- Form start --}}

@component('form', ['action'=> '/products/update', 'method'=> 'POST', 'enctype'=> 'multipart/form-data'])

    @component('input-text', ['name'=> 'name','type'=>'text','placeholder'=> 'Name', 'value'=> $product->name])
    Name
    @endcomponent

    @component('input-text', ['name'=> 'price','type'=>'number','placeholder'=> 'E.g. 50.40', 'value'=> ($product->price/100)])
    Price
    @endcomponent

    @component('textarea', ['name'=> 'body', 'placeholder'=> 'Body', 'value'=> $product->body])
    Body
    @endcomponent

    @component('select', ['categories'=> $categories, 'selectedCats' => $selectedCats])
    Category
    @endcomponent

    @component('input-file', ['name'=> 'thumbnail', 'type'=>'file', 'value'=> $product->thumbnail])
    Thumbnail
    @endcomponent

    <input type="hidden" name="id" value="<?= $product->id; ?>">

    @component('button')
    Save Data
    @endcomponent

@endcomponent

{{-- Form End --}}

@endsection