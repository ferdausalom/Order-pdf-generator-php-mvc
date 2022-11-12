<form class="w-1/2" action="{{$action}}" method="{{$method}}">
    <input type="hidden" name="id" value="{{$id}}">
    <button type="submit">

        {{$slot}}

    </button>
</form>