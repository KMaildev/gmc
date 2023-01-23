<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">

            <li class="menu-item" hidden>
                <a href="{{ route('inventory_dashboard.index') }}" class="menu-link">
                    Dashboard
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('inventory_shipping.index') }}" class="menu-link">
                    Shipping
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('inventory.index') }}" class="menu-link">
                    Inventory
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('inventory.index') }}" class="menu-link">
                    Sales
                </a>
            </li>

        </ul>
    </div>
</aside>
<!-- / Menu -->
