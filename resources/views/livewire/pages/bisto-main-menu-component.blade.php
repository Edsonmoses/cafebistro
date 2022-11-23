@foreach ( $psetting as $setting )
@if ($setting->menu == 'grid')
    @livewire('pages.bistro-menu-grid-component')
@elseif ($setting->menu == 'list')
    @livewire('pages.bistro-menu-list-component')
@elseif ($setting->menu == 'overlay')
    @livewire('pages.bistro-menu-overlay-component')
@else
    @livewire('pages.bistro-menu-tile-component')
@endif
@endforeach


