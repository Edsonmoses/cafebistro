  <section class="menu space60" id="menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Tile Style<small>These fine folks trusted the award winning restaurant.</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="food-menu wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-tags3">
                                    <span data-filter="*" class="tagsort3-active">All</span>
                                    @foreach ($categories as $category )
                                        <span data-filter=".{{ $category->slug }}">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row menu-items3" style="height: 50px !important">
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
                    </div>
                </div>
            </section>