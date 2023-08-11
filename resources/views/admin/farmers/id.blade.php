@extends('layouts.index')
@section('content')

<style>
    .page {
        width: 430px;
        height: 260px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        margin-right: 20px;
        margin-bottom: 20px;
        display: inline-block;
        vertical-align: top;
        page-break-inside: avoid;
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .header h4 {
        margin: 0;
        font-size: 16px;
    }
    .design {
        height: 2px;
        background-color: #000;
        margin: 20px 0;
    }
    .signature-line {
        border-bottom: 1px solid #000;
        margin-top: 25px;
        width: 26%;
        margin-left: 5px;
    }
    .picture-square {
        width: 96px;
        height: 96px;
        background-color: #ccc;
        margin: 0 auto;
    }
</style>
</head>


<div class="container mt-4 shadow-lg" >
<div class="row">
    <div class="col-lg-12">
        <div class="page mt-3 shadow-sm" style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        ">
        <div class="header">
            <img src="{{ asset('assets/img/12345.jpg') }}" alt="Logo" style="max-width: 50px; margin-left: -350px; margin-top: 5px; border-radius: 50%;">
            <h4 style="font-size: 14px; margin-top: -50px; font-weight:bold;">Republic of the Philippines</h4>
            <h4 style="font-size: 14px; font-weight:bold;">Municipality of La Union</h4>
            <h4 style="font-size: 14px; font-weight:bold;">Bayan ng Balaoan</h4>
        </div>

            <hr class="design" style="margin-top: -15px;">
            <div class="content" style="position: relative;">
                <div class="picture-square" style="margin-left: 10px; margin-top: -5px;"></div>
                <div class="signature-line"></div>
                <p style="font-size: 12px; font-weight: bold; margin-left: 180px; margin-top: -130px;">Municipal Agriculture Office</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 218px; margin-top: -20px;">FARMER'S ID</p>
                <p style="font-size: 14px; font-weight: bold; margin-left: 142px; margin-top: -10px;">Andrei Eleazar B. Ballesteros</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 142px; margin-top: -20px;">Ar-arampang, Balaoan, La Union</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 140px; margin-top: -2px;">ID Number:<br> BLN 01 - 1</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 230px; margin-top: -52px;">Sex:<br> Male</p>
                <div class="row">
                    <p style="font-size: 12px; font-weight: bold; margin-left: 33px; margin-top: -10px;">Signature</p>
                    <p style="font-size: 12px; font-weight: bold; margin-left: 140px; margin-top: -30px;">Contact No:<br> 09617867892</p>
                    <p style="font-size: 12px; font-weight: bold; margin-top: -53px; margin-left: 230px;">Civil Status:<br> Married</p>
                </div>
                <div style="position: absolute; top: 90px; right: 20px; width: 80px; height: 80px; background-color: white;"></div>
            </div>
        </div>


        <div class="page mt-3 shadow-sm" style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        ">
            <div class="content">
                <div style="border: 2px solid #ff1dec; padding: 15px; border-radius: 10px;">
                    <h4 class="text-center mt-1" style="font-size: 16px; font-weight:bold; background-color: #ff1dec;">Person To Notify In Case of Emergency:</h4>
                    <hr class="design" style="margin-top: -8px;">
                    <div class="row text-center" style="margin-top: -15px;">
                        <p style="margin: 0px 0; font-size: 12px; font-weight:bold;">Andrei Eleazar B. Ballesteros</p>
                        <p style="margin: 0px 0; font-size: 12px; font-weight:bold;">Relationship: Sister</p>
                        <p style="margin: 0px 0; margin-bottom: 0; font-size: 12px; font-weight:bold;">0987-654-3210</p>
                    </div>
                </div>


                <hr class="design" style="margin-top: -1px;">
                <h4 class="text-center" style="font-size: 16px; font-weight:bold; margin-top: -10px;">C E R T I F I C A T I O N</h4>
                <p class="text-center" style="font-size: 12px; font-weight:bold; margin-top: -10px;">
                    This is to certify that the person whose name, photograph, and signature appear herein is a duly bonafide farmer of Balaoan, La Union
                </p>

                <div class="signature-line" style="width: 35%; margin-left: 13px; margin-top: 50px;"></div>
                <h5 style="font-size: 12px; margin-left: 15px; font-weight: bold;">ROGELIO C. OPINALDO JR.</h5>
                <h5 style="font-size: 10px; margin-left: 25px; margin-top: -10px;">OIC, Municipal Agriculturist</h5>


                <div class="signature-line" style="width: 35%; margin-left: 258px; margin-top: -33px"></div>
                <h5 style="font-size: 12px; margin-left: 250px; font-weight: bold;">ATTY. ALELI C. CONCEPCION</h5>
                <h5 style="font-size: 10px; margin-left: 300px; margin-top: -10px;">Municipal Mayor</h5>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
