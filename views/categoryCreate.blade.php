@extends('layout')

@section('title', 'Create Category')

@section('content')

<!-- cards -->

@component('message', ['sessionName' => 'error'])@endcomponent

@component('form', ['action'=> '/categories', 'method'=> 'POST', 'enctype'=> ''])

@component('input-text', ['name'=> 'name','type'=>'text','placeholder'=> 'Category', 'value'=> ''])
Name
@endcomponent

@component('button')
Save Data
@endcomponent

@endcomponent

<!-- cards -->

@endsection