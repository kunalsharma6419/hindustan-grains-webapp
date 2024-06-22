<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

    <title>Invoice</title>
</head>

<body>
    <div class="text-center mt-2">
        <button class="btn btn-primary no-print" onclick="window.print()">Print</button>
        <button class="btn btn-success no-print" onclick="goBack()">Back</button>
        @if(Auth::user()->usertype == 1)
            <a href="{{route('invoice_show_edit',$ordernumber)}}" class="btn btn-danger no-print">Edit</a>
        @else
            <a href="{{route('pro_invoice_show_edit',$ordernumber)}}" class="btn btn-danger no-print">Edit</a>
        @endif
    </div>
    <div class="container mt-5" style="border:1px solid black;">
        <div class="text-left">
            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/Rectangle 1.png') }}" alt="logo" />
            </a>
        </div>
        <div class="row">
            <div class="col-6">
                <h3>HINDUSTAN GRAINS</h3>
                <span>3C-113,NIT FARIDABAD</span>
                <br>
                <span>HARYANA-121001</span><br>
                <p><strong>Phone:</strong>8800128393, 8285550000 </p>
            </div>
            <div class="col-6">
                <h3>{{ $customer_get->name }}</h3>
                <span>{{ $customer_get->full_address }}</span>
                <br>
                <span>
                    <stron>Ph.No.:</strong>{{ $customer_get->phone_number }}
                </span><br>
                <span>
                    <stron>GST.:</strong>{{ $customer_get->gst_number }}
                </span>
            </div>
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <spna>Email: hindustangrains@gmail.com</spna><br>
                        <span>
                            <stron>GST.:</strong>06CDKPS2419C1ZO
                        </span>
                    </td>
                    <td style="background: gray; text-align: center;">
                        <h4>GST INVOICE</h4>
                    </td>
                    <td>
                    <div class="row">
                            <div class="col-6">
                                <span><strong>Invoice No.</strong>{{ $ordernumber }}</span><br>
                                <span><strong>Sales Man.</strong>{{ Auth::user()->name }}</span><br>
                                <span><strong>Supply Date:</strong> {{ $customer_get->supply_date }}</span><br>  
                            </div>
                            <div class="col-6">
                                <span><strong>Date:</strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span><br>
                                <span><strong>Due Date:</strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span><br>
                                <span><strong>Status:</strong> {{ $customer_get->status }}</span><br> 

                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sr.</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Product</th>
                    <th scope="col">HSN</th>
                    {{-- <th scope="col">MRP</th> --}}
                    <th scope="col">Rate</th>
                    <th scope="col">Dis.</th>
                    <th scope="col">SGST</th>
                    <th scope="col">CGST</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($productData as $product)
                    @php
                        $sgst = $customer_get->customer_type == 'distributer' ? 2.5 : 0;
                        $cgst = $customer_get->customer_type == 'distributer' ? 2.5 : 0;
                    @endphp
                    <tr>
                        <td class="border-right"><strong>{{ $loop->index + 1 }}.</strong></td>
                        <td class="border-right">{{ $product->quantity }}</td>
                        <td class="border-right"><strong>{{ $product->name }}</strong></td>
                        <td class="border-right">333</td>
                        {{-- <td class="border-right">{{ $product->original_price }}</td> --}}
                        <td class="border-right">{{ $customer_get->customer_type == 'distributer' ? $product->distributor_price : $product->retailer_price }}</td>
                        <td class="border-right">0</td>
                        <td class="border-right">{{ $sgst }}</td>
                        <td class="border-right">{{ $cgst }}</td>
                        <td>{{ $product->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       @php
            $totalorder = $orderTotal;
            $discountPercentage = $customer_get->customer_type == 'distributer' ? 5 : 0;
            $discountAmount = ($discountPercentage / 100) * $totalorder;
            $result = $totalorder - $discountAmount;
            $formattedResult = number_format($result, 2);

            $sgst = 0;
            $cgst = 0;

            if ($customer_get->customer_type == 'distributer') {
                $sgst = ($result * 2.5) / 100;
                $cgst = ($result * 2.5) / 100;
            }
        @endphp

        <br>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td scope="col">CLASS</td>
                            <td scope="col">TOTAL</td>
                            <td scope="col">SCH.</td>
                            <td scope="col">DISC.</td>
                            <td scope="col">SGST</td>
                            <td scope="col">CGST</td>
                            <td scope="col">TOTAL GST</td>
                            <td scope="col"><strong>Sub Total</strong></td>
                            <td scope="col">{{ $formattedResult }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">GST 5.0</td>
                            <td scope="col">{{ $formattedResult }}</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">{{ number_format($discountAmount / 2, 2) }}</td>
                            <td scope="col">{{ number_format($discountAmount / 2, 2) }}</td>
                            <td scope="col">{{ number_format($discountAmount, 2) }}</td>
                            <td scope="col"><strong>SGST PAYBAL</strong></td>
                            <td scope="col">{{ number_format($discountAmount / 2, 2) }}</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td scope="col">GST 12.0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col"><strong>CGST PAYBAL</strong></td>
                            <td scope="col">{{ number_format($discountAmount / 2, 2) }}</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td scope="col">GST 18.0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col"><strong>ADD/LESS</strong></td>
                            <td scope="col">0</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td scope="col">GST 28.0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col"><strong>CR/DR NOTE</strong></td>
                            <td scope="col">0</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td scope="col">Total</td>
                            <td scope="col">{{ $formattedResult }}</td>
                            <td scope="col">0</td>
                            <td scope="col">0</td>
                            <td scope="col">{{ number_format($discountAmount / 2, 2) }}</td>
                            <td scope="col">{{ number_format($discountAmount / 2, 2) }}</td>
                            <td scope="col">{{ number_format($discountAmount, 2) }}</td>
                            <td scope="col"><strong>GRAND TOTAL</strong></td>
                            <td scope="col"><strong>{{ number_format($orderTotal, 2) }}</strong></td>

                        </tr>
                    </tbody>
                    <td colspan="9"><strong>Rs. {{ $englishnumber }} only</strong></td>
                </table>
                <table class="table table-bordered">
                    <td>
                        <h6><u>Terms & Conditions</u></h6>
                        <span>Goods once sold will not be taken back or exchanged.</span><br>
                        <span>Bills not paid due date will attract 24% interest</span>
                    </td>
                    <td width="30%" class="text-center">
                        <h6>Reciver</h6>
                    </td>
                    <td width="30%" class="text-center">
                        <h6>for HINDUSTAN GRAINS</h6>
                        <div class="text-center">
                            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/Rectangle 1.png') }}" alt="logo" />
                            </a>
                        </div>
                    </td>
                </table>

            </div>

        </div>

        <br>



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>

</html>
