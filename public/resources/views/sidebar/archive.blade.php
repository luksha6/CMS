<div class="sidebar-module">
    <h4>Arhiva</h4>
    <ol class="list-unstyled">
        @foreach($archives as $archive)
            <li><a href="?month={{ $archive['month'] }}&year={{ $archive['year'] }}">{{ $archive['month'] . ' ' .  $archive['year'] }}</a></li>
        @endforeach
    </ol>
</div>