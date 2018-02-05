<ul class="sub-nav">
    @foreach($pages as $submenu)
        <li>
            <a href="{{ $submenu->pagelink }}">{{ $submenu->pagename }}</a>
            @if (isset($submenu->submenu))
            @include('_partials.submenu', ['pages' => $pages->submenu])
            @endif
        </li>
    @endforeach
</ul>
