
<section class="about" id="about">
    <div class="container">
        <div class="row">
            @livewire('pages.bistro-home-about-component')
    </div>
</section>

<!-- Today's special page-->
<section class="special">
    <div class="container">
        @livewire('pages.bistro-todays-specials-component')
    </div>
</section>

<!-- Reservations page-->
 @livewire('pages.bistro-reservations-component')

<!-- Our features-->
 @livewire('pages.bistro-features-component')

<!-- menu-->
<section class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header wow fadeInDown">
                    <h1>Our menu<small>These fine folks trusted the award winning restaurant.</small></h1>
                </div>
            </div>
        </div>
        <div class="food-menu wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-tags3">
                        <span data-filter="*" class="tagsort3-active">All </span>
                        @foreach ($categories as $category )
                            <span data-filter=".{{ $category->slug }}">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row menu-items3" id="limited">
                @foreach ($categories as $category )
                    @foreach ($menus as $menu )
                    @if ($category->slug == $menu->category->slug)

                    <div class="menu-item3 col-sm-6 col-xs-12 {{ $category->slug }}">
                        <img src="{{asset('assets/frontend/img/menu')}}/{{ $menu->image }}" class="img-responsive" alt="" />
                        <div class="menu-wrapper">
                            <h4>{{ $menu->name }}</h4>
                            <span class="price">KES{{ $menu->price }}</span>
                            <div class="dotted-bg"></div>
                            <p>{{ $menu->desc }}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @endforeach
            </div>
           <div class="col-md-12 col-sm-12">
                <div class="reservation-btn text-center">
                    <a href="/menu" class="btn btn-default btn-lg" id="js-reservation-btn" wire:click.prevent="addReservation()">View Full Menu</a>
                    <div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted BY-->
 @livewire('pages.bistro-trusted-component')
<!--instagram-->
 @livewire('pages.bistro-instagram-component')
