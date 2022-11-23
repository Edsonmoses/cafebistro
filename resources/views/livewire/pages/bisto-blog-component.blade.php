@foreach ( $psetting as $setting )
@if ($setting->blog == 'left')
    @livewire('pages.bisto-blog-left-sidebar-component')
@elseif ($setting->blog == 'right')
    @livewire('pages.bisto-blog-right-sidebar-component')
@elseif ($setting->blog == 'masonry')
    @livewire('pages.bisto-blog-masonry-component')
@else
<div class="blog-content">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($blogs as $blog )
                <article class="wow fadeInUp">
                <div class="post-img">
                    @if ($blog->image)
                        <img src="{{ asset('assets/frontend/img/blog')}}/{{ $blog->image  }}" class="img-responsive" alt="{{ $blog->name }}" />
                    <div class="post-format"><i class="fa fa-file-image-o"></i></div>
                    @else
                    <div class="blog-slider">
                         @if (!empty($images[1]))
                        <div>
                            <img src="{{ asset('assets/frontend/img/blog')}}/{{ $images[1] }}" class="img-responsive" alt="{{ $blog->name }}" />
                        </div>
                        @endif
                    </div>
                    <div class="post-format"><i class="fa fa-picture-o"></i></div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <h4><a href="{{ route('single-blog',['slug'=>$blog->slug]) }}">{{ $blog->name }}</a></h4>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM - Do - YYYY')}}, 20 Comments</div>
                    </div>
                </div>
                <hr>
                <p>{{ $blog->desc }}</p>
                <a href="{{ route('single-blog',['slug'=>$blog->slug]) }}" class="btn btn-default">Read More</a>
            </article>
            @endforeach
            <div class="clearfix"></div>
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
</div>
@endif
@endforeach