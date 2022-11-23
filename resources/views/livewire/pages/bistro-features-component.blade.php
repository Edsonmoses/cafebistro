<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header wow fadeInDown">
                    <h1 class="white">Our features<small>Little things make us best in town</small></h1>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp">
            @foreach ($blogs as $blog )
                <div class="col-md-4 col-sm-6">
                    <div class="features-tile">
                        <div class="features-img">
                            <img src="{{ asset('assets/frontend/img')}}/{{ $blog->image }}" alt="{{ $blog->name }}" />
                        </div>
                        <div class="features-content">
                            <div class="page-header">
                                <h1>{{ $blog->name }}</h1>
                            </div>
                            <p>/{{ $blog->desc }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>