<section id="blog" class="blog blog-carousel">
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-dots" data-slide="3" data-slide-res="2" data-autoplay="true"
                     data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="800">

                    <!-- Blog Entry #1 -->

                    <!-- Blog Entry #6 -->
                    @forelse($sermons as $sermon)
                        <div class="blog-entry">
                            <div class="entry--img">
                                <a href="#">
                                    <img src="{{asset('/images/blog/grid/khotab.jpg')}}" alt="entry image"
                                         class="img-rounded"/>
                                </a>
                            </div>
                            <div class="entry--meta">
                                <span>{{$sermon->created_at->toDateString()}}</span>
                                {{--<span><a href="#"></a></span>--}}
                            </div>
                            <div class="entry--title">
                            <h4 style="word-wrap: break-word"><a href="#">{{$sermon->title}} </a></h4>
                            </div>
                            <div class="entry--content pull-left">
                            @if($sermon->mosque != null)
                                {{$sermon->mosque->name}}
                            @endif
                            </div>
                            @if($sermon->file != null)
                                <div class="pull-right entry--more">
                                    <a href="{{asset('files/'.$sermon->file)}}">معاينه الملف</a>
                                </div>
                            @endif
                        </div><!-- .blog-entry end -->
                    @empty
                        <div class="blog-entry">
                            <div class="entry--img">
                                <a href="#">
                                    <img src="{{asset('images/blog/grid/6.jpg')}}" alt="entry image"/>
                                </a>
                            </div>
                            <div class="entry--meta">
                                <span>لا يوجد أخبار اليوم</span> /
                                <span><a href="#">لا يوجد</a></span>
                            </div>
                            <div class="entry--title">
                                <h4><a href="#">لا يوجد</a></h4>
                            </div>
                            <div class="entry--content">
                                لا يوجد
                            </div>
                            <div class="entry--more">
                                <a href="#">قراءة المزيد</a>
                            </div>
                        </div><!-- .blog-entry end -->
                @endforelse

                {{--<!-- Blog Entry #1 -->--}}

                {{--<!-- Blog Entry #6 -->--}}
                {{--<div class="blog-entry">--}}
                {{--<div class="entry--img">--}}
                {{--<a href="#">--}}
                {{--<img src="{{asset('images/blog/grid/6.jpg')}}" alt="entry image"/>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="entry--meta">--}}
                {{--<span>Oct 25, 2018</span>   /--}}
                {{--<span><a href="#">خطب</a></span>--}}
                {{--</div>--}}
                {{--<div class="entry--title">--}}
                {{--<h4><a href="#">عقيدة </a></h4>--}}
                {{--</div>--}}
                {{--<div class="entry--content">--}}
                {{--رسالةٌ مختصرةٌ بيَّن فيها المُؤلِّف أركانَ الإيمان الستة بأسلوبٍ سهل، دقيق العبارة، مُبتعدًا عن التطويل والتفريع، ويُغني عن كتبٍ كثيرةٍ تناولت الموضوع. وهو مفيد للناشئة والشباب ومن ليس عنده وقت للتوسُّع في كتب العقيدة والآداب الإسلامية.--}}
                {{--</div>--}}
                {{--<div class="entry--more">--}}
                {{--<a href="#">قراءة المزيد</a>--}}
                {{--</div>--}}
                {{--</div><!-- .blog-entry end -->--}}



                {{--<!-- Blog Entry #1 -->--}}

                {{--<!-- Blog Entry #6 -->--}}
                {{--<div class="blog-entry">--}}
                {{--<div class="entry--img">--}}
                {{--<a href="#">--}}
                {{--<img src="{{asset('images/blog/grid/6.jpg')}}" alt="entry image"/>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="entry--meta">--}}
                {{--<span>Oct 25, 2018</span>   /--}}
                {{--<span><a href="#">خطب</a></span>--}}
                {{--</div>--}}
                {{--<div class="entry--title">--}}
                {{--<h4><a href="#">عقيدة </a></h4>--}}
                {{--</div>--}}
                {{--<div class="entry--content">--}}
                {{--رسالةٌ مختصرةٌ بيَّن فيها المُؤلِّف أركانَ الإيمان الستة بأسلوبٍ سهل، دقيق العبارة، مُبتعدًا عن التطويل والتفريع، ويُغني عن كتبٍ كثيرةٍ تناولت الموضوع. وهو مفيد للناشئة والشباب ومن ليس عنده وقت للتوسُّع في كتب العقيدة والآداب الإسلامية.--}}
                {{--</div>--}}
                {{--<div class="entry--more">--}}
                {{--<a href="#">قراءة المزيد</a>--}}
                {{--</div>--}}
                {{--</div><!-- .blog-entry end -->--}}



                {{--<!-- Blog Entry #1 -->--}}

                {{--<!-- Blog Entry #6 -->--}}
                {{--<div class="blog-entry">--}}
                {{--<div class="entry--img">--}}
                {{--<a href="#">--}}
                {{--<img src="{{asset('images/blog/grid/6.jpg')}}" alt="entry image"/>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="entry--meta">--}}
                {{--<span>Oct 25, 2018</span>   /--}}
                {{--<span><a href="#">خطب</a></span>--}}
                {{--</div>--}}
                {{--<div class="entry--title">--}}
                {{--<h4><a href="#">عقيدة </a></h4>--}}
                {{--</div>--}}
                {{--<div class="entry--content">--}}
                {{--رسالةٌ مختصرةٌ بيَّن فيها المُؤلِّف أركانَ الإيمان الستة بأسلوبٍ سهل، دقيق العبارة، مُبتعدًا عن التطويل والتفريع، ويُغني عن كتبٍ كثيرةٍ تناولت الموضوع. وهو مفيد للناشئة والشباب ومن ليس عنده وقت للتوسُّع في كتب العقيدة والآداب الإسلامية.--}}
                {{--</div>--}}
                {{--<div class="entry--more">--}}
                {{--<a href="#">قراءة المزيد</a>--}}
                {{--</div>--}}
                {{--</div><!-- .blog-entry end -->--}}

                <!-- Blog Entry #7 -->
                </div><!-- .carousel end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #blog end -->