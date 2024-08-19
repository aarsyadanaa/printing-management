

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice SmartPrint</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #9f181c;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #9f181c none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #9f181c none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
</head>
<body>
    <div class="col-md-12">   
        <div class="row">
               
               <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                   <div class="row">
                       <div class="receipt-header">
                           <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="receipt-left">
                                <img class="img-responsive" alt="logo_perusahaan" src="/img/logoManxi.jpeg"style="width: 30%; border-radius: 10%;">
                            </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                               <div class="receipt-right">
                                   <h5>SmartPrint</h5>
                                   <p>xxxxxx <i class="fa fa-phone"></i></p>
                                   <p>nofaarsyadana12@gmail.com <i class="fa fa-envelope-o"></i></p>
                                   <p>Sragen <i class="fa fa-location-arrow"></i></p>
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   <div class="row">
                       <div class="receipt-header receipt-header-mid">
                           <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                               <div class="receipt-right">
                                   <h5> Kepada</h5>
                                   <p><b>Nama :</b> -</p>
                                   <p><b>Email : -</b> </p>
                               </div>
                           </div>
                       </div>
                   </div>
                   
                   <div>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Item</th>
                                   <th>Amount</th>
                               </tr>
                           </thead>
                           <tbody>
                           <tr>
                           @foreach($data as $item)
                              <td class="col-md-9">{{ preg_replace('/^(.*?)_/', '', pathinfo($item->file, PATHINFO_FILENAME)) }}<br></td>
                              <td class="col-md-3"><i class="fa fa-inr"></i> Rp{{$item->amount}},00</td>
                          </tr>
                          @endforeach
                              <tr>
                                  <td class="text-right"><h2>Total: </h2></td>
                                  <td class="text-left text-danger">
                                      <h2><strong><i class="fa fa-inr"></i>
                                          Rp@php
                                              $totalAmount = 0;
                                              foreach($data as $item) {
                                                  $totalAmount += $item->amount;
                                              }
                                              echo $totalAmount;
                                          @endphp,00
                                    </strong></h2>
                                  </td>
                              </tr>

                           </tbody>
                       </table>
                   </div>
                   
                   <div class="row">
                       <div class="receipt-header receipt-header-mid receipt-footer">
                           <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                               <div class="receipt-right">
                                   <p><b>Dibuat Pada :</b>{{ date("d F Y H:i:s", strtotime ($time)) }}</p>
                                   <h5 style="color: rgb(140, 140, 140);">Silahkan mengambil hasil cetakan dokumen dengan menunjukan invoice ini, Terimakasih</h5>
                                   
                               </div>
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4">
                               <div class="receipt-left">
                                   <h1>Order ID : {{ $idOrder }}</h1>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>    
           </div>
       </div>
       <div style="padding: 0 0 0 65%;">
        <button type="button" class="btn btn-success" style="color: white;" onclick="printInvoice()"><a style="color: inherit; text-decoration: none;">Cetak Invoice</a></button>
        <button type="button" class="btn btn-warning" style="color: white;"><a href=/ style="color: inherit; text-decoration: none;">Beranda</a></button>
        </div>
</body>
<script>
    function printInvoice() {
        window.print();
    }
</script>
</html>
