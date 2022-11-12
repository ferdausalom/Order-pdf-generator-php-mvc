@extends('layout')

@section('title', 'Categories')

@section('content')

<!-- cards -->

<div
    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

    @component('message', ['sessionName' => 'message'])@endcomponent

    @component('table-top', ['href'=>'/categories/create', 'btn'=> 'Category'])
    Categories
    @endcomponent

    <div class="flex-auto px-0 pt-0 pb-6">
        <div class="p-0 overflow-x-auto ps">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                <thead class="align-bottom">
                    <tr>

                        @component('table-th')
                        SL.
                        @endcomponent

                        @component('table-th')
                        Name
                        @endcomponent

                        @component('table-th')
                        Action
                        @endcomponent

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp

                    @foreach ($categories as $category)

                    <tr>
                        @component('table-td')
                        <?= $i++; ?>
                        @endcomponent

                        @component('table-td')
                        <?= $category->name; ?>
                        @endcomponent

                        <td
                            class="p-2 flex align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                            @component('button-form', ['action'=> '/categories/edit', 'method'=> 'GET', 'id' =>
                            $category->id])
                            @component('edit-svg')@endcomponent
                            @endcomponent

                            @component('button-form', ['action'=> '/categories/delete', 'method'=> 'POST', 'id' =>
                            $category->id])
                            @component('delete-svg')@endcomponent
                            @endcomponent

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end cards -->

@endsection