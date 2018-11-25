<section id="banners1" class="interactive pt-0 pb-0">
    <div class="container-fluid">

        <div class="row">
        @forelse($sermons as $sermon)

                {{--banners/3.jpg--}}
            <div class="banner-panel" style="background-image: url('{{asset('/images/'. $sermon->photo != null ? $sermon->photo : 'banners/3.jpg')}}');">

                {{--<h6>{{$sermon->type->name}}</h6>--}}
                <h3>{{$sermon->created_at}}</h3>
                <p>{{$sermon->title}}   dksklfsdklfklsdkl</p>
                @if($sermon->file != null)
                    <a href="{{asset('files/'.$sermon->file)}}">معاينه الملف</a>
                @endif
            </div><!-- .boxed-panel end -->



        @empty
                <div class="banner-panel bg-section" style="background-image: url({{asset("/images/banners/3.jpg")}});">

                    <h6>Quick &amp; smart</h6>
                    <h3>Great Solutions</h3>
                    <p>Rounding up a bunch of specific designs &amp; talking about the merits of each is the perfect way to find common ground. Collecting a wide samples is a great way to start your project.</p>
                    <a href="#">Read More</a>
                </div><!-- .boxed-panel end -->
        @endforelse
        </div><!-- .row end -->
    </div><!-- .container end -->
</section>