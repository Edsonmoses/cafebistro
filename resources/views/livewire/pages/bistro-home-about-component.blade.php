 <div class="col-md-12">
    @foreach ($pages as $page )
    @if ($page->pcategory->name == 'Home About us')
        <div class="page-header wow fadeInDown">
                    <h1>{{$page->name }}<small>{{$page->title }}</small></h1>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp">
            <div class="col-md-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 hidden-sm about-photo">
                             @php
                                    $images = explode(",",$page->image);
                                @endphp
                            <div class="image-thumb">
                                @if (!empty($images[1]))
                                <img src="{{asset('assets/frontend/img')}}/{{ $images[1] }}" data-mfp-src="{{asset('assets/frontend/img')}}/{{ $images[1] }}" class="img-responsive" alt="{{$page->name }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                     @if (!empty($images[2]))
                        <div class="col-sm-6 about-photo hidden-xs">
                            <img src="{{asset('assets/frontend/img')}}/{{ $images[2] }}" data-mfp-src="{{asset('assets/frontend/img')}}/{{ $images[2] }}" class="img-responsive" alt="{{$page->name }}">
                        </div>
                    @endif
                    @if (!empty($images[3]))
                        <div class="col-sm-6 about-photo hidden-xs">
                            <img src="{{asset('assets/frontend/img')}}/{{ $images[3] }}" data-mfp-src="{{asset('assets/frontend/img')}}/{{ $images[3] }}" class="img-responsive" alt="{{$page->name }}">
                        </div>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p>
                   {{$page->body }}
                </p>
                <img src="{{ asset('assets/frontend/img')}}/{{$page->signature }}" alt="signature">
            </div>
            @endif
             @endforeach
        </div>