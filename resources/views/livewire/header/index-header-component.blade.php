 @if(Request::is('/'))
    @foreach ( $psetting as $setting )
        @if ($setting->header =='video')
            @livewire('header.bistro-header-video-component')
        @elseif ($setting->header =='animation')
            @livewire('header.bistro-header-animation-component')
        @elseif ($setting->header =='parallax')
            @livewire('header.bistro-header-parallax-component')
        @elseif ($setting->header =='slider')
            @livewire('header.bistro-header-slider-component')
        @elseif ($setting->header =='image')
            @livewire('header.bistro-header-image-component')
        @else
            @if ($loop->first)
                @livewire('header.bistro-header-image-component')
            @endif
        @endif
    @endforeach
@else
    @livewire('header.bistro-header-component')
@endif