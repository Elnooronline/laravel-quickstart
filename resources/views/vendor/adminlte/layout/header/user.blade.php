<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ AdminLte::getGravatar(auth()->user()->email) }}" class="user-image" alt="{{ auth()->user()->name }}">
        <span class="hidden-xs">{{ auth()->user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ auth()->user()->getFirstOrDefaultMediaUrl() }}" class="img-circle" alt="{{ auth()->user()->name }}">
            <p>
                {{ auth()->user()->name }}
                @if ($created_at = auth()->user()->created_at)
                    <small>
                        @lang('adminlte::adminlte.member_since')
                        <span title="{{ $created_at }}">
                            {{ $created_at->diffForHumans() }}
                        </span>
                    </small>
                @endif
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">@lang('auth.profile.show')</a>
            </div>
            <div class="pull-right">
                <a href="#"
                   class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >@lang('adminlte::adminlte.log_out')</a>

                <form id="logout-form" action="{{ url(config('adminlte.urls.logout', 'auth/logout')) }}" method="POST" style="display: none;">
                    @if(config('adminlte.logout_method'))
                        {{ method_field(config('adminlte.logout_method')) }}
                    @endif
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</li>
