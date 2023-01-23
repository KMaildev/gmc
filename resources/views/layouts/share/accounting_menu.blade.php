<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Dashboard</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('accountingdashboard.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Dashboard</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Customers</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('customer.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Dealer Customers</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_customer.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> HP Customers</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cash_sale_customer.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Sale Customers
                            </div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">
                        HP Sales
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('hp_sales_invoices.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                HP Sales Invoices
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hire_purchase.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Hire Purchaser Account
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_sales_account.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                HP Sales Account
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_interest_suspense_account.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                HP Interest Suspense AC
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_service_account.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                HP Service Account
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_interest_account.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Interest Account
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_cash_account.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                HP Cash Account
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('hp_account_receivables.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Account Receivales
                            </div>
                        </a>
                    </li>


                    <li class="menu-item" hidden>
                        <a href="{{ route('hp_sales_journal.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Journal
                            </div>
                        </a>
                    </li>


                    <li class="menu-item" hidden>
                        <a href="{{ route('hp_cash_collection.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Collection
                            </div>
                        </a>
                    </li>

                    <li class="menu-item" hidden>
                        <a href="{{ route('hp_sales_ledger.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Ledger
                            </div>
                        </a>
                    </li>



                    <li class="menu-item" hidden>
                        <a href="{{ route('hp_sale_cash_book.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Book
                            </div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">
                        Dealer Sales
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('sales_invoices.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Invoices
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('sales_journal.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Journal
                            </div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{ route('cash_collection.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Collection
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('sales_ledger.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales Ledger
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('account_receivables.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Account Receivales
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('sale_cash_book.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Book
                            </div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">
                        Cash Sales
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('cash_sales_invoices.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Cash Sales Invoices
                            </div>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">
                        Sales return
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('sales_return.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Sales return
                            </div>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Purchase</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('supplier.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Suppliers
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('purchase_order.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Purchase Invoice
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('purchase_group_invoice.index') }}" class="menu-link" hidden>
                            <div data-i2n="Without menu">
                                Purchase Group Invoice
                            </div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('group_invoice.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Group Invoice
                            </div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{ route('purchase_journal.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Purchase Journal
                            </div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{ route('purchase_account_payable.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Account Payable
                            </div>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Products</div>
                </a>

                <ul class="menu-sub">

                    @can('brand')
                        <li class="menu-item">
                            <a href="{{ route('brand.index') }}" class="menu-link">
                                <div data-i2n="Without menu"> Brand</div>
                            </a>
                        </li>
                    @endcan


                    <li class="menu-item">
                        <a href="{{ route('type_of_models.index') }}" class="menu-link">
                            <div data-i2n="Without menu">
                                Type of Models
                            </div>
                        </a>
                    </li>

                    @can('products')
                        <li class="menu-item">
                            <a href="{{ route('products.index') }}" class="menu-link">
                                <div data-i2n="Without menu"> Products</div>
                            </a>
                        </li>
                    @endcan

                    @can('import_car')
                        <li class="menu-item">
                            <a href="{{ route('import_car.index') }}" class="menu-link">
                                <div data-i2n="Without menu">
                                    Import Car
                                </div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>

            <li class="menu-item" hidden>
                <a href="{{ route('cashbook.index') }}" class="menu-link">
                    <div data-i1n="Layouts">
                        Cash Book OLD
                    </div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">Reports</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item" hidden>
                        <a href="{{ route('daily_report.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Daily Report</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cash_book_view.index') }}" class="menu-link">
                            Cash Book
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('journal_entry.index') }}" class="menu-link">
                            Journal
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('profit_loss.index') }}" class="menu-link">
                            Profit and Loss
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('balace_sheet.index') }}" class="menu-link">
                            Balance Sheet
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('trial.index') }}" class="menu-link">
                            Trial
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cash_trial.index') }}" class="menu-link">
                            Cash Trial
                        </a>
                    </li>
                </ul>
            </li>


            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <div data-i2n="Layouts">COA</div>
                </a>

                <ul class="menu-sub">
                    @can('account_classification')
                        <li class="menu-item">
                            <a href="{{ route('accountclassification.index') }}" class="menu-link">
                                <div data-i2n="Without menu">Account Classification </div>
                            </a>
                        </li>
                    @endcan

                    @can('account_type')
                        <li class="menu-item">
                            <a href="{{ route('accounttype.index') }}" class="menu-link">
                                <div data-i2n="Without menu">Account Type </div>
                            </a>
                        </li>
                    @endcan

                    @can('chart_of_account')
                        <li class="menu-item">
                            <a href="{{ route('chartofaccount.index') }}" class="menu-link">
                                <div data-i2n="Without menu">Chart of accounts </div>
                            </a>
                        </li>
                    @endcan

                    @can('sub_account')
                        <li class="menu-item">
                            <a href="{{ route('subaccount.index') }}" class="menu-link">
                                <div data-i2n="Without menu">Sub Account </div>
                            </a>
                        </li>
                    @endcan


                    <li class="menu-item">
                        <a href="{{ route('bankform.index') }}" class="menu-link">
                            <div data-i2n="Without menu"> Bank Form</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- / Menu -->
