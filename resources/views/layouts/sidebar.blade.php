@php
    use Illuminate\Support\Facades\Route;
    $route_name = Route::currentRouteName()
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if(in_array($route_name, array('member.index', 'member.create')))) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#database" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Database</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse  @if($route_name == 'member.create') show @endif" id="database">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  @if($route_name == 'member.create') active @endif"><a class="nav-link"
                                                                                               href="{{ route('member.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/add-user.svg') }}"/>List</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#memorial_services" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Memorial Service</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="memorial_services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('khairat-member.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/add-user.svg') }}"/>
                            Khairat Membership</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('death.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/death.svg') }}"/>Death</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('burial.payment.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/payment.svg') }}"/>Burial Payment</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#welfare_services" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Welfare Service</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="welfare_services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welfare.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/grid-view-icon.svg') }}"/>All Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('welfare', 'orphan') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/orphan.svg') }}"/>Orphan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('welfare', 'asnaf') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/asnaf.svg') }}"/>Asnaf</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('welfare', 'education') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/education.svg') }}"/>Education</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('welfare', 'others') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/asnaf.svg') }}"/>Others</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
