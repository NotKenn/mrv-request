@auth()
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('MRV') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('MRV Request') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a>
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                @if(auth()->user()->authority === "root")
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Functions') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li>
                            <a href="/users">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Users Management') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="/requests">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Requests Management') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="/approvers">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Approvers Management') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="/items">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Items Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
                @elseif(auth()->user()->authority === "User")
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Functions') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li>
                            <a href="/requests/create">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Make New Order') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
                @else
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Functions') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li>
                            <a href="/approvers">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Assign Approvers') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </li>
        </ul>
    </div>
</div>
@endauth