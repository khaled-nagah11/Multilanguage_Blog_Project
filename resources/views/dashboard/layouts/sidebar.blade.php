<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href=""><i class="icon-speedometer"></i> {{ __('words.dashboard') }}</a>
            </li>
{{--            categories--}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-th-large"></i>{{ __('words.categories') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        @can('view', $setting)
                            <a class="nav-link" href="{{ route('dashboard.category.create') }}"><i class="fa fa-plus-square"></i>{{ __('words.add category') }}</a>
                        @endcan
                        <a class="nav-link" href="{{ route('dashboard.category.index') }}"><i class="fa fa-th"></i>{{ __('words.categories') }}</a>
                    </li>
                </ul>
            </li>
{{--posts--}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa-solid fa-newspaper"></i>{{ __('words.posts') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.posts.create') }}"><i class="fa fa-plus-square"></i>{{ __('words.add post') }}</a>
                        <a class="nav-link" href="{{ route('dashboard.posts.index') }}"><i class="fa-regular fa-newspaper"></i>{{ __('words.posts') }}</a>
                    </li>
                </ul>
            </li>
{{--users--}}
            @can('view', $setting)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-users"></i>{{ __('words.users') }}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.users.create') }}"><i class="icon-user-follow"></i>{{ __('words.add user') }}</a>
                            <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-people"></i>{{ __('words.users') }}</a>
                        </li>
                    </ul>
                </li>
{{--            settings--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="fa fa-gear"></i>{{ trans('words.settings') }}</a>
                </li>
            @endcan
        </ul>
    </nav>
</div>
