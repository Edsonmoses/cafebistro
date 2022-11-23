<div class="row">
            <div class="col-md-12">
                <div class="page-header wow fadeInDown">
                    <h1 class="white">today's specials<small>A little about us and a breif history of how we started.</small></h1>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp">
            <div class="col-md-offset-1 col-md-10">
                <div class="flexslider special-slider">
                    <ul class="slides">
                        @foreach ( $todays as $today )
                        <li>
                            <div class="slider-img">
                                <img src="{{ asset('assets/frontend/img')}}/{{ $today->image }}" alt="" />
                            </div>
                            <div class="slider-content">
                                <div class="page-header">
                                    <h1>{{ $today->name }}<small>{{ $today->subtitle }}</small></h1>
                                </div>
                                <p>{{ $today->desc }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="direction-nav hidden-sm">
                        <div class="next">
                            <a><img src="{{ asset('assets/frontend/img/right-arrow.png')}}" alt="" /></a>
                        </div>
                        <div class="prev">
                            <a><img src="{{ asset('assets/frontend/img/left-arrow.png')}}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>