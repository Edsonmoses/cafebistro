<section class="trusted">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header wow fadeInDown">
                    <h1>Trusted By<small>These fine folks trusted tha award winning restaurant</small></h1>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp">
            <div class="col-md-12">
                <div class="trusted-sponsors">
                    @foreach ($trusted as $trusted )
                          <img src="{{ asset('assets/frontend/img/sponsor')}}/{{ $trusted->image }}" alt="{{ $trusted->name }}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Quotes section-->
     @livewire('pages.bistro-testimonials-component')
</section>