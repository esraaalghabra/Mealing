@section('side-links')
    <x-side-link href="{{ route('ingredients.create') }}" :active="request()->routeIs('ingredients.create')">
        Create new Ingredient
    </x-side-link>
    <x-side-link href="{{ route('ingredients.index') }}" :active="request()->routeIs('ingredients.index')">
        My Ingredients
    </x-side-link>
    <x-side-link href="{{ route('ingredients.all') }}" :active="request()->routeIs('ingredients.all')">
        All Ingredients
    </x-side-link>
@endsection