          
          <!-- auto-generated-menu-items -->
@foreach($checkmateMenus->menus as $section)
@if($section->items)
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">{!! $section->icon !!}{{ $section->section }}</a>
            <ul class="nav-dropdown-items">
@foreach($section->items as $item)
@if(isset($item->submenu))
              <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">{!! $item->icon !!}{{ $item->name }}</a>
                <ul class="nav-dropdown-items">
@foreach($item->submenu as $submenu)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $submenu->link }}">{!! $submenu->icon !!}{{ $submenu->name }}</a>
                  </li>
@endforeach
                </ul>
              </li>
@else
              <li class="nav-item">
                <a class="nav-link" href="{{ $item->link }}">{!! $item->icon !!}{{ $item->name }}</a>
              </li>
@endif
@endforeach
            </ul>
          </li>
@endif
@endforeach
          <!-- /.auto-generated-menu-items -->