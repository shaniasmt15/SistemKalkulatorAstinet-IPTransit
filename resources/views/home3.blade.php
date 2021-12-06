@extends('layout')

@section('title', 'astinet')

@section('display-home', '')
@section('display-astinet', 'd-none')
@section('display-astinetlite', 'd-none')
@section('display-astinetbb', 'd-none')
@section('display-logout', '')

@section('display-IPtransit-dropdown', 'd-none')
@section('display-IPtransit', 'd-none')
@section('display-IPtransitbb', 'd-none')



@section('beranda-nav', 'active')
@section('astinet-nav', '')
@section('astinetlite-nav', '')
@section('astinetbb-nav', '')

@section('content')

<div class="form-group pt-100 px-100">
    <h1 class="display-4 text-center pb-50">Kalkulator IP Transit</h1>
    <div class="row">

     
        <!-- baru -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-10 ">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <a href = "/IPtransit">
                        <h5 class="card-title text-white px-20 py-20 m-0" style="text-align: center;">IP Transit</h5>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-10">
            <div class="card text-white bg-success">
               <div class="card-body">
                   <a href = "/IPtransitbb">
                        <h5 class="card-title text-white py-20 m-0" style="text-align: center;">IP Transit Beda Bandwidth</h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- end baru -->
         <!-- @if(Session::get('flag_admin') == 1)
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
