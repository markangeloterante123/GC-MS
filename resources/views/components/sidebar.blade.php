@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "icon" => "fas fa-fire",
        "is_multi" => false,
        "access"=>"0",
    ],
    [
        "href" => [
            [
                "section_text" => "Profile",
                "icon"=>"fas fa-user-circle",
                "section_list" => [
                    ["href" => "user.info", "text" => "My Profile"],
                    ["href" => "update.account", "text" => "Update Profile"],
                    ["href" => "update.password", "text" => "Update Password"],
                    ["href" => "update.setting", "text" => "Update Settings"],
                ]
            ]
        ],
        "access"=>"0",
        "text" => "Account Information",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "icon"=>"fas fa-user-plus",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Add User"]
                ]
            ]
        ],
        "access"=>"1",
        "text" => "User",
        "is_multi" => true,
    ],    
];
$user = auth()->user();
$navigation_links = array_to_object($links);
@endphp


<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
        @if($user->is_admin >= $link->access)
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{ $link->icon }}"></i><span>{{ $link->text }}</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();
                        $is_active = in_array(true, $routes);
                    @endphp
                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icon }}"></i> <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">   {{ $child->text }}</a></li>
                                @endforeach
                            </ul>
                    </li>
                @endforeach
            @endif
        @endif    
        </ul>
        @endforeach
    </aside>
</div>
