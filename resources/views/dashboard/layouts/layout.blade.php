
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
{{--    <link rel="shortcut icon" href="assets/ico/favicon.png"> --}}
    <title>CoreUI Bootstrap 4 Admin Template</title>
    <!-- Icons -->
    <link href="{{asset('Admin-Assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('Admin-Assets/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('Admin-Assets/dest/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.min.css">
</head>


<body class="navbar-fixed sidebar-nav fixed-nav">
<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="#" style="background-image: url({{ asset($setting->logo) }});"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>


        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">

            <li class="nav-item dropdown" style="margin-left: 10px !important">
                {{ auth()->user()->name }}({{ auth()->user()->status }})</li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{ __('words.Setting') }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>{{ __('words.Setting') }}</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('dashboard.users.edit', auth()->user()) }}"><i
                            class="fa fa-user"></i> {{ __('words.user setting') }}</a>
                    <div class="divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('words.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach

                </div>
            </li>


            <li class="nav-item">

            </li>

        </ul>
    </div>
</header>
@include('dashboard.layouts.sidebar')
<!-- Main content -->
<main class="main">
    @yield('body')
</main>



<footer class="footer">
    <a href="http://coreui.io" target="_blank"> <span class="text-left">كورس انشاء مدونة إلكترونية
                &copy; 2022.
            </span></a>

</footer>


<!-- Bootstrap and necessary plugins -->
<script src="{{asset('Admin-Assets/js/libs/jquery.min.js')}}"></script>
<script src="{{asset('Admin-Assets/js/libs/tether.min.js')}}"></script>
<script src="{{asset('Admin-Assets/js/libs/bootstrap.min.js')}}"></script>
<script src="{{asset('Admin-Assets/js/libs/pace.min.js')}}"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{asset('Admin-Assets/js/libs/Chart.min.js')}}"></script>
<!-- CoreUI main scripts -->
<script src="{{asset('Admin-Assets/js/app.js')}}"></script>
<!-- Plugins and scripts required by this views -->
<!-- Custom scripts required by this view -->
<script src="{{asset('Admin-Assets/js/views/main.js')}}"></script>
<!-- Grunt watch plugin -->
<script src="//localhost:35729/livereload.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    var allEditors = document.querySelectorAll('#editor');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i]);
    }
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@stack('javascripts')
</body>
</html>

