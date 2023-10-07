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



<div class="container mt-4 shadow-lg" >
<div class="row">
    <div class="col-lg-12" id="content-to-capture">
        <div  class="page mt-3 shadow-sm" style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; ">
        <div class="header">
            <img src="{{ asset('assets/img/12345.jpg') }}" alt="Logo" style="max-width: 50px; margin-left: -350px; margin-top: 5px; border-radius: 50%;">
            <h4 style="font-size: 14px; margin-top: -50px; font-weight:bold;">Republic of the Philippines</h4>
            <h4 style="font-size: 14px; font-weight:bold;">Municipality of La Union</h4>
            <h4 style="font-size: 14px; font-weight:bold;">Bayan ng Balaoan</h4>
        </div>

            <hr class="design" style="margin-top: -15px;">

            @foreach ($farmers as $farmer)
            <div class="content" style="position: relative;">
                <div class="picture-square" style="margin-left: 10px; margin-top: -5px;"></div>
                <div class="signature-line"></div>
                <p style="font-size: 12px; font-weight: bold; margin-left: 180px; margin-top: -130px;">Municipal Agriculture Office</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 218px; margin-top: -20px;">FARMER'S ID</p>
                <p style="font-size: 14px; font-weight: bold; margin-left: 142px; margin-top: -10px;">{{ $farmer->fname }} {{ $farmer->sname }}</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 142px; margin-top: -20px;">{{ $farmer->barangay->barangays }} , {{ $farmer->municipality->municipalities }} , {{ $farmer->province->provinces }}</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 140px; margin-top: -2px;">ID Number:<br> {{ $farmer->farmersNumbers->first()->farmersnumber }}</p>
                <p style="font-size: 12px; font-weight: bold; margin-left: 230px; margin-top: -52px;">Sex:<br> {{ $farmer->sex }} </p>
                <div class="row">
                    <p style="font-size: 12px; font-weight: bold; margin-left: 33px; margin-top: -10px;">Signature</p>
                    <p style="font-size: 12px; font-weight: bold; margin-left: 140px; margin-top: -30px;">Contact No:<br> {{ $farmer->number }} </p>
                    <p style="font-size: 12px; font-weight: bold; margin-top: -53px; margin-left: 230px;">Civil Status:<br> {{ $farmer->cstatus }} </p>
                </div>
                @if ($farmer)
                <div style="position: absolute; top: 80px; right: 10px; width: 80px; height: 80px;">
                    @php
                        // Define the path to the QR code image
                        $qrCodeImagePath = 'public/qr_codes/' . $farmer->id . '.png';

                        // Fetch the QR code image data from storage
                        $qrCodeImageData = Storage::get($qrCodeImagePath);

                        // Convert the image data to base64
                        $qrCodeBase64 = base64_encode($qrCodeImageData);
                    @endphp

                    @if (!empty($qrCodeImageData))
                        {{-- Embed the QR code image directly in the <img> tag --}}
                        <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code" style="width: 80px; height: 80px;">
                    @else
                        <p>No QR Code Data</p>
                    @endif
                </div>
            @else
                <p>Farmer not found</p>
            @endif
            </div>
        </div>


        <div id="content-to-capture-2" class="page mt-3 shadow-sm"
        style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
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

    <div class="text-center mt-3">
    <button id="capture-button" class="btn btn-primary">Capture</button>
    <button id="capture-button-2" class="btn btn-primary">Capture</button>
    </div>
    <script>
        document.getElementById('capture-button').addEventListener('click', function() {
            // Specify the element to capture
            var elementToCapture = document.getElementById('content-to-capture');

            // Use html2canvas to capture the content
            html2canvas(elementToCapture).then(function(canvas) {
                // Convert the captured content to a PNG image
                var image = canvas.toDataURL('image/png');

                // You can send the 'image' variable to your server or display it as needed.
                // For example, create an image element and append it to the page.
                var imgElement = document.createElement('img');
                imgElement.src = image;
                document.body.appendChild(imgElement);
            });
        });
    </script>
    <script>
        document.getElementById('capture-button-2').addEventListener('click', function() {
            // Specify the element to capture
            var elementToCapture = document.getElementById('content-to-capture-2');

            // Use html2canvas to capture the content
            html2canvas(elementToCapture).then(function(canvas) {
                // Convert the captured content to a PNG image
                var image = canvas.toDataURL('image/png');

                // You can send the 'image' variable to your server or display it as needed.
                // For example, create an image element and append it to the page.
                var imgElement = document.createElement('img');
                imgElement.src = image;
                document.body.appendChild(imgElement);
            });
        });
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
    <script>
        // Function to trigger the image download
        function downloadImage() {
            // Get the first page element with class 'page'
            const page = document.querySelector('.page');

            // Create a new canvas element
            const canvas = document.createElement('canvas');

            // Set the canvas dimensions to match the page
            canvas.width = page.offsetWidth;
            canvas.height = page.offsetHeight;

            // Get the canvas context
            const context = canvas.getContext('2d');

            // Draw the content of the page onto the canvas
            const pageContent = page.cloneNode(true);
            context.drawImage(pageContent, 0, 0);

            // Convert the canvas to a data URL (PNG format)
            const dataURL = canvas.toDataURL('image/png');

            // Create a temporary anchor element
            const downloadLink = document.createElement('a');
            downloadLink.href = dataURL;
            downloadLink.download = 'farmer_id.png'; // You can customize the filename here

            // Trigger a click event on the link to initiate the download
            downloadLink.click();
        }

        // Add a click event listener to the "Save Image" button
        document.getElementById('downloadImageBtn').addEventListener('click', downloadImage);
    </script>



    @endforeach
@endsection
