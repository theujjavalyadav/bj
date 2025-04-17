@extends('template.theme')
@section('contents')

<h3 class="page-title" >Dashboard</h3>
<div class="row">
    <div class="col-md-3">
        <div class="card card-stats card-warning">
            <div class="card-body "  style="background-color: pink;">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center"  	>
                        <div class="numbers" style="color: black;" >
                            <p class="card-category" >Visitors</p>
                            <h4 class="card-title" >1,294</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats card-success">
            <div class="card-body " style="background-color: skyblue;">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="fa-solid fa-chart-simple"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Sales</p>
                            <h4 class="card-title">$ 1,345</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats card-danger">
            <div class="card-body" style="background-color: gray;">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Subscribers</p>
                            <h4 class="card-title">1303</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats card-primary">
            <div class="card-body " style="background-color: orange;">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="fa-solid fa-truck"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Order</p>
                            <h4 class="card-title">576</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection