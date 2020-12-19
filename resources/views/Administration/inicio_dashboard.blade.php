@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <div class="row d-flex justify-content-center text-center">
            <div class="col-10 col-lg-3 mr-md-4 card mb-2">
                <div class="row my-auto p-2">
                        <div class="col-4 my-auto">
                                <i class="far fa-calendar-check text-info" font-size="100px"></i>
                            </div>
                            <div class="col-8">
                                <strong>Informes Completados</strong>
                                <br><br>
                                500
                            </div>
                </div>
            </div>
            <div class="col-10 col-lg-3 mr-md-4 card mb-2">
                    <div class="row my-auto p-2">
                            <div class="col-4 my-auto">
                                    <i class="fas fa-user-plus text-success"></i>
                                </div>
                                <div class="col-8">
                                    <strong>Usuario Registrados</strong>
                                    <br><br>
                                    500
                                </div>
                    </div>
                </div>
                <div class="col-10 col-lg-3 mr-md-4 card">
                        <div class="row my-auto p-2">
                                <div class="col-4">
                                        <i class="fas fa-bell text-danger"></i>
                                    </div>
                                    <div class="col-8">
                                        <strong>Ayuda y Soporte</strong>
                                        <br><br>
                                        500
                                    </div>
                        </div>
                    </div>
        </div>
<br>
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-xl-5 mr-xl-4 card" id="Sarah_chart_div" style="border: 1px solid #ccc" ></div>
            <div class="col-10 col-xl-5 card" id="line_chart_div" style="border: 1px solid #ccc"></div>


        </div>
<br>
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-xl-5 mr-xl-4 card my-auto" id="Anthony_chart_div" style="border: 1px solid #ccc"></div>
            <div class="col-10 col-xl-5 card" id="chart_div" style="border: 1px solid #ccc"></div>
        </div>
<br>
        <div class="row d-flex justify-content-center">
                <div class="col-10 col-xl-5 mr-xl-4 card my-auto" id="calendar_basic" style="border: 1px solid #ccc"></div>
                <div class="col-10 col-xl-5 card" id="donutchart" style="border: 1px solid #ccc"></div>
            </div>
<br>
    </div>
@endsection

@section("scripts")

<script src="{{ asset('js/graphics.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@endsection
