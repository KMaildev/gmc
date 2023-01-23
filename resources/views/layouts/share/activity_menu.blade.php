<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">

            <li class="menu-item">
                <a href="{{ route('activity.index') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        Login
                    </div>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('activity.show', 'cash_books_log') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        {{ Str::upper(str_replace('_', ' ', 'cash_books_log')) }}
                    </div>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('activity.show', 'chart_of_account_log') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        {{ Str::upper(str_replace('_', ' ', 'chart_of_account_log')) }}
                    </div>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('activity.show', 'account_classifications_log') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        {{ Str::upper(str_replace('_', ' ', 'account_classifications_log')) }}
                    </div>
                </a>
            </li>


            <li class="menu-item">
                <a href="{{ route('activity.show', 'account_types_log') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        {{ Str::upper(str_replace('_', ' ', 'account_types_log')) }}
                    </div>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('activity.show', 'sub_account_log') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        {{ Str::upper(str_replace('_', ' ', 'sub_account_log')) }}
                    </div>
                </a>
            </li>



            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">More</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('activity.show', 'products_log') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                {{ Str::upper(str_replace('_', ' ', 'products_log')) }}
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('activity.show', 'departments_log') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                {{ Str::upper(str_replace('_', ' ', 'departments_log')) }}
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('activity.show', 'users_log') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                {{ Str::upper(str_replace('_', ' ', 'users_log')) }}
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('activity.show', 'customers_log') }}" class="menu-link">
                            <div data-i1n="Layouts">
                                {{ Str::upper(str_replace('_', ' ', 'customers_log')) }}
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('activity.show', 'suppliers_log') }}" class="menu-link">
                            <div data-i1n="Layouts">
                                {{ Str::upper(str_replace('_', ' ', 'suppliers_log')) }}
                            </div>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</aside>
<!-- / Menu -->
