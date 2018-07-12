<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <img
                title="{{ \App\Locales\Language::current()->getNativeName() }}"
                src="{{ url(\App\Locales\Language::current()->getFlag()) }}">
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach(\App\Locales\Language::all() as $language)
                    <li>
                        <!-- Task item -->
                        <a href="{{ route('dashboard.lang', $language->getCode()) }}">
                            <img src="{{ url($language->getFlag()) }}">
                            {{ $language->getNativeName() }}
                        </a>
                    </li>
                    <!-- end task item -->
                @endforeach

            </ul>
        </li>

    </ul>
</li>