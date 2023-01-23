@extends('layouts.menus.invoice')
@section('content')
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>

    <head>
        <style type="text/css">
            body,
            div,
            table,
            thead,
            tbody,
            tfoot,
            tr,
            th,
            td,
            p {
                font-family: "Calibri";
                font-size: small
            }

            a.comment-indicator:hover+comment {
                background: #ffd;
                position: absolute;
                display: block;
                border: 1px solid black;
                padding: 0.5em;
            }

            a.comment-indicator {
                background: red;
                display: inline-block;
                border: 1px solid black;
                width: 0.5em;
                height: 0.5em;
            }

            comment {
                display: none;
            }
        </style>
    </head>

    <body style="background-color: white;">
        <table align="center" cellspacing="0" border="0">
            <colgroup width="42"></colgroup>
            <colgroup width="244"></colgroup>
            <colgroup width="249"></colgroup>
            <colgroup width="46"></colgroup>
            <colgroup width="102"></colgroup>
            <colgroup width="172"></colgroup>
            <colgroup width="107"></colgroup>
            <colgroup width="110"></colgroup>
            <colgroup width="83"></colgroup>
            <tr>
                <td colspan=8 rowspan=4 height="121" align="left" valign=bottom>
                    <font color="#000000"><br>
                        <img src="{{ asset('invoice/dealer_inv_logo.jpg') }}" width=670 height=95 hspace=32 vspace=14>
                    </font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"> </font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td colspan=6 rowspan=3 height="95" align="center" valign=middle><b><u>
                            <font size=4 color="#000000"><br></font>
                        </u></b></td>
                <td align="left" valign=middle><b>
                        <font color="#000000"><br></font>
                    </b></td>
                <td align="left" valign=middle><b>
                        <font color="#000000"><br></font>
                    </b></td>
                <td align="left" valign=middle><b>
                        <font color="#000000"><br></font>
                    </b></td>
            </tr>
            <tr>
                <td align="left" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=middle>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td align="left" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=middle>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td colspan=2 height="34" align="center" valign=middle>
                    <b>
                        <font size=4 color="#000000">SPARE PARTS SALE INVOICE</font>
                    </b>
                </td>
                <td align="center" valign=middle sdnum="1033;0;#,##0"><b>
                        <font color="#000000"><br></font>
                    </b></td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">INVOICE NO</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">{{ $sales_invoice_edit->invoice_no ?? '' }}</font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="31" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">Date</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">{{ $sales_invoice_edit->invoice_date ?? '' }}</font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"> </font>
                </td>
            </tr>
            <tr>
                <td height="32" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle><b>
                        <font face="Zawgyi-One" color="#000000"><br></font>
                    </b></td>
                <td align="center" valign=middle><b>
                        <font face="Zawgyi-One" color="#000000"><br></font>
                    </b></td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">SALE TYPE</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">{{ $sales_invoice_edit->sales_type }}</font>
                    </b></td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>

            <tr>
                <td height="32" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle sdnum="1033;0;#,##0"><b>
                        <font face="Zawgyi-One" size=2 color="#000000"><br></font>
                    </b></td>
                <td align="center" valign=middle><b>
                        <font face="Zawgyi-One" size=2 color="#000000">
                            {{ $sales_invoice_edit->invoice_remark ?? '' }}
                        </font>
                    </b></td>
                <td style="border-right: 1px solid #000000" align="center" valign=middle><b>
                        <font face="Zawgyi-One" size=2 color="#000000"><br></font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">SHOWROOM </font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">{{ $sales_invoice_edit->showroom_name }}</font>
                    </b></td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>


            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    height="36" align="center" valign=middle><b>
                        <font size=2 color="#000000">NO</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">PARTS NO</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">DESCRIPTION</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">QTY</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">UNIT PRICE</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle><b>
                        <font size=2 color="#000000">AMOUNT</font>
                    </b></td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
            </tr>

            @php
                $total_unit_price = [];
                $total_qty = [];
                $total_ks = [];
            @endphp
            @foreach ($sales_invoice_edit->part_sale_items_table as $item_key => $part_sale_item)
                <tr>
                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                        height="29" align="center" valign=middle sdval="1" sdnum="1033;">
                        <font size=2 color="#000000">{{ $item_key + 1 }}</font>
                    </td>
                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                        align="left" valign=middle>
                        <font color="#000000">{{ $part_sale_item->spare_part_items_table->part_number ?? '' }}</font>
                    </td>
                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                        align="left" valign=middle>
                        <font color="#000000">{{ $part_sale_item->description ?? '' }}</font>
                    </td>
                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                        align="center" valign=middle sdval="1" sdnum="1033;">
                        <font color="#000000">
                            @php
                                $qty = $part_sale_item->qty ?? 0;
                                echo number_format($qty);
                                $total_qty[] = $qty;
                            @endphp
                        </font>
                    </td>
                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                        align="center" valign=middle sdval="5500"
                        sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                        <font color="#000000">
                            @php
                                $unit_price = $part_sale_item->unit_price ?? 0;
                                echo number_format($unit_price, 2);
                                $total_unit_price[] = $unit_price;
                            @endphp
                        </font>
                    </td>
                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                        align="center" valign=middle sdval="5500"
                        sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"><b>
                            <font size=2 color="#000000">
                                @php
                                    $ks = $unit_price * $qty;
                                    echo number_format($ks, 2);
                                    $total_ks[] = $ks;
                                @endphp
                            </font>
                        </b>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    colspan=3 height="25" align="center" valign=middle><b>
                        <font size=2 color="#000000">TOTAL QTY</font>
                    </b></td>
                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=bottom sdval="1" sdnum="1033;"><b>
                        <font size=2 color="#000000">
                            @php
                                $total_qty = array_sum($total_qty);
                                echo $total_qty;
                            @endphp
                        </font>
                    </b>
                </td>

                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=bottom sdval="5500" sdnum="1033;">
                    <font color="#000000">
                        @php
                            $total_unit_price = array_sum($total_unit_price);
                            echo number_format($total_unit_price, 2);
                        @endphp
                    </font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle sdval="5000" sdnum="1033;">
                    <font color="#000000">
                        @php
                            $total_ks = array_sum($total_ks);
                            echo number_format($total_ks, 2);
                        @endphp
                    </font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="28" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">TOTAL (KYAT)</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle sdval="10500"
                    sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"><b>
                        <font size=2 color="#000000">
                            @php
                                echo number_format($total_ks, 2);
                            @endphp
                        </font>
                    </b>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">DISCOUNT</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"><b>
                        <font size=2 color="#000000">
                            {{ $sales_invoice_edit->discount ?? 0 }}
                        </font>
                    </b>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">TAX</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"><b>
                        <font size=2 color="#000000">
                            {{ $sales_invoice_edit->tax ?? 0 }}
                        </font>
                    </b>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=middle>
                    <font color="#000000">NET AMOUNT</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                    align="center" valign=bottom sdval="10500"
                    sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)"><b>
                        <font size=2 color="#000000">
                            @php
                                $discount = $sales_invoice_edit->discount ?? 0;
                                $net_amount = $total_ks - ($total_ks / 100) * $discount;
                                echo number_format($net_amount, 2);
                            @endphp
                        </font>
                    </b>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font face="Zawgyi-One" size=2 color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                    <b><i>
                            <font color="#000000"><br></font>
                        </i></b>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000">
                        &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;
                    </font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000">
                        &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;
                    </font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;
                    </font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000">Customer's Signature</font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000">Check By</font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=middle>
                    <font color="#000000">Account </font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
        </table>

        <br clear=left>
    </body>

    </html>
@endsection
<script type="text/javascript">
    window.onload = function() {
        window.print();
    }
</script>
@section('script')
@endsection
