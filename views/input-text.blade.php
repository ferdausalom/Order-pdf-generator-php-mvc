<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{$name}}">
        {{$slot}}
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="name" name="{{$name}}" type="{{$type}}" @if ($placeholder) placeholder="{{$placeholder}}" @endif @if($value)
        value="{{$value}}" @endif>

    <p id="title_err" class="text-red-500 text-sm italic error mt-2"></p>
</div>