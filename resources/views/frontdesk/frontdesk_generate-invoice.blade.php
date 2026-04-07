<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{$guestRegistration->reservation_id}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
    
        .margin{
            padding: 30px;
            border: 1px solid black;
            border-width: 1px;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        .title{
            text-align: center;
        }
        .title p{
            font-weight: bold;
            font-size: 20px;
            margin-top: -10px
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
			border: none;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 20px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #55AFAB;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="margin">
        <div class="title">
        <h2>Divine Word College of Calapan</h2>
        <p>Microhotel</p>
        </div>
	<div>
		<h4 class="text-center">Statement of Account</h3>
	</div>

    <table class="order-details no-border">
        <thead>
            <tr>
                <th width="50%" colspan="2" class="no-border company-data">
                    <h2>{{ $guestRegistration->first_name }} {{ $guestRegistration->last_name }} </h2>
					<span><strong>Phone Number</strong> : {{ $guestRegistration->phone_number }}</span><br>
					<span><b>Address :</b> {{ $guestRegistration->address }}</span>
                </th>
                <th width="50%" colspan="2" class="text-end company-data no-border">
                    <h2>INVOICE: #{{$guestRegistration->reservation_id}}</h2> 
                    <span><b>Date:</b> {{ $date }}</span> <br>
                    {{-- <span><b>Zip code :</b> 560077</span> <br>
                    <span><b>Address:</b> #555, Main road, shivaji nagar, Bangalore, India</span> <br> --}}
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Booking Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Number of Nights:</b></td>
                <td>{{$reservation->nights}}</td>
            </tr>
			<tr>
                <td><b>Total No. of Guest:</b> </td>
                <td>{{$reservation->guests_num}}</td>
            </tr>
            <tr>
                <td><b>Additional Guests:</b></td>
                <td>{{$reservation->additional_guests}}</td>
            </tr>
			<tr>
                <td><b>Date Checked-in:</b></td>
                <td>{{$reservation->checkin_date}}</td>
            </tr>
			<tr>
                <td><b>Date Checked-out:</b></td>
                <td>{{$reservation->checkout_date}}</td>
            </tr>
			<tr>
                <td><b>Payment Method:</b></td>
                <td >{{ $guestRegistration->payment_method}}</td>
            </tr>
           
        </tbody>
    </table>
		
	{{-- <table width="50px">
		<thead>
			<tr class="bg-blue">
            	<th colspan="2">Booking Details</th>
        	</tr>
		</thead>
		
		<tbody>
            <tr>
                <td><b>Number of Nights:</b></td>
                <td>{{$reservation->nights}}</td>
            </tr>
			<tr>
                <td><b>Additional Beds:</b></td>
                <td>{{$reservation->extra_bed}}</td>
            </tr>
			<tr>
                <td><b>Date Checked-in:</b></td>
                <td>{{$reservation->checkin_date}}</td>
            </tr>
			<tr>
                <td><b>Date Checked-out:</b></td>
                <td>{{$reservation->checkout_date}}</td>
            </tr>
			<tr>
                <td><b>Payment Method:</b></td>
                <td >{{ $guestRegistration->payment_method}}</td>
            </tr>
           
        </tbody>
	</table> --}}

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="4">
                    Booking Summary
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Room No.</th>
                <th>Room Type</th>
                <th>Base Price</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%">{{$reservation->room_id}}</td>
                <td>
                    {{ $rooms->room_type }}
                </td>
                <td width="15%">{{ number_format($reservation->base_price,0) }}</td>
                <td width="20%" class="fw-bold">PHP {{ number_format($reservation->base_price,0) }}</td>
            </tr>
            
			<tr>
				<td colspan="3" class="text-end"><b>Additional Fee Per-Guests:</b></td>
                <td colspan="1">PHP {{number_format($reservation->guests_Fee,0)}}</td>
			</tr>
            <tr>
                <td colspan="3" class="total-heading text-end">Total Amount:</td>
                <td colspan="1" class="total-heading">PHP {{number_format($reservation->total_price,0)}}</td>
            </tr>
        </tbody>
    </table>
</div>
    

</body>
</html>