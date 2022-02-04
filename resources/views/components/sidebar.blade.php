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
                
                "section_text" => "Employee",
                "icon"=>"fas fa-user-plus",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Add User"]
                ]
            ],
            [
                "section_text" => "Records",
                "icon"=>"fas fa-archive",
                "section_list" => [
                    ["href" => "reprimand.records", "text" => "Reprimand Records"],
                    ["href" => "tirediness.records", "text" => "Tardiness Records"],
                    ["href" => "absences.records", "text" => "Absences Records"],
                ]
            ],
            [
                "section_text" => "Options",
                "icon"=>"fas fa-cogs",
                "section_list" => [
                    ["href" => "setting.options", "text" => "Add Options"],
                    ["href" => "download.docs", "text" => "Employee Template" ],
                    ["href" => "download.salary", "text" => "Salary Template" ],
                    ["href" => "download.tirediness", "text" => "Tirediness Template" ],
                    ["href" => "download.absences", "text" => "Absences Template" ]
                    
                ]
            ]
        ],
        "access"=>"1",
        "text" => "Employee",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                
                "section_text" => "Clients Information",
                "icon"=>"fas fa-folder-open",
                "section_list" => [
                    ["href" => "client", "text" => "Clients"]
                ]
            ]
        ],
        "access"=>"0",
        "text" => "Client",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                
                "section_text" => "Guidelines",
                "icon"=>"fas fa-check-square",
                "section_list" => [
                    ["href" => "reprimand.detail", "text" => "Code of Conduct"],
                    ["href" => "memo.details", "text" => "Memo"]
                ]
            ]
        ],
        "access"=>"0",
        "text" => "MEMO",
        "is_multi" => true,
    ],

    [
        "href" => [
            [
                
                "section_text" => "FAQ'S",
                "icon"=>"fas fa-question-circle",
                "section_list" => [
                    ["href" => "system.docu", "text" => "System manual"],
                    ["href" => "system.docu", "text" => "System Information"],
                    ["href" => "system.docu", "text" => "Coding Documentation"]
                ]
            ]
        ],
        "access"=>"0",
        "text" => "System Documentation",
        "is_multi" => true,
    ],
         
];

$user = auth()->user();
$navigation_links = array_to_object($links);
@endphp


<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">GC Management System</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('img/logo-1.png') }}" alt="Logo">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            @if($user->is_admin >= $link->access)
                <li class="menu-header" style="color:#fff;">{{ $link->text }}</li>
                @if (!$link->is_multi)
                <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route($link->href) }}"><i class="{{ $link->icon }}"></i><span >{{ $link->text }}</span></a>
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
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icon }}"></i> <span >{{ $section->section_text }}</span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($section->section_list as $child)
                                        <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}" >   {{ $child->text }}</a></li>
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
