@extends('layout')

@section('title', 'astinet')

@section('display-home', '')
@section('display-astinet', 'd-none')

@section('display-astinetlite', 'd-none')
@section('display-astinetbb', 'd-none')

@section('display-IPtransit-dropdown', 'd-none')
@section('display-IPtransit', 'd-none')
@section('display-IPtransitbb', 'd-none')
@section('display-logout', '')

@section('beranda-nav', 'active')
@section('astinet-nav', '')
@section('astinetlite-nav', '')
@section('astinetbb-nav', '')

@section('content')

<div class="form-group pt-100 px-100">
    <h1 class="display-4 text-center pb-50">Kalkulator Astinet</h1>
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-10 ">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <a href = "/astinet">
                        <h5 class="card-title text-white px-20 py-20 m-0" style="text-align: center;">Astinet</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-10 ">
            <div class="card text-white bg-primary">
                <div class="card-body">
                   <a href = "/astinetlite">
                        <h5 class="card-title text-white px-20 py-20 m-0" style="text-align: center;">Astinet Lite</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-10">
            <div class="card text-white bg-primary">
               <div class="card-body">
                   <a href = "/astinetbb">
                        <h5 class="card-title text-white py-20 m-0" style="text-align: center;">Astinet Beda Bandwidth</h5>
                    </a>
                </div>
            </div>
        </div>
<!--         
         @if(Session::get('flag_admin') == 1)
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mt-10 mb-100">
                <div class="card text-white bg-pumpkin">
                   <div class="card-body px-0 py-0">
                        <a href = "/admin">
                            <h5 class="card-title text-white py-40 m-0" style="text-align: center;">Halaman Admin</h5>
                        </a>
                    </div>
                </div>
            </div>
        @endif -->
    </div> 
</div>

@endsection
        
@section('javascript')
