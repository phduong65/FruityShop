@extends('layouts.manager')
@section('title', 'Manage Post')
@section('manager_doashboard')
    <div style="text-align: center;" class="textbox">
        <h1 style="font-size: 200%">
            <p style="color: green">Trang Dashboard
            </p>
        </h1>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">

            <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Products</h4>
                            </div>
                            <span class="icon">
                                <ion-icon name="clipboard-outline"></ion-icon>
                            </span>
                        </div>
                        <div>
                            <h1 class="fw-bold">Số lượng: </h1>
                            <br>
                            <p class="mb-0"><span classname="text-dark me-2">{{ $sl_product }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Users</h4>
                            </div>
                            <span class="icon">
                                <ion-icon name="clipboard-outline"></ion-icon>
                            </span>
                        </div>
                        <div>
                            <h1 class="fw-bold">Số lượng: </h1>
                            <br>
                            <p class="mb-0"><span classname="text-dark me-2">{{ $sl_user }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Cart</h4>
                            </div>
                            <span class="icon">
                                <ion-icon name="clipboard-outline"></ion-icon>
                            </span>
                        </div>
                        <div>
                            <h1 class="fw-bold">Số lượng: </h1>
                            <br>
                            <p class="mb-0"><span classname="text-dark me-2">{{ $sl_donhang }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Posts</h4>
                            </div>
                            <span class="icon">
                                <ion-icon name="clipboard-outline"></ion-icon>
                            </span>
                        </div>
                        <div>
                            <h1 class="fw-bold">Số lượng: </h1>
                            <br>
                            <p class="mb-0"><span classname="text-dark me-2">{{ $sl_tintuc }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br>

@endsection
