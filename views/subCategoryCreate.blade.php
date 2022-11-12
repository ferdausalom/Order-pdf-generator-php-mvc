@extends('layout')

@section('title', 'Create Sub Category')

@section('content')

    <!-- cards -->

    @component('message', ['sessionName' => 'error'])@endcomponent

    @component('form', ['action'=> '/sub-categories', 'method'=> 'POST', 'enctype'=> ''])

        @component('select', ['categories'=> $categories, 'selectedCats' => []])
        Category
        @endcomponent

        @component('input-text', ['name'=> 'name','type'=>'text','placeholder'=> 'Sub Category', 'value'=> ''])
        Sub Category
        @endcomponent

        @component('button')
        Save Data
        @endcomponent

    @endcomponent

    <!-- cards -->

@endsection