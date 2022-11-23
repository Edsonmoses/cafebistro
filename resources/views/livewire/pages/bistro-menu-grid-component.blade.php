<section class="menu menu2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Grid View<small>These fine folks trusted the award winning restaurant.</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="food-menu wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-tags4">
                                     <span data-filter="*" class="tagsort3-active">All</span>
                                    @foreach ($categories as $category )
                                        <span data-filter=".{{ $category->slug }}">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row menu-items4">
                            @foreach ($categories as $category )
                                @foreach ($menus as $menu )
                                  @if ($category->slug == $menu->category->slug)
                                        <div class="menu-item4 col-sm-4 col-xs-12 {{ $category->slug }}">
                                            <div class="menu-info">
                                                <img src="{{ asset('assets/frontend/img/menu')}}/{{ $menu->image }}" class="img-responsive" alt="" />
                                                <a href="./menu_all.html">
                                                    <div class="menu4-overlay">
                                                        <h4>{{ $menu->name }}</h4>
                                                        <p>{{ $menu->desc }}</p>
                                                        <span class="price"><b style="font-size: 18px; padding-right:5px;">KES</b>{{ $menu->price }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>