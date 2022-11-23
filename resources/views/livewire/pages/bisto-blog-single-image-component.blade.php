 <div class="blog-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('assets/frontend/img/blog')}}/{{ $blogs->image }}" class="img-responsive" alt="{{ $blogs->name }}" />
                                    <div class="post-format"><i class="fa fa-picture-o"></i></div>
                                </div>
                                <h4><a href="{{ route('single-blog',['slug'=>$blogs->slug]) }}">{{ $blogs->name }}</a></h4>
                                <hr>
                                <p>{{ $blogs->desc }}</p>
                                <hr>
                                <div class="comments-area">
                                    <h3>3 Comments</h3>
                                    <ul class="commentlist">
                                        <li>
                                            <div class="comment">
                                                <span class="comment-image">
                                        <img alt="avatar image" src="{{ asset('assets/frontend/img/xtra/1.jpg')}}" class="avatar" height="70" width="70">
                                        </span>
                                                <span class="comment-info d-text-c">
                                        <span>5 days ago &nbsp; / &nbsp; <a class="comment-reply-link d-text-c" href="./index.html">Reply</a></span> Jonny Doe
                                                </span>
                                                <p>If this generates a title of a book or short story already in existence, I assure you, it was completely random. If it generates a title you'd like to use, go right ahead a title of a book or short story already in existence, I assure you, it was completely random. .</p>
                                            </div>
                                            <ul class="children">
                                                <li>
                                                    <div class="comment">
                                                        <span class="comment-image">
                                                <img alt="avatar image" src="{{ asset('assets/frontend/img/xtra/2.jpg')}}" class="avatar" height="70" width="70">
                                                </span>
                                                        <span class="comment-info d-text-c">
                                                <span>3 days ago &nbsp; / &nbsp; <a class="comment-reply-link d-text-c" href="./index.html">Reply</a></span> Jana Doe
                                                        </span>
                                                        <p>Vel te tritani consequuntur. Pri oblique deterruisset ad, sed id recusabo elaboraret. Ex quo alii elit, vivendo referrentur pri ne. Ad eam integre ornatus volutpat, vel alia incorrupte liberavisse.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <span class="comment-image">
                                        <img alt="avatar image" src="{{ asset('assets/frontend/img/xtra/1.jpg')}}" class="avatar" height="70" width="70">
                                        </span>
                                                <span class="comment-info d-text-c">
                                        <span>1 day ago &nbsp; / &nbsp; <a class="comment-reply-link d-text-c" href="./index.html">Reply</a></span> Albert Doe
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, pro sanctus ullamcorper ei, sonet commodo ad sed. Ne exerci dolorum sit. Mea evertitur signiferumque et. Doctus probatus intellegat nec ne. Vim an bonorum efficiantur, in assum primis euismod duo, tritani labitur has ei.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div id="respond" class="comment-respond">
                                        <h3>Leave a Comment</h3>
                                        <form method="post" id="commentform" class="comment-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input name="author" placeholder="Name" type="text">
                                                    <input name="email" placeholder="E-mail" type="text">
                                                    <input name="url" placeholder="Website" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea placeholder="Comment"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-default btn-block">Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <aside class="col-md-3">
                            <div class="side-widget">
                                <form class="search">
                                    <input type="text" placeholder="Search">
                                    <button><i class="fa fa-chevron-right"></i></button>
                                </form>
                            </div>

                            <div class="side-widget">
                                <h5>Categories</h5>
                                <ul class="side-cat">
                                    @foreach ($categories as $category )
                                         <li><i class="fa fa-chevron-right"></i> <a href="{{ route('blog.category',['category_slug'=>$category->slug]) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="side-widget">
                                <h5>Recent Post</h5>
                                <ul class="recent-post">
                                    @foreach ($r_blogs as $r_blog )
                                    <li>
                                        <img src="{{ asset('assets/frontend/img/blog')}}/{{ $r_blog->image }}" alt="{{ $r_blog->name }}" />
                                        <div class="rp-info">
                                            <a href="{{ route('single-blog',['slug'=>$blogs->slug]) }}">{{ $r_blog->name }}</a>
                                            <span>{{ \Carbon\Carbon::parse($r_blog->created_at)->isoFormat('MMM - Do - YYYY')}}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>