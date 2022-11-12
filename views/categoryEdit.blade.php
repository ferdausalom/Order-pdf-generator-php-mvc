@extends('layout')

@section('title', 'Edit Category')

@section('content')

@component('message', ['sessionName' => 'error'])@endcomponent

@component('form', ['action'=> '/categories/update', 'method'=> 'POST', 'enctype'=> ''])

@component('input-text', ['name'=> 'name','type'=>'text', 'placeholder'=>'', 'value'=> $category->name])
Name
@endcomponent

<input type="hidden" name="id" value="<?= $category->id; ?>">

@component('button')
Save Data
@endcomponent

@endcomponent

@endsection