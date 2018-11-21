<section id="slider" class="carousel slider slider-dots slider-navs owl-carousel owl-theme owl-loaded" data-slide="1"
         data-slide-res="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true"
         data-speed="2000"
        style="top: -100px;"
>


    <!-- Slide #1 -->
    @forelse($news as $one_news)
    <div class="slide--item bg-overlay bg-overlay-dark">
        <div class="bg-section">
            <img src="{{asset('images/'.$one_news->photo)}}" alt="background">
        </div>
        <div class="pos-vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text--center">
                        <div class="slide--subheadline">{{$one_news->title}}</div>
                        <div class="slide--headline">{{$one_news->type->name}}</div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 text--center">
                        <div class="slide--bio">
                            {{$one_news->text}}
                        </div>
                        <div class="slide-action">
                            <a class="btn btn--slide btn--secondary btn--white" href="#">Read More </a>
                            <a class="btn btn--slide btn--white btn--bordered" href="#">Get Started</a>
                        </div>
                    </div>
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div>
    </div><!-- .slide-item end -->
    @empty
        <div class="slide--item bg-overlay bg-overlay-dark">
            <div class="bg-section">
                <img src="{{asset('images/blog/grid/6.jpg')}}" alt="background">
            </div>
            <div class="pos-vertical-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text--center">
                            {{--<div class="slide--subheadline"></div>--}}
                            <div class="slide--headline">لا يوجد أخبار اليوم</div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 text--center">
                            {{--<div class="slide--bio">--}}
                                {{--{{$one_news->text}}--}}
                            {{--</div>--}}
                            <div class="slide-action">
                                <a class="btn btn--slide btn--secondary btn--white" href="#">Read More </a>
                                <a class="btn btn--slide btn--white btn--bordered" href="#">Get Started</a>
                            </div>
                        </div>
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div>
        </div><!-- .slide-item end -->
    @endforelse




</section>