@extends('layouts.menus.invoice')
@section('content')
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title></title>
        <meta name="generator" content="https://conversiontools.io" />

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
                font-size: x-small
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
        <div class="row invoice-add justify-content-center">
            <div class="col-lg-12 col-12">
                <center>
                    <table cellspacing="0" border="0">
                        <colgroup width="52"></colgroup>
                        <colgroup width="78"></colgroup>
                        <colgroup width="156"></colgroup>
                        <colgroup width="125"></colgroup>
                        <colgroup width="48"></colgroup>
                        <colgroup width="114"></colgroup>
                        <colgroup width="137"></colgroup>
                        <colgroup width="65"></colgroup>
                        <tr>
                            <td colspan=8 rowspan=4 height="121" align="left" valign=bottom>
                                <font color="#000000"><br><img src="{{ asset('invoice/dealer_inv_logo.jpg') }}" width=670
                                        height=95 hspace=32 vspace=14>
                                </font>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=bottom>
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
                            <td align="left" valign=bottom><b>
                                    <font color="#000000"><br></font>
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
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"
                                height="20" align="left" valign=bottom><b>
                                    <font color="#000000">Name</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=2 align="center" valign=bottom><b>
                                    <font face="Zawgyi-One" color="#000000">
                                        {{ $sales_invoice->customers_table->name ?? '' }}</font>
                                </b></td>
                            <td align="center" valign=bottom>
                                <font color="#000000">Invoice No</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom sdval="10" sdnum="1033;"><b>
                                    <font color="#000000">{{ $sales_invoice->invoice_no ?? '' }}</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                height="20" align="left" valign=bottom>
                                <font color="#000000">ID No.</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=2 align="center" valign=bottom sdval="100" sdnum="1033;1109;[$-455][NatNum1]0">
                                <b>
                                    <font face="Zawgyi-One" color="#000000">{{ $sales_invoice->id_no ?? '' }}</font>
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
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=top>
                                <font color="#000000">Address</font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom>
                                <font color="#000000">Date</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom sdnum="1033;1033;M/D/YYYY"><b>
                                    <font color="#000000">{{ $sales_invoice->invoice_date ?? '' }}</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 rowspan=3 height="60" align="center" valign=top>
                                <font color="#000000">{{ $sales_invoice->customers_table->address ?? '' }}</font>
                            </td>
                            <td align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom sdnum="1033;1033;M/D/YYYY"><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="center" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="center" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign=bottom>
                                <font color="#000000">Showroom Name</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom><b>
                                    <font color="#000000">{{ $sales_invoice->showroom_name ?? '' }}</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign=bottom>
                                <font color="#000000">Dealer Code</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><b>
                                    <font color="#000000" face="Times New Roman">
                                        {{ $sales_invoice->customers_table->dealer_code ?? '' }}</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=2 height="20" align="center" valign=middle>
                                <font color="#000000">PH</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="left" valign=top sdval="9123123123" sdnum="1033;">
                                <font color="#000000">{{ $sales_invoice->customers_table->phone ?? '' }}</font>
                            </td>
                            <td align="center" valign=bottom>
                                <font color="#000000">Sales Type</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom><b>
                                    <font color="#000000">{{ $sales_invoice->sales_type ?? '' }}</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=2 height="20" align="center" valign=middle>
                                <font color="#000000">E-Mail Address</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="left" valign=middle><u>
                                    <font color="#0563C1">{{ $sales_invoice->customers_table->email ?? '' }}</font>
                                </u></td>
                            <td align="left" valign=bottom>
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
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom>
                                <font color="#000000">Payment Team</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom><b>
                                    <font color="#000000">{{ $sales_invoice->payment_team ?? '' }}</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=bottom>
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
                            <td align="left" valign=bottom>
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
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                height="43" align="center" valign=middle><b>
                                    <font color="#000000">Sr.No</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">Model</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">Chassis No.&amp; Vehicle No.</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">Description</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">Qty</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">Price</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">Amount (MMK)</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>


                        @php
                            $total_amount = [];
                        @endphp
                        @foreach ($sales_items as $key => $sales_item)
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    height="20" align="center" valign=middle sdval="1" sdnum="1033;">
                                    <font color="#000000">{{ $key + 1 }}</font>
                                </td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    align="center" valign=middle sdval="1" sdnum="1033;">
                                    <font color="#000000">{{ $sales_item->products_table->model_no ?? '' }}</font>
                                </td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    align="left" valign=bottom sdval="1" sdnum="1033;">
                                    <font color="#000000">{{ $sales_item->products_table->chessi_no ?? '' }}</font>
                                </td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    align="right" valign=bottom sdval="1" sdnum="1033;">
                                    <font color="#000000">{{ $sales_item->description ?? '' }}</font>
                                </td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    align="right" valign=bottom sdval="1" sdnum="1033;">
                                    <font color="#000000">{{ $sales_item->qty ?? 0 }}</font>
                                </td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    align="right" valign=bottom sdval="1"
                                    sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                    <font color="#000000"> {{ number_format($sales_item->unit_price, 2) }} </font>
                                </td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                    align="right" valign=bottom sdval="1"
                                    sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                    <font color="#000000">
                                        @php
                                            $amount = $sales_item->qty * $sales_item->unit_price;
                                            echo number_format($amount, 2);
                                            $total_amount[] = $amount;
                                        @endphp
                                    </font>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td height="20" align="right" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="right" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="right" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="right" valign=bottom>
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
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=2 height="20" align="center" valign=middle><b>
                                    <font color="#000000">Sales Person</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle><b>
                                    <font color="#000000">{{ $sales_invoice->users_table->name ?? '' }}</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=middle><b>
                                    <font color="#000000">Total Amount</font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="right" valign=bottom sdval="1000"
                                sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                <font color="#000000">
                                    @php
                                        $total_amount = array_sum($total_amount);
                                        echo number_format($total_amount, 2);
                                    @endphp
                                </font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=2 rowspan=5 height="100" align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                rowspan=3 align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=middle>
                                <font color="#000000">Discount</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="right" valign=bottom sdval="1000"
                                sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                <font color="#000000">
                                    @php
                                        $discount = $sales_invoice->sales_invoices_payments_table->discount ?? 0;
                                        echo number_format($discount, 2);
                                    @endphp
                                </font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom>
                                <font color="#000000">Deposit</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="right" valign=bottom sdval="1000"
                                sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                <font color="#000000">
                                    {{-- Deposit Here --}}
                                </font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="right" valign=bottom sdval="3000"
                                sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                <font color="#000000">
                                    {{-- Here --}}
                                </font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"
                                colspan=2 align="center" valign=bottom>
                                <font color="#000000">Dealer (%)</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=bottom sdval="1" sdnum="1033;">
                                <font color="#000000">
                                    {{ $sales_invoice->sales_invoices_payments_table->dealer_ercentage ?? 0 }}%
                                </font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="right" valign=bottom sdval="1000"
                                sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                <font color="#000000">
                                    @php
                                        $amount_total = $total_amount;
                                        $dealer_ercentage = $sales_invoice->sales_invoices_payments_table->dealer_ercentage ?? 0;
                                        $dealer_ercentage_total = $amount_total * ($dealer_ercentage / 100);
                                        echo number_format($dealer_ercentage_total, 2);
                                    @endphp
                                </font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=3 align="center" valign=bottom>
                                <font color="#000000">Balance To Be Pay</font>
                            </td>
                            <td style="text-align: right; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=bottom sdval="5000"
                                sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;??_);_(@_)">
                                <font color="#000000">
                                    @php
                                        $amount_total = $total_amount;
                                        $down_payment = $sales_invoice->sales_invoices_payments_table->down_payment ?? 0;
                                        $discount = $sales_invoice->sales_invoices_payments_table->discount ?? 0;
                                        $dealer_ercentage_total = $dealer_ercentage_total;
                                        $balance_to_pay = $amount_total - $down_payment - $discount - $dealer_ercentage_total;
                                        echo number_format($balance_to_pay, 2);
                                    @endphp
                                </font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"
                                style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"
                                height="20" align="left" valign=middle>
                                <font color="#000000">Delivery Date</font>
                            </td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                align="center" valign=middle>
                                <font color="#000000">{{ $sales_invoice->delivery_date ?? ''}}</font>
                            </td>

                            <td align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td style="border-top: 1px solid #000000" align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="center" valign=middle>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=middle>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
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
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="center" valign=bottom>
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
                            <td height="20" align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000">Prepared By</font>
                                </b></td>
                            <td align="center" valign=bottom><b>
                                    <font color="#000000">Received By</font>
                                </b></td>
                            <td align="center" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000">Authorised Signature</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="center" valign=bottom><b>
                                    <font color="#000000">Customer</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000">Sale Manager</font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"
                                colspan=4 rowspan=2 align="center" valign=middle><b>
                                    <font face="Zawgyi-One" color="#000000">
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" align="left" valign=bottom>
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
                            <td height="20" align="left" valign=bottom>
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
                            <td align="left" valign=bottom>
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
                            <td height="20" align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000"><br></font>
                                </b></td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000"><br></font>
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
                            <td height="20" align="left" valign=bottom>
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
                            <td align="left" valign=bottom>
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
                            <td height="20" align="left" valign=bottom>
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
                            <td align="left" valign=bottom>
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
                            <td height="20" align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom><b>
                                    <font color="#000000">Approve by Account</font>
                                </b></td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td colspan=2 align="center" valign=bottom>
                                <font color="#000000">Approved by Manager</font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                            <td align="left" valign=bottom>
                                <font color="#000000"><br></font>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
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
