<section class="subscribe">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Subscribe</h1>
            <p>Get updates about new dishes and upcoming events</p>
            <form class="form-inline" action="php/subscribe.php" id="invite" method="POST">
                <div class="form-group">
                    <input class="e-mail form-control" name="email" id="address" type="email" placeholder="Your Email Address" required>
                </div>
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-angle-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>
</section>

<!-- Footer-->
<section class="footer">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            @foreach ($aboutus as $about )
                @if ($about->pcategory->name == 'About us')
                    <h1>{{ $about->name }}</h1>
                    <p>{!! Str::limit($about->body, 212,'') !!}</p>
                    <a href="/about">Read more &rarr;</a>
                @endif
            @endforeach
        </div>
        <div class="col-md-4  col-sm-6">
            <h1>Recent post</h1>
            @foreach ($posts as $post )
            <div class="footer-blog clearfix">
                <a href="{{ route('single-blog',['slug'=>$post->slug]) }}">
                    <img src="{{ asset('assets/frontend/img')}}/{{ $post->image }}" class="img-responsive footer-photo" alt="{{ $post->name }}">
                    <p class="footer-blog-text">H{{ $post->name }}</p>
                    <p class="footer-blog-date">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('Do MMMM YYYY')}}</p>
                </a>
            </div>
            @endforeach
        </div>

        <div class="col-md-4  col-sm-6">
            <h1>Reach us</h1>
            <div class="footer-social-icons">
                <a href="http://www.facebook.com">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a href="http://www.twitter.com">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="http://plus.google.com">
                    <i class="fa fa-google"></i>
                </a>
                <a href="http://www.youtube.com">
                    <i class="fa fa-youtube-play"></i>
                </a>
                <a href="http://www.vimeo.com">
                    <i class="fa fa-vimeo"></i>
                </a>
                <a href="http://www.pinterest.com">
                    <i class="fa fa-pinterest-p"></i>
                </a>
                <a href="http://www.linkedin.com">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div>
            <div class="footer-address">
                <p><i class="fa fa-map-marker"></i>28 Seventh Avenue, Neew York, 10014</p>
                <p><i class="fa fa-phone"></i>Phone: (415) 124-5678</p>
                <p><i class="fa fa-envelope-o"></i>support@restaurant.com</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer - Copyright -->
<div class="footer-copyrights">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><i class="fa fa-copyright"></i>  <?php echo date("Y");?>.Cafe Bistro.All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
</section>
