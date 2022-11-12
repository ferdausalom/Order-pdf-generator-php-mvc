@extends('layout')

@section('title', 'Sub Categories')

@section('content')

<!-- cards -->

<div
    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

    @component('message', ['sessionName' => 'message'])@endcomponent

    @component('table-top', ['href'=>'/sub-categories/create', 'btn'=> 'Sub Category'])
    Sub Categories
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
                        Sub category
                        @endcomponent

                        @component('table-th')
                        Category
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

                    @if (count($allSubCategory) > 0)
                        @foreach ($allSubCategory as $subCategory)
                            <tr>
                                @component('table-td')
                                    <?= $i++; ?>
                                @endcomponent                            

                                @component('table-td')
                                    <?= $subCategory->name; ?>
                                @endcomponent

                                @foreach ($categories as $category)              
                                    @if ($subCategory->category_id === $category->id)
                                        @component('table-td')
                                            <?= $category->name; ?>   
                                        @endcomponent
                                    @endif
                                @endforeach

                                <td
                                    class="p-2 flex align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                                    @component('button-form', ['action'=> '/sub-categories/delete', 'method'=> 'POST', 'id' => $subCategory->id])
                                        @component('delete-svg')@endcomponent
                                    @endcomponent

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h4 class="text-center" style="color: brown">404 no content!</h4>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end cards -->

@endsection