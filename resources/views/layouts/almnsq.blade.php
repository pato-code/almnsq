@include('layouts.template.headerInclude')
@php
    use App\Model\City;use App\Model\News;
    use App\Model\Sermon;
    use App\Location;
    use App\Model\SuggestionType;
    $news = News::all();

    $sermons = Sermon::all();
    $locations = Location::all();
    $cities = City::all();
    $suggesstions_type = SuggestionType::all();


    $suggesstions = [];
    $compliments = [];
    $activites = [];
    if (Auth::user()) {
    $compliments = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ComplimentNotification')->get();
    $suggesstions = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\SuggestionNotification')->get();
    $activites = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\RequestActivity')->get();

}
@endphp
<div dir="rtl" class="modal fade " id="getResponse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="pull-left">
                    نشكرك علي التقييم
                </div>
            </div>
            <div class="model-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

@include('layouts.template.navbar')

@yield('silder')

<section id="page-title" style="width: 100%;
    height: 100%;
    background-repeat: repeat;
    background-size: auto;
    margin-top: -7%;
    padding-top: 2%;
    " class="page-title bg-overlay bg-overlay-dark">
    <div class="bg-section">
        <img src="{{asset('images/page-title/1542806781.jpg')}}" alt="Background"/>
    </div>
    @yield('content')
    @yield('khotob')
    @yield('suggestion')
    @yield('complaint')

</section>


@include('layouts.template.footer')

{{--<script type="text/javascript" src="js/app.js"></script>--}}
<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>
<script type="text/javascript" src="{{asset("revolution/js/jquery.themepunch.tools.min.js?rev=5.0")}}"></script>
<script type="text/javascript" src="{{asset("revolution/js/jquery.themepunch.revolution.min.js?rev=5.0")}}"></script>
<script type="text/javascript" src="{{asset("revolution/js/extensions/revolution.extension.video.min.js")}}"></script>
<script type="text/javascript"
        src="{{asset("revolution/js/extensions/revolution.extension.slideanims.min.js")}}"></script>
<script type="text/javascript" src="{{asset("revolution/js/extensions/revolution.extension.actions.min.js")}}"></script>
<script type="text/javascript"
        src="{{asset("revolution/js/extensions/revolution.extension.layeranimation.min.js")}}"></script>
<script type="text/javascript" src="{{asset("revolution/js/extensions/revolution.extension.kenburn.min.js")}}"></script>
<script type="text/javascript"
        src="{{asset("revolution/js/extensions/revolution.extension.navigation.min.js")}}"></script>
<script type="text/javascript"
        src="{{asset("revolution/js/extensions/revolution.extension.migration.min.js")}}"></script>
<script type="text/javascript"
        src="{{asset("revolution/js/extensions/revolution.extension.parallax.min.js")}}"></script>
<script type="text/javascript"
        src="{{asset("js/select2.min.js")}}"></script>
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
</script>
<script>
    $(document).ready(function () {
        $('input').focus(function () {
            $("#navbar-btn").addClass('collapsed');
            $("#navbar-btn").attr("aria-expanded", "false");
            $("#navbar-collapse-1").removeClass("in");
        });
    });
</script>
<!-- RS Configration JS Files -->
<script src="{{asset("js/bootstrapValidator.min.js")}}"></script>
<script src="{{asset("js/wow.min.js")}}"></script>

<script>
    new WOW().init();
    var x = "{!! url('/') !!}";
    window.$vars = {
        app_url: x
    };
</script>
<script src="{{asset("js/rsconfig.js")}}"></script>
@if(isset($activityWeek))
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-progressbar/0.9.0/bootstrap-progressbar.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.progress-bar').progressbar({use_percentage: false});
        });

    </script>
@endif


@if(isset($addActivity))
    <script>
        $(document).ready(function () {
            $("#period_id").select2();
        });
    </script>
    <script src="{{asset("js/activity.js")}}"></script>

@endif
@if(isset($addActivityEdit))
    <script>
        $(document).ready(function () {

            $("#period_id").select2();
        });
    </script>
    <script src="{{asset("js/activity_edit.js")}}"></script>

@endif

@if(isset($welcome))
    <script src="{{asset("js/suggestion.js")}}"></script>
    <script src="{{asset("js/complement.js")}}"></script>

    <script src="{{asset("js/requestActivity.js")}}"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery(this).scrollTop(0);
        });
        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1000, 'linear');
        });
    </script>
@endif
@if(isset($addNews))
    <script>
        $(document).ready(function () {
            $("#type_id").select2();
        });
    </script>
@endif
@if(isset($mosque))
    <script src="{{asset("js/mosque.js")}}"></script>

@endif
@if(isset($neighborhood))
    <script src="{{asset("js/neighborhood.js")}}"></script>
@endif

@if(isset($sermon))
    <script>
        $(document).ready(function () {
            $("#mosque_id").select2();
        });
    </script>

    @endif


    </body>
    </html>
