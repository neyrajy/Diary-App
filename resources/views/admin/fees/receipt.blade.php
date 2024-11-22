<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt {{ $fee->receipt }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .wrapper {background-color: #FFA500; margin: 30px;padding: 30px;}
        .receipt-header { text-align: center; margin-bottom: 30px; }
        .receipt-details { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .receipt-details td, .receipt-details th { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class="receipt-header">
                    <h2>KIDDIE JUNCTION DAYCARE ACADEMY</h2>
                    <address>P. O. Box 149, ILOMBA - MBEYA<BR>
                        MOB: +255 655 981822/ +255 754 461029
                    </address>  
                </div>
                <div class="col text-start">
                    <p><strong>Receipt Number:</strong> {{ $fee->receipt }}</p>
                </div>
                <div class="col text-end">
                    <p>Date Paid: {{ $fee->paid_date }}</p>
                </div>
            </div>
        
            <table class="receipt-details">
                <tr>
                    <th>Received from M/s:</th>
                    <td> {{ $fee->student->firstname }} {{ $fee->student->secondname }} {{ $fee->student->lastname }} </td>
                </tr>
                <tr>
                    <th>The sum of shillings in words: </th>
                    <td>
                        @php
                            $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
                            echo ucfirst($formatter->format($fee->paid_amount));
                        @endphp
                    </td>
                </tr>
                <tr>
                    <th>Being payment of </th>
                    <td> {{ $fee->feeType->name }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($fee->status) }}</td>
                </tr>
            </table>

            <div class="row">
                <div class="col text-start">
                    <p><strong>{{ number_format($fee->paid_amount, 2) }}/= TZS</strong> </p>
                </div>
                <div class="col text-end">
                    <p>TIN: 118-463-722</p>
                </div>
                <div class="col text-end">
                    <p>Cashier Signature: ............</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
