@php
    use Illuminate\Support\Facades\Route;
    $route_name = Route::currentRouteName();
    $database = array('member.index', 'member.create', 'member.show', 'member.edit', 'member.family');
    $khairat = array('khairat.create', 'khairat.show', 'khairat.edit');
    $death = array('death.create', 'death.show', 'death.edit');
    $burial = array('burial.payment.create', 'burial.payment.create');
    $welfareAll = array('service.create', 'welfare.show', 'welfare.edit');
    $welfareOrphan = array('service.create');
    $database = array('.create', 'member.show', 'member.edit', 'member.family');
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('summary') }}"><img
                    class="h-[20px] w-[20px]" src="{{ asset('/images/summary.svg') }}"/><span class="menu-title">{{ __('lang.summary_text') }}</span></a>
        </li>
        <li class="nav-item @if(in_array($route_name, $database)) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#database" aria-expanded="false" aria-controls="ui-basic">
                <img src="{{ asset('images/list-round-bullet-icon.png') }}" alt="" class="h-[20px] w-[20px] menu-icon">
                <span class="menu-title">{{ __('lang.database_text') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if(in_array($route_name, $database)) show @endif" id="database">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  @if(in_array($route_name, $database)) active @endif">
                        <a class="nav-link" href="{{ route('member.index') }}">
                            <img class="h-[20px] w-[20px] me-3" src="{{ asset('/images/add-user.svg') }}"/>{{ __('lang.list_text') }}</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if(in_array($route_name, $khairat)) active @endif @if(in_array($route_name, $death))) active @endif @if(in_array($route_name, $burial))) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#memorial_services" aria-expanded="false"
               aria-controls="ui-basic">
                <img src="{{ asset('images/death.svg') }}" alt="" class="h-[20px] w-[20px] menu-icon">
                <span class="menu-title">{{ __('lang.memorial_service_text') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div
                class="collapse @if(in_array($route_name, $khairat)) show @endif @if(in_array($route_name, $death)) show @endif @if(in_array($route_name, $burial)) show @endif"
                id="memorial_services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  @if(in_array($route_name, $khairat)) active @endif">
                        <a class="nav-link" href="{{ route('khairat.index') }}">
                            <img class="h-[20px] w-[20px] me-3" src="{{ asset('/images/add-user.svg') }}"/>
                            {{ __('lang.Khairat_membership_text') }}
                        </a>
                    </li>
                    <li class="nav-item  @if(in_array($route_name, $death)) active @endif">
                        <a class="nav-link" href="{{ route('death.index') }}">
                            <img class="h-[20px] w-[20px] me-3" src="{{ asset('/images/death.svg') }}"/>{{ __('lang.death_text') }} </a>
                    </li>
                    <li class="nav-item  @if(in_array($route_name, $burial)) active @endif"><a class="nav-link"
                                                                                               href="{{ route('burial.payment.index') }}">
                            <img class="h-[20px] w-[20px] me-3" src="{{ asset('/images/payment.svg') }}"/>{{ __('lang.burial_payment_text') }} </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if(in_array($route_name, $welfareAll))) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#welfare_services" aria-expanded="false"
               aria-controls="ui-basic">
                <img src="{{ asset('images/healthcare-icon.png') }}" alt="" class="h-[20px] w-[20px] menu-icon">
                <span class="menu-title">{{ __('lang.welfare_service_text') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse @if(in_array($route_name, $welfareAll)) show @endif" id="welfare_services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  @if(in_array($route_name, $welfareAll))  @if(!isset($category)) active @endif @endif">
                        <a class="nav-link" href="{{ route('welfare.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/grid-view-icon.svg') }}"/>
                            {{ __('lang.all_category_text') }}

                        </a></li>
                    <li class="nav-item  @if(in_array($route_name, $welfareOrphan)) @if(isset($category) && $category == 'orphan') active @endif @endif">
                        <a class="nav-link" href="{{ route('service', 'orphan') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/orphan.svg') }}"/>{{ __('lang.orphan_text') }}</a></li>
                    <li class="nav-item  @if(in_array($route_name, $database)) active @endif"><a class="nav-link"
                                                                                                 href="{{ route('service', 'asnaf') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/asnaf.svg') }}"/>{{ __('lang.asnaf_text') }}</a>
                    </li>
                    <li class="nav-item  @if(in_array($route_name, $database)) @if(isset($category) && $category == 'orphan') active @endif @endif">
                        <a class="nav-link" href="{{ route('service', 'welfare') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/welfare.svg') }}"/>{{ __('lang.welfare_text') }}</a>
                    </li>
                    <li class="nav-item  @if(in_array($route_name, $database)) active @endif"><a class="nav-link"
                                                                                                 href="{{ route('service', 'education') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/education.svg') }}"/>{{ __('lang.education_text') }}</a>
                    </li>
                    <li class="nav-item  @if(in_array($route_name, $database)) active @endif"><a class="nav-link"
                                                                                                 href="{{ route('service', 'others') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/others.svg') }}"/>{{ __('lang.others_text') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                <img src="{{ asset('images/reports-icon.png') }}" alt="" class="h-[20px] w-[20px] menu-icon">
                <span class="menu-title">{{ __('lang.reports_text') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link " href="{{ route('audit.index') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/audit.svg') }}"/>{{ __('lang.audit_trail_text') }}</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('export.khairat') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/khairat-xl.svg') }}"/>
                            {{ __('lang.khairat_kematian_excel_text') }}
                            </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('export.welfare') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/khairat-xl.svg') }}"/>
                            {{ __('lang.welfare_excel_text') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#others" aria-expanded="false" aria-controls="ui-basic">
                <img src="{{ asset('images/others.svg') }}" alt="" class="h-[20px] w-[20px] menu-icon">
                <span class="menu-title">{{ __('lang.others_text') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="others">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('users') }}"><img
                                class="h-[20px] w-[20px] me-3" src="{{ asset('/images/users.svg') }}"/>{{ __('lang.users_text') }}</a></li>

                </ul>
            </div>
        </li>
    </ul>
</nav>
