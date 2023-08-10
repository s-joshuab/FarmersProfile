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


<div class="container mt-4" >
<div class="row">
    <div class="col-lg-12">
        <div class="page" style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover;
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
                <p style="font-size: 14px; font-weight: bold; margin-left: 110px; margin-top: -10px;">Andrei Eleazar B. Ballesteros</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 110px; margin-top: -20px;">Ar-arampang, Balaoan, La Union</p>
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
        <div class="page">
            <div class="header">
                <h4>Republic of the Philippines</h4>
                <h4>Municipality of La Union</h4>
                <h4>Bayan ng Balaoan</h4>
            </div>
            <hr class="design">
            <div class="content">
                <h4>Emergency Contact</h4>
                <hr>
                <p>Name: Jane Smith</p>
                <p>Relationship: Sister</p>
                <p>Contact No: 987-654-3210</p>
                <hr class="design">
                <h4>Certification</h4>
                <hr>
                <p>Certified to be true and correct.</p>
                <div class="signature-line"></div>
                <h5>OIC, Municipal Agriculturist</h5>
                <div class="signature-line"></div>
                <h5>Municipal Mayor</h5>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
