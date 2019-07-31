@forelse ($categories as $category)
<option value="{{ $category->id }}">
    @for ($i = 0; $i < $level; $i++)
        --|
    @endfor
    {{ $category->name }}
</option>
@includeWhen($category->sub->count(), 'admin.partials.categories_options', [
    'categories' => $category->sub,
    'level' => $level+1
])
@empty

@endforelse