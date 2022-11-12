@extends('layout')

@section('title', 'Create Product')

@section('content')

@component('message', ['sessionName' => 'error'])@endcomponent

{{-- Form start --}}

@component('form', ['action'=> '/products', 'method'=> 'POST', 'enctype'=> 'multipart/form-data'])

    @component('input-text', ['name'=> 'name','type'=>'text','placeholder'=> 'Name', 'value'=> ''])
    Name
    @endcomponent

    @component('input-text', ['name'=> 'price','type'=>'number','placeholder'=> 'E.g. 50.40', 'value'=> ''])
    Price
    @endcomponent

    @component('textarea', ['name'=> 'body', 'placeholder'=> 'Body', 'value'=> ''])
    Body
    @endcomponent

    @component('select-multiple', ['categories'=> $categories, 'selectedCats' => []])
    Category
    @endcomponent

    @component('input-file', ['name'=> 'thumbnail', 'type'=>'file', 'value'=> ''])
    Thumbnail
    @endcomponent

    @component('button')
    Save Data
    @endcomponent

@endcomponent

{{-- Form End --}}

@endsection