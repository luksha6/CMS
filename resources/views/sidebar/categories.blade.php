<div class="sidebar-module">
    <h4>Kategorije</h4>
    <ol class="list-unstyled">
        @foreach($categories as $category)
            <li><a href="{{ url('/category')}}/{{ $category->name }}"> {{ $category->name }} </a></li>
        @endforeach
    </ol>
</div>