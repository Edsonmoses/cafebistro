 <section class="about2">
                <div class="container">
                    <div class="row wow fadeInUp">
                        @foreach ($pages as $page )
                            @if ($page->pcategory->name == 'About us')
                                <div class="col-md-5">
                                    @php
                                        $images = explode(",",$page->image);
                                    @endphp
                                    @if (!empty($images[1]))
                                    <img src="{{ asset('assets/frontend/img')}}/{{ $images[1] }}" class="img-responsive" alt="{{ $page->name }}" />
                                    @endif
                                </div>
                                <div class="col-md-7 text-left">
                                    <h2 class="text-left">{{ $page->title }}</h2>
                                    <p>{{ $page->body }}</p>
                                    <a class="btn btn-default" role="button" href="#menu">See Our Menu</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Services -->
            <section class="services" id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1 class="white">Special Service<small>What Special services we are offering now</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="services-slider wow fadeIn">
                                 @foreach ($pages as $service )
                                    @if ($service->pcategory->name == 'Special Service')
                                        <div class="service-content text-center">
                                            @php
                                                $images = explode(",",$service->image);
                                            @endphp
                                            @if (!empty($images[1]))
                                            <img src="{{ asset('assets/frontend/img')}}/{{ $images[1] }}" class="center-block" alt="{{ $service->title }}" />
                                            @endif
                                            <h4 class="text-uppercase">{{ $service->name }}</h4>
                                            <p>{{ $service->body }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Team -->
            <section class="team">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Our Team<small>The Hardworking Team behind the restaurant</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($teams as $team)
                            <div class="col-md-3 col-sm-6 text-center">
                                <div class="team-staff wow fadeInUp" data-wow-delay="0.2s">
                                    <img src="{{ asset('assets/frontend/img/team')}}/{{ $team->image }}" class="img-responsive center-block" alt="{{ $team->name }}" />
                                    <h4>{{ $team->name }}</h4>
                                    <p>{{ $team->position }}</p>
                                    <ul class="team-social">
                                        <li><a href="{{ $team->social }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{ $team->social }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{ $team->social }}"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <div class="trusted">
                <!-- Quotes section-->
                @livewire('pages.bistro-testimonials-component')
            </div>

            <!-- menu-->
             @livewire('pages.bistro-menu-tile-component');