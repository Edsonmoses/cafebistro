<div class="trusted-quote">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="trusted-slider">
                        <ul class="slides">
                            @foreach ($testimonies as $testimony )
                            <li>
                                <img src="{{ asset('assets/frontend/img/quote.png')}}" alt="quote">
                                <p class="quote-body">{{$testimony->desc}}</p>
                                <p class="quote-author">{{$testimony->name}}, <span>{{$testimony->position}}</span></p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>