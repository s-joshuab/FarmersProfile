@extends('layouts.index')
@section('content')

   <style>
        body {
            font-family: 'arial';
        }

        .lavkush img {
            border-radius: 8px;
            border: 2px solid blue;
        }

        span {
            font-family: 'Orbitron', sans-serif;
            font-size: 16px;
        }

        hr.new2 {
            border-top: 1px dashed black;
            width: 350px;
            text-align: left;
            align-items: left;
        }

        /* second id card  */
        p {
            font-size: 13px;
            margin-top: -5px;
        }

        .card {
            width: 380px;
            height: 220px;
            margin: auto;
            /* background-image: url(municipal.JPG); */
            background-size: cover; /* Adjust to 'contain' if you want the entire image to be visible */
            background-position: center; /* You can also use specific coordinates like '50% 50%' */
            background-repeat: no-repeat;
            box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
            overflow: hidden;
            border-radius: 10px;
        }

        .card-2 {
            /* border: 2px solid red; */
            width: 73vh;
            height: 10vh;
            margin: 0px auto;
            margin-top: -20px;
            display: flex;
        }

        .box-1 {
            border: 2px solid black;
            width: 94.5px;
            height: 94.5px;
            margin: -40px 25px;
            border-radius: 3px;
        }


        .box-2 h2 {
            font-size: 1.3rem;
            color: rgb(27, 27, 49);
            ;
        }

        .box-2 p {
            font-size: 0.7rem;

        }

        .box-3 {
            /* border: 2px solid rgb(21, 255, 0); */
            width: 8vh;
            height: 8vh;
            margin: 8px 0px 8px 30px;
        }

        .box-3 img {
            width: 8vh;
        }

        .card-3 {
            /* border: 2px solid rgb(111, 2, 161); */
            width: 73vh;
            height: 12vh;
            margin: 0px auto;
            margin-top: 10px;
            display: flex;
            font-family: 'Shippori Antique B1', sans-serif;
            font-size: 0.7rem;
        }

        .info-1 {
            /* border: 1px solid rgb(255, 38, 0); */
            width: 17vh;
            height: 12vh;

        }

        .id {
            /* border: 1px solid rgb(2, 92, 17); */
            width: 17vh;
            height: 5vh;
        }

        .id h4 {
            font-size: 14px;
        }

        .dob {
            /* border: 1px solid rgb(0, 46, 105); */
            width: 17vh;
            height: 5vh;
            margin: 8px 0px 0px 0px;
        }

        .dob h4 {
            /* color: rgb(179, 116, 0); */
            font-size: 14px;
        }

        .info-2 {
            /* border: 1px solid rgb(4, 0, 59); */
            width: 17vh;
            height: 12vh;
        }

        .join-date {
            /* border: 1px solid rgb(2, 92, 17); */
            width: 17vh;
            height: 5vh;
        }

        .join-date h4 {

            font-size: 14px;
        }

        .expire-date {
            /* border: 1px solid rgb(0, 46, 105); */
            width: 17vh;
            height: 5vh;
            margin: 8px 0px 0px 0px;
        }

        .expire-date h4 {
            font-size: 14px;
        }

        .info-3 {
            /* border: 1px solid rgb(255, 38, 0); */
            width: 17vh;
            height: 12vh;
        }

        .email {
            /* border: 1px solid rgb(2, 92, 17); */
            width: 22vh;
            height: 5vh;
        }

        .email h4 {
            font-size: 14px;
        }

        .phone {
            /* border: 1px solid rgb(0, 46, 105); */
            width: 17vh;
            height: 5vh;
            margin: 8px 0px 0px 0px;
        }


        .phone h4 {
            font-size: 14px;
        }


        .qr-code-img {
        margin-top: -100px;
        margin-right: -250px;
        max-width: 100px;
        border: 2px solid #000000;
    }

    </style>
<div class="container">
    <div class="col-lg-12">
<div class="row">
    <div class="card mt-3 shadow-lg" style="text-align: left; background-image: url('{{ asset('assets/img/bg.png') }}');">
    <div class="header" style="background-color: #5bcbff; height: 500px; width: 100%; display: flex; align-items: center;">
        <img src="{{ asset('assets/img/balaoan-5.webp') }}" style="height: 40px; width: 40px; margin-right: 10px;" alt="Header Image">
        <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
            <p class="text-center" style="margin: 0; font-weight: bold;">REPUBLIC OF THE PHILIPPINES</p>
            <p class="text-center" style="margin: 0; font-weight: bold;">PROVINCE OF LA UNION</p>
            <p class="text-center" style="margin: 0; font-weight: bold;">MUNICIPALITY OF BALAOAN</p>
        </div>
    </div>

    <div class="card-2" style="margin-top: 100px; margin-left: 5px">
        <div class="box-1" style="margin-top: -95px; margin-left: 3px;">
        </div>
      <div class="box-2 col-md-12" style="width: 200px; margin-top: -90px;">
    <h2 style="margin-left: -20px; font-size: 14px; font-weight: bold;">Andrei Eleazar Ballesteros</h2>
    <p style="font-size: 12px; margin-left: -20px;">Dr.Camilo, Balaoan, La Union</p>
</div>

        <div class="box-3">
        </div>
    </div>

    <div class='card-3'>
        <div class='info-4'>
            <div class='sign'>
                <div class="line-center" style="border-top: 2px solid #000; width: 100px; margin: 0 auto; margin-top: -50px; margin-left: 1px"></div>
                <p class="text-center" style='font-size:8px; margin-right: 20px; margin: 0 auto; font-weight: bold;'>Signature</p>
            </div>
        </div>
        <div class='info-1'>
            <div class="id" style="margin-top: -122px; margin-left: 5px;">
                <h4 style="margin-left: 1px; margin: 0 auto;">ID NO:</h4>
                <p style="margin-left: 1px; font-weight: bold; margin: 0 auto;">BLN 123-456</p>
            </div>

            <div class="dob" style="margin-top: 5px; margin-left: 5px;  margin-bottom: 10px;">
                <h4 style="margin-left: 1px; margin: 0 auto;">Civil Status:</h4>
                <p style="margin-left: 1px; font-weight: bold; margin: 0 auto;">Single</p>
            </div>
        </div>
        <div class='info-2' style="margin-top: -122px;">
            <div class='join-date'>
                <h4 style="margin-left: 1px; margin: 0 auto;">Contact No.:</h4>
                <p style="margin-left: 1px; font-weight: bold; margin: 0 auto;">096178678926</p>
            </div>
            <div class='expire-date'>
                <h4 style="margin-left: 1px; margin: 0 auto;">Sex:</h4>
                <p style="margin-left: 1px; font-weight: bold; margin: 0 auto;">Male</p>
            </div>
        </div>
        <div class='info-4'>
            <div class='sign'>
                <br>
                {{-- <img class="qr-code-img" src="#" alt="QR Code"> --}}
            </div>
        </div>
    </div>
</div>

<div class="card mt-3 shadow-lg back" style=" background-image: url(bg.png);">
    <div class="emergency-info mt-2">
        <h4 class="text-center" style="font-size: 20px; font-weight: bold;">PERSON TO NOTIFY IN CASE OF EMERGENCY</h4>
        <p class="text-center" style="font-weight: bold;">John Doe</p>
        <p class="text-center" style="font-weight: bold; margin-top: -15px;">John Doe</p>
        <p class="text-center" style="font-weight: bold; margin-top: -15px;">John Doe</p>
    </div>

    <div class="certification mt-4">
        <h4 class="text-center" style="font-size: 20px; font-weight: bold;">CERTIFICATION</h4>
        <p class="text-center">This is to certify that the person whose name, photograph and signature appear herein is a duly bonafide farmer of Balaoan, La Union</p>
    </div>

    <div class="signature-card mt-4" style="display: flex; ">
        <div class="signature mt-3" style="margin-right: 20px; margin-left: 40px;">
            <div class="line-center" style="border-top: 2px solid #000; width: 100px; margin: 0 auto; margin-bottom: 5px;"></div>
            <p class="text-center">John Smith</p>
            <p class="text-center" style="margin-top: -18px;">OIC, Municipal Agriculturist</p>
        </div>

        <div class="signature mt-3" style="margin-left: 130px;">
            <div class="line-center" style="border-top: 2px solid #000; width: 100px; margin: 0 auto; margin-bottom: 5px;"></div>
            <p class="text-center">Jane Doe</p>
            <p class="text-center" style="margin-top: -18px;">Municipal Mayor</p>
        </div>
    </div>
</div>
</div>
    </div>
</div>
@endsection
