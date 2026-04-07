<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports Details</title>

    <style>
        table{
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Stripe */
        tr:nth-of-type(odd){
            background: #eee;   
        }

        th{
            background: #36ae7c;
            color: #fff;
            border: 1px solid #ddd;
        }

        td{
            border: 1px solid #ddd;
            font-size: 14px;
            text-align: center;
        }

        h3{
            font-family: Arial, Helvetica, sans-serif;
        }
        h3.headerlogo{
            font-weight: normal;
            font-family: Arial, Helvetica, sans-serif;
        }
        p.headerlogo{
            margin-top: -20px;
            font-size: 20px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
        p{
            margin-top: -20px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div>
        <div style="text-align:center">
            <img src="./images/logom2.png" alt="DWCC Logo" height="70px">
            <img src="./images/DWCCLOGO.png" alt="DWCC Logo" height="70px">
            <img src="./images/logom2.png" alt="DWCC Logo" height="70px">
        </div>
        <div style="text-align:center">
            <h3 class="headerlogo">Divine Word College of Calapan</h3>
            <p class="headerlogo">Microhotel and Steyler Beanery Management System</p>
            <h3>Check-in Reservation Details</h3>
            <p>as of {{ $date }}</p>
        </div>
    </div>

    <table style="width: 100%">
        <thead>
            <tr>
                <th>Invoiceeee No.</th>
                <th>Name</th>
                <th>Booking Status</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Room No.</th>
                <th>Room Type</th>
                <th>Nights</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $index => $report)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $report->first_name }} &nbsp; {{ $report->last_name }}</td>
                    <td>{{ $report->booking_status }}</td>
                    <td> {{ \Carbon\Carbon::parse($report->checkin_date)->format('F j, Y') }}</td> 
                    <td> {{ \Carbon\Carbon::parse($report->checkout_date)->format('F j, Y') }}</td>
                    <td>{{ $report->room_number}}</td>
                    <td>{{ $report->room_type }}</td>
                    <td>{{ $report->nights }}</td>
                    <td>{{ $report->total_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div>
        <div style="text-align:left">
            <br>
            <text>Generated/Printed Date & Time: {{ $date }}</text>
            <br>
            <text>Printed by: {{ $authname }}</text>
        </div>
    </div>
</body>
</html>