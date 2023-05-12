<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Black Dashboard') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                <div class="main-panel">
                    @include('layouts.navbars.navbar')
                            
                <div class="fixed-plugin">
                    @if (auth()->user()->username === "root")
                    <div class="dropdown show-dropdown">
                        <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Background</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors text-center">
                                <span class="badge filter badge-primary active" data-color="primary"></span>
                                <span class="badge filter badge-info" data-color="blue"></span>
                                <span class="badge filter badge-success" data-color="green"></span>
                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
                    <div class="content">
                        <h1 class="display-4">
                                Hi <strong>{{ auth()->user()->username }}</strong>!
                            </h1>
                            <div class="card border-0 shadow-sm rounded">
                    <div class="card-body"><h1>Users</h1>
                        <a href="{{ route('users.index') }}" class="btn btn-md btn-success mb-3">Add User</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Authority</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{!! $user->authority !!}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Not Available.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $users->links() }}
                    </div>
                    <div class="card-body"><h1>Approvers</h1>
                        <a href="{{ route('approvers.index') }}" class="btn btn-md btn-success mb-3">Assign User</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Approved Date</th>
                                <th scope="col">Approver Id</td>
                                <th scope="col">Approver Name</td>
                                <th scope="col">Order Id</th>
                                <th scope="col">Approved</th>
                                <th scope="col">Level</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($approvers as $approver)
                                <tr>
                                    <td>{{ $approver->approved_date }}</td>
                                    <td>{{ $approver->user_id }}</td>
                                    <td>{{ $approver->user->username}}</td>
                                    <td>{{ $approver->req_id }}</td>
                                    <td>{{ $approver->isApproved}}</td>
                                    <td>{{ $approver->level }}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Not Available.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $approvers->links() }}
                    </div>
                    <div class="card-body"><h1>Orders</h1>
                        <a href="{{ route('requests.index') }}" class="btn btn-md btn-success mb-3">Add Orders</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Customer</th>
                                <th scope="col">Item</th>
                                <th scope="col">Level</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated at</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($requests as $request)
                                <tr>
                                    <td>{{ $request->customer }}</td>
                                    <td>{!! $request->item !!}</td>
                                    <td>{{ $request->level }}</td>
                                    <td>{{ $request->status }}</td>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->updated_at }}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Not Available.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $requests->links() }}
                          @elseif (auth()->user()->authority === "User")
                          <div class="dropdown show-dropdown">
                        <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Background</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors text-center">
                                <span class="badge filter badge-primary active" data-color="primary"></span>
                                <span class="badge filter badge-info" data-color="blue"></span>
                                <span class="badge filter badge-success" data-color="green"></span>
                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
                    <div class="content">
                        <h1 class="display-4">
                            Hi <strong>{{ auth()->user()->username }}</strong>!
                        </h1>
                        <a class="btn btn-md btn-success mb-3" href="{{ route('requests.create')}}">Make Orders</a>
                    </div>
                          @else
                        <div class="dropdown show-dropdown">
                        <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Background</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors text-center">
                                <span class="badge filter badge-primary active" data-color="primary"></span>
                                <span class="badge filter badge-info" data-color="blue"></span>
                                <span class="badge filter badge-success" data-color="green"></span>
                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
                    <div class="content">
                        <h1 class="display-4">
                            Hi <strong>{{ auth()->user()->username }}</strong>!
                        </h1>
                        <a class="btn btn-md btn-success mb-3" href="{{ route('approvers.create')}}">Assign Approvers</a>
                    </div>
                        @endif
                        
                        @yield('content')
                    </div>

                    @include('layouts.footer')
                </div>
            </div>
            <form id="logout-form" action="/logout" method="POST">
                @csrf
            </form>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endauth
        <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('black') }}/js/theme.js"></script>

        @stack('js')

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            blackDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });
                });
            });
        </script>
        @stack('js')
    </body>
</html>
