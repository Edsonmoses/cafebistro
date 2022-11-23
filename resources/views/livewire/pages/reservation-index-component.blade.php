 @foreach ( $psetting as $setting )
        @if ($setting->reservations =='reservation')
            @livewire('pages.bistro-reservations-component')
        @elseif ($setting->reservations =='opentable')
            @livewire('pages.bistro-reservations-opentable-component')
        @endif
    @endforeach