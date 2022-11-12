<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
        {{$slot}}
    </label>

    <select name="category_id[]" multiple=""
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option disabled="" selected="">-- Select Category/Categories --</option>

        @foreach ($categories as $category)
        <option <?= in_array($category->id, $selectedCats)? 'selected': '' ?> value="<?= $category->id; ?>">
        <?= $category->name; ?>
        </option>
        @endforeach

    </select>
    <p class="text-red-500 text-xs italic error mt-2"></p>
</div>