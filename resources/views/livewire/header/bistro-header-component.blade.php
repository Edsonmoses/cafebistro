 <section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-uppercase">
                    @if (Request::segment(1) =='single-blog')
                         {{ Request::segment(2) }}
                    @elseif(Request::segment(1) =='admin')
                    {{ Request::segment(2) }}
                    @else
                     {{ Request::segment(1) }}
                    @endif
                   </h2>
                <p>Tomato is a delicious restaurant website template</p>
            </div>
        </div>
    </div>
</section>