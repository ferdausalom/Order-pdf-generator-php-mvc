<form action="{{$action}}" class="shadow-md rounded px-8 pt-6 pb-8 mb-4" method="{{$method}}" @if ($enctype)
    enctype="{{$enctype}}" @endif>
    {{$slot}}
</form>