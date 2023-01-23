<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">

            <li class="menu-item">
                <a href="{{ route('spare_part_item.index') }}" class="menu-link">
                    Item
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('spare_part_purchase_invoice.index') }}" class="menu-link">
                    Purchase
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('spare_part_sale_invoice.index') }}" class="menu-link">
                    Sales Invoice
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('spare_part_inventory_list.index') }}" class="menu-link">
                    Inventory List
                </a>
            </li>

            <li class="menu-item" hidden>
                <a href="{{ route('spare_part_service_invoice') }}" class="menu-link">
                    Sales Service
                </a>
            </li>

        </ul>
    </div>
</aside>
