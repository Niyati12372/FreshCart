<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>A simple, clean, and responsive HTML invoice template</title>

        <!-- Favicon -->
        <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

        <!-- Invoice styling -->
        <style>
      @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
            body {
                font-family: 'Open Sans', sans-serif;
                text-align: center;
                color: #777;
            }

            body h1 {
                font-weight: 500;
                margin-bottom: 20px;
                padding-bottom: 0px;
                color: #000;
            }

            body h3 {
                font-weight: 300;
                margin-top: 10px;
                margin-bottom: 20px;
                font-style: italic;
                color: #555;
            }

            body a {
                color: #06f;
            }

            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #2a2323;
            }
      .invoice-box h1{
        font-size: 2rem;
        text-transform: uppercase;
        font-weight: lighter !important;
        margin-bottom: 5rem;
        color: lightsalmon;
      }
      .invoice-box h1::after{
        content: '';
        display: block;
        width: 100%;
        height: 0.2rem;
        margin-top: 1rem;
        background-color: rgb(244, 238, 237);
      }
            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
                border-collapse: collapse;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
        color:#eec693;
        position: relative;
        top: -3rem;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #f4dcbd;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total {
                border-top: 2px solid #eee;
                border-bottom: 2px solid #eee;
                font-weight: bold;
            }

      .footer{
        height: 150px;
        margin-top: 2rem;
        background: rgb(244, 238, 237);
        padding-top: 2rem; 
        font-size: 2rem;
        border-bottom: 2px solid #8e8181;
        color: rgb(163, 44, 44);
        text-shadow: 1px 1px rgba(189, 174, 174, 0.486)
      }
      

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }
        </style>
    </head>

    <body>
    <div class="invoice-box">
      <h1>Invoice</h1>
            <table>
                <tr class="top">
                    <td colspan="4">
                        <table>
                            <tr>
                                <td class="title">
                  Fresh Cart
                                </td>

                                <td>
                                    <b>INVOICE</b> <br>#: {{$order[0]->id}}<br />
                  @php
                      $date = date_create($order[0]->created_at)
                  @endphp
                                    <b>ORDER DATE</b><br>{{date_format($date, 'F jS Y')}}<br />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="4">
                        <table>
                            <tr>
                                <td>
                  <b>BILLING INFORMATION</b><br/>
                                    Fresh Cart<br />
                                    1,2, Yogeshwar Park Soc.<br />
                                    Surat, 395006
                                </td>

                                <td>
                  <b>SHIPING INFORMATION</b><br/>
                                    {{$order[0]->first_name}} {{$order[0]->last_name}}<br />
                                    {{$order[0]->street_address}} <br /> {{$order[0]->city}}, {{$order[0]->zip_code}}<br />
                                    {{$order[0]->email}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Payment Method</td>

                    <td colspan="3">{{strtoupper($order[0]->payment_method)}}</td>
                </tr>

                <tr class="details">
                    <td></td>

                    <td></td>
                </tr>

                <tr class="heading">
                    <td>Item</td>
                    <td>Qty</td>
                    <td>Price</td>
                    <td align="right">Total</td>
                </tr>

        @php
            $totalAmount = 0;
        @endphp

        @foreach ($order_items as $items)
            @foreach ($items as $key=>$item)
              <tr class="item">
                <td>{{$item['name']}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{$item['price']}}</td>
                <td align="right">{{$item['quantity'] * $item['price']}}.00</td>
                
                {{ $totalAmount += $item['quantity'] * $item['price']}}
              </tr>
            @endforeach
        @endforeach
                

                <tr class="total">
                    <td></td>
                    <td colspan="3">Total: INR {{$totalAmount}}</td>
                </tr>
            </table>
      <div class="footer">
        <p>Thanks for visit</p>
      </div>
        </div>
    </body>
</html>