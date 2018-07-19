<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Iglesia Cristiana Cuadrangular</title>
    <style type="text/css">
.clearfix:after {content: "";display: table;clear: both;} 
a {color: #5D6975;text-decoration: underline;}
body {position: relative;width: 19cm;height: 29.7cm;margin: 0 auto;color: #001028;background: #FFFFFF; font-family: Arial, sans-serif; font-size: 12px; font-family: Arial;}
header {padding: 10px 0;margin-bottom: 30px;}
#logo {text-align: center;margin-bottom: 10px;}
#logo img {width: 90px;}
h1 {border-top: 1px solid  #5D6975;border-bottom: 1px solid  #5D6975;color: #5D6975;font-size: 2.4em;line-height: 1.4em;font-weight: normal;text-align: center;margin: 0 0 20px 0;background: url()}});}
#project {float: left;}
#project span {color: #5D6975;text-align: right;width: 52px;margin-right: 10px;display: inline-block;font-size: 0.8em;}
#company {float: right;text-align: right;}
#project div,
#company div {white-space: nowrap;}
table {width: 100%;border-collapse: collapse;border-spacing: 0;margin-bottom: 20px;}
table tr:nth-child(2n-1) td {background: #F5F5F5;}
table th,
table td {text-align: center;}
table th {padding: 5px 20px;color: #5D6975;border-bottom: 1px solid #C1CED9;white-space: nowrap;font-weight: normal;}
table .service,
table .desc {text-align: left;}
table td {padding: 20px;text-align: right;}
table td.service,
table td.desc {vertical-align: top;}
table td.unit,
table td.qty,
table td.total {font-size: 1.2em;}
table td.grand {border-top: 1px solid #5D6975;;}
#notices .notice {color: #5D6975;font-size: 1.2em;}
footer {color: #5D6975;width: 100%;height: 30px;position: absolute;bottom: 0;border-top: 1px solid #C1CED9;padding: 8px 0;text-align: center;}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="./public/images/logo.png'">
      </div>
      <h1>Listado Aportes</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Fecha</th>
            <th class="service">Identificacion</th>
            <th class="desc">Nombres</th>
            <th class="service">Direccion</th>
            <th class="desc">Concepto</th>
            <th class="total">Valor</th>
          </tr>
        </thead>
        <tbody>
        @foreach($aporte as $item)
          <tr>
            <td class="service">{{$item->fecha}}</td>
            <td class="desc">{{$item->miembro->n_identificacion}}</td>
            <td class="desc">{{$item->miembro->nombres}} {{$item->miembro->apellidos}}</td>
            <td class="desc">{{$item->miembro->direccion}}</td>
            <td class="desc">{{$item->concepto->nombre}}</td>
            <td class="total">${{number_format($item->valor,2)}}</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="5" class="grand total">TOTAL: </td>
            <td class="grand total">${{number_format($total_mes,2)}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      © Copyright 2018 Elias Ibañez.
    </footer>
  </body>
</html>