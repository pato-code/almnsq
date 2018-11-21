<section id="slider" class="slider slider-overlay-dark" style="margin-top: -100px;">


    <div class="rev_slider_wrapper" >
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>


                <!-- Slide #1 -->
                @forelse($news as $one_news)
                    <li data-transition="zoomout"
                        data-slotamount="default"
                        data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut"
                        data-masterspeed="2000">
                        <img src="{{asset('images/'.$one_news->photo)}}" alt="Slide Background Image" />
                        <div class="tp-caption"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-130"
                             data-whitespace="nowrap"
                             data-width="none"
                             data-height="none"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="500"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">
                            <div class="slide--subheadline">{{$one_news->title}}</div>
                        </div>
                        <div class="tp-caption"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-65"
                             data-whitespace="nowrap"
                             data-width="none"
                             data-height="none"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="750"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                        >
                            <div class="slide--headline">{{$one_news->type->name}}</div>
                        </div>
                        <div class="tp-caption"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="0"
                             data-width="none"
                             data-height="none"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="1000"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                        >
                            <div class="slide--bio text-center">{{$one_news->text}} </div>
                        </div>
                        <div class="tp-caption"
                             id="slide-163-layer-6"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="80"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power3.easeOut;"
                             data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_out="x:inherit;y:inherit;"
                             data-start="1250"
                             data-splitin="none"
                             data-splitout="none"
                             data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-164","delay":""}]'
                             data-basealign="slide"
                             data-responsive_offset="on"
                             data-responsive="off">
                            <div class="slide-action">
                                <a class="btn btn--slide btn--secondary btn--white" href="#">Read More </a>
                                <a class="btn btn--slide btn--white btn--bordered" href="#">Get Started</a>
                            </div>
                        </div>
                    </li>
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


            </ul>
        </div>
    </div>

</section>