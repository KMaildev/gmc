@extends('layouts.menus.invoice')
@section('content')
    <link rel="stylesheet" href="{{ asset('invoice/invoice.css') }}" />
    <div class="row invoice-add justify-content-center" style="background-color: white;">
        <div class="col-lg-12 col-12 mb-lg-0 py-5" hidden>
            <div class="row gy-3">
                <center>
                    <div class="col-lg-12">
                        <div class="demo-inline-spacing">
                            <a href="{{ route('sales_invoices.index') }}" class="btn btn-primary">
                                <span class="tf-icons fa fa-arrow-left"></span>
                                Back
                            </a>
                            <a href="{{ route('sale_invoice_pdf_download', $sales_invoice->id) }}"
                                class="btn btn-secondary">
                                <span class="tf-icons fa fa-download"></span>
                                Download
                            </a>
                        </div>
                    </div>
                </center>
            </div>
        </div>

        <div class="col-lg-12 col-12 mb-lg-0">
            <center>

                <body link='blue' vlink='purple'>
                    <table border='0' cellpadding='0' cellspacing='0' width='700'
                        style='border-collapse: collapse;table-layout:fixed;width:550pt'>
                        <col width='60' style='mso-width-source:userset;width:45pt'>
                        <col width='84' style='mso-width-source:userset;width:63pt'>
                        <col width='204' style='mso-width-source:userset;width:153pt'>
                        <col width='123' style='mso-width-source:userset;width:92.25pt'>
                        <col width='46' style='mso-width-source:userset;width:34.5pt'>
                        <col width='88' style='mso-width-source:userset;width:66pt'>
                        <col width='72' style='mso-width-source:userset;width:54pt'>

                        <td height='20' width='60' style='text-align: left;height:15pt;width:45pt;' align='left'
                            valign='top'>
                            <span
                                style='mso-ignore:vglayout;position:absolute;z-index:1;margin-left:10px;margin-top:0px;width:666px;height:94px'>
                                <img width='666' height='94' src="{{ asset('invoice/logo.png') }}" />
                            </span>
                        </td>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='6' width='617' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='34' style='mso-height-source:userset;height:26pt'>
                            <td colspan='7' height='34' class='x23' style='mso-ignore:colspan;height:26pt;'></td>
                        </tr>
                        <tr height='34' style='mso-height-source:userset;height:26pt'>
                            <td colspan='7' height='34' class='x23' style='mso-ignore:colspan;height:26pt;'></td>
                        </tr>
                        <tr height='32' style='mso-height-source:userset;height:24pt'>
                            <td colspan='7' height='32' class='x69' style='height:24pt;'>Sale Invoice</td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='7' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='18' class='x26' style='height:13.5pt;'>Name</td>
                            <td colspan='2' class='x70'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->customers_table->name ?? '' }}
                            </td>
                            <td class='x27'>Invoice No</td>
                            <td colspan='3' class='x63'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->invoice_no ?? '' }}
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='18' class='x28' style='height:13.5pt;'>ID No.</td>
                            <td colspan='2' class='x72'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->id_no ?? '' }}
                            </td>
                            <td colspan='4' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='18' class='x99' style='height:13.5pt;'>Address</td>
                            <td colspan='2' class='x98'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                <p>
                                    {{ $sales_invoice->customers_table->address ?? '' }}
                                </p>
                            </td>
                            <td class='x27'>Date</td>
                            <td colspan='3' class='x74'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->invoice_date ?? '' }}
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='7' height='20' class='x29' style='mso-ignore:colspan;height:15pt;'>
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='3' rowspan='2' height='39' class='x57'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:29.25pt;'>
                            </td>
                            <td class='x27'>Showroom Name</td>
                            <td colspan='3' class='x63'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->showroom_name ?? '' }}
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td class='x27'>Dealer Code</td>
                            <td colspan='3' class='x66'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->customers_table->dealer_code ?? '' }}
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='18' class='x75'
                                style='border-right:1px solid windowtext;border-bottom:1px dotted windowtext;height:13.5pt;'>
                                PH</td>
                            <td class='x34'>
                                {{ $sales_invoice->customers_table->phone ?? '' }}
                            </td>
                            <td class='x27'>Sales Type</td>
                            <td colspan='3' class='x63'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->sales_type ?? '' }}
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='18' class='x76'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:13.5pt;'>
                                E-Mail Address</td>
                            <td class='x35'>
                                {{ $sales_invoice->customers_table->email ?? '' }}
                            </td>
                            <td colspan='4' style='mso-ignore:colspan;'></td>
                        </tr>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='3' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                            <td class='x27'>Payment Team</td>
                            <td colspan='3' class='x63'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                {{ $sales_invoice->payment_team ?? '' }}
                            </td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='7' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                        </tr>




                        {{-- Item List --}}
                        <tr height='42' style='mso-height-source:userset;height:32pt'>
                            <td height='40' class='x36' style='height:30.5pt;'>Sr.No</td>
                            <td class='x36'>Model</td>
                            <td class='x36'>Chassis No.&amp; Vehicle No.</td>
                            <td class='x36'>Description</td>
                            <td class='x36'>Qty</td>
                            <td class='x36'>Price</td>
                            <td class='x37'>Amount (MMK)</td>
                        </tr>

                        @php
                            $total_amount = [];
                        @endphp
                        @foreach ($sales_items as $key => $sales_item)
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                                <td height='18' class='x38' style='height:13.5pt;'>
                                    {{ $key + 1 }}
                                </td>
                                <td class='x38'>
                                    {{ $sales_item->products_table->model_no ?? '' }}
                                </td>
                                <td class='x39'>
                                    {{ $sales_item->products_table->chessi_no ?? '' }}
                                </td>
                                <td class='x40'>
                                    {{ $sales_item->description ?? '' }}
                                </td>
                                <td class='x40' align='right'>
                                    {{ $sales_item->qty ?? 0 }}
                                </td>
                                <td class='x41' align='right' x:num="1000">
                                    {{ number_format($sales_item->unit_price, 2) }}
                                </td>
                                <td class='x42' align='right' x:num="1000">
                                    @php
                                        $amount = $sales_item->qty * $sales_item->unit_price;
                                        echo number_format($amount, 2);
                                        $total_amount[] = $amount;
                                    @endphp
                                </td>
                            </tr>
                        @endforeach






                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='20' class='x48' style='height:15pt;'></td>
                            <td class='x48'></td>
                            <td class='x48'></td>
                            <td class='x48'></td>
                            <td colspan='3' class='x24' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='18' class='x77'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:13.5pt;'>
                                Sales Person</td>
                            <td class='x36'>
                                {{ $sales_invoice->users_table->name ?? '' }}
                            </td>
                            <td colspan='3' class='x77'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>Total
                                Amount
                            </td>
                            <td class='x49' align='right' x:num="1000">
                                @php
                                    $total_amount = array_sum($total_amount);
                                    echo number_format($total_amount, 2);
                                @endphp
                            </td>
                        </tr>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' rowspan='4' height='79' class='x90'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:59.25pt;'>
                            </td>
                            <td rowspan='3' height='58' class='x96'
                                style='border-bottom:1px solid windowtext;height:43.5pt;'></td>
                            <td colspan='2' class='x97'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>DOWN
                                PAYMENT
                            </td>
                            <td class='x50'></td>
                            <td class='x49' align='right' x:num="1000">
                                {{ number_format($sales_invoices_payment->down_payment, 2) }}
                            </td>
                        </tr>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' class='x97'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>Dealer %
                            </td>
                            <td class='x50'></td>
                            <td class='x49' align='right' x:num="2">
                                {{ $sales_invoices_payment->dealer_ercentage ?? 0 }}
                            </td>
                        </tr>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' class='x97'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                                BALANCE TO BE
                                PAY</td>
                            <td class='x51'></td>
                            <td class='x49' align='right' x:num="1000">
                                @php
                                    $TotalAmount = $total_amount;
                                    $DownPayment = $sales_invoices_payment->down_payment;
                                    $DealerPercentage = $sales_invoices_payment->dealer_ercentage;
                                    $DealerPercentageValue = ($TotalAmount / 100) * $DealerPercentage;
                                    $BalanceToPay = $TotalAmount - $DownPayment - $DealerPercentageValue;
                                    echo number_format($BalanceToPay, 2);
                                @endphp
                            </td>
                        </tr>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td class='x28'></td>
                            <td colspan='3' class='x97'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>TOTAL
                                BALANCE
                                TO BE PAY DATE&nbsp;</td>
                            <td class='x52' x:num="1000">
                                {{ $sales_invoices_payment->balance_to_pay_be_date ?? '' }}
                            </td>
                        </tr>

                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='18' class='x80'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:13.5pt;'>
                                Delivery Date</td>
                            <td class='x53'></td>
                            <td class='x31'></td>
                            <td class='x31'></td>
                            <td class='x31'></td>
                            <td class='x54'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='20' class='x55' style='height:15pt;'></td>
                            <td class='x55'></td>
                            <td colspan='5' class='x24' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='20' class='x31' style='height:15pt;'></td>
                            <td class='x31'></td>
                            <td colspan='5' class='x24' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td height='20' style='height:15pt;'></td>
                            <td class='x56'>Prepared By</td>
                            <td colspan='2' class='x82'>Received By</td>
                            <td></td>
                            <td colspan='2' class='x56' style='mso-ignore:colspan;'>Authorised Signature</td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                            <td colspan='2' class='x83' style='border-bottom:1px solid windowtext;'>Customer</td>
                            <td></td>
                            <td>Sales Manager</td>
                            <td></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                            <td colspan='3' rowspan='2' height='39' class='x84'
                                style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:29.25pt;'>
                                Customre MGMG</td>
                            <td colspan='2' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                            <td colspan='2' style='mso-ignore:colspan;'></td>
                        </tr>
                        <tr height='80' style='mso-height-source:userset;height:60pt;mso-xlrowspan:4'>
                            <td colspan='7' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='2' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                            <td class='x56'>Approve by Account</td>
                            <td class='x56'></td>
                            <td colspan='2' class='x56' style='mso-ignore:colspan;'>Approve by Manager</td>
                            <td></td>
                        </tr>
                        <tr height='20' style='mso-height-source:userset;height:15pt'>
                            <td colspan='5' height='20' style='mso-ignore:colspan;height:15pt;'></td>
                            <td colspan='2' class='x56' style='mso-ignore:colspan;'>Security Guard</td>
                        </tr>
                    </table>
                </body>

            </center>
            <br><br><br>
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.onload = function() {
        window.print();
    }
</script>
@section('script')
@endsection
