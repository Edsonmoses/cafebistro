 <section class="menu space60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>List Style<small>These fine folks trusted the award winning restaurant.</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="food-menu wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-tags">
                                    <span data-filter="*" class="tagsort-active">All</span>
                                    @foreach ($categories as $category )
                                        <span data-filter=".{{ $category->slug }}">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row menu-items">
                            @foreach ($categories as $category )
                                @foreach ($menus as $menu )
                                    @if ($category->slug == $menu->category->slug)
                                        <div class="menu-item col-sm-6 col-xs-12 {{ $category->slug }}">
                                            <div class="clearfix menu-wrapper">
                                                <h4>{{ $menu->name }}</h4>
                                                <span class="price">KES {{ $menu->price }}</span>
                                                <div class="dotted-bg"></div>
                                            </div>
                                            <p>{{ $menu->desc }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>