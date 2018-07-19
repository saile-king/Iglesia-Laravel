@extends('template')
@section('title', 'Miembros')
@section('content')
<!-- Icon Cards-->
<div class="container-fluid">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">Miembros</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('miembros.index')}}">
              <span class="float-left">Ver Detalles</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money-bill-wave"></i>
              </div>
              <div class="mr-5">Ofrendas</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver Detallles</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hand-holding-usd"></i>
              </div>
              <div class="mr-5">Gastos</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('gastos.index')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
    </div>


      <div class="row">
        <div class="col-lg-4">
          <!-- Example Bar Chart Card-->
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money-bill-wave"></i>
              </div>
              <div class="mr-5">Ingresos</div>
              <br>
              <div><h1>${{number_format($aporte)}} </h1></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver Detalles</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hand-holding-usd"></i>
              </div>
              <div class="mr-5">Gastos</div>
              <br>
              <div><h1>${{number_format($gasto)}} </h1></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver Detalles</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-usd"></i>
              </div>
              <div class="mr-5">Balance</div>
              <br>
              <div><h1>${{number_format($aporte-$gasto)}} </h1></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver Detalles</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <br>

</div>


@endsection