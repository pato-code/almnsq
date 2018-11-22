<section id="slider" class="slider slider-overlay-dark" style="margin-top: -100px; min-height: 120vh;">


    <div class="rev_slider_wrapper" style="min-height: 120vh;">
        <div id="slider1" class="rev_slider" data-version="5.0" style="min-height: 120vh;">
            <ul>


                <!-- Slide #1 -->
                @forelse($news as $one_news)
                    <li data-transition="zoomout"
                        data-slotamount="default"
                        data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut"
                        data-masterspeed="2000">
                        <img src="{{asset('images/'.$one_news->photo)}}" alt="Slide Background Image" style="min-height: 120vh;"/>
                        <div class="tp-caption"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-130"
                             data-whitespace="nowrap"
                             data-width="none"
                             data-height="none"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="500"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">

                            <div class="slide--subheadline" style="margin-top: -5px;">{{$one_news->title}}</div>
                        </div>
                        <div class="tp-caption"
                             data-x="center" data-hoffset="0"
                             data-y="top" data-voffset="-65"
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
                            <div class="slide--headline" style="margin-top: -5px;margin-bottom: 10px;">
                                @php
                                    echo wordwrap($one_news->type->name,70,"<br/>");
                                @endphp
                            </div>
                        </div>
                        <div class="tp-caption"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="0"
                             data-width="none"
                             data-height="none"
                             data-whitespace="wrap"
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
                            <div class="slide--bio text-center" dir="rtl" style="margin-top: 13%;padding-top: 1%;padding-bottom: 1%; size: 22em; width: 82em; height: 470px;">

                                @php
                                echo wordwrap($one_news->text,70,"<br/>");
                                @endphp
                                {{--{{$one_news->text}}--}}
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

                                </div><!-- .row end -->
                            </div><!-- .container end -->
                        </div>
                    </div><!-- .slide-item end -->
                @endforelse


            </ul>
        </div>
    </div>

</section>