    @extends('layouts.index')
    @section('content')
    <div class="pagetitle">
        <!-- End Page Title -->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="text-center mt-4">
                        <a href="{{ route('reports.generate.pdf') }}" class="btn btn-primary">Generate PDF</a>
                        <a href="{{ route('reports.generate.excel') }}" class="btn btn-success">Generate Excel</a>
                    </div> --}}
                    <div class="table-responsive">
                        <table class="table table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Barangay</th>
                                    <th>Commodities</th>
                                    <th>Farmsize</th>
                                    <th>Farmlocation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($farmers as $farmer)
                                <tr>
                                    <th>{{ $farmer->farmersNumbers->first()?->farmersnumber ?? 'No Data' }}</th>
                                    <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                    <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                    <td>
                                        @php
                                            $commoditiesList = $farmer->crops->map(function ($crop) {
                                                return $crop->commodity->commodities;
                                            })->implode(', ');
                                        @endphp

                                        @if (strlen($commoditiesList) > 30)
                                            {{ Str::limit($commoditiesList, 3) }}, etc.
                                        @else
                                            {{ $commoditiesList }}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- Add more rows here -->
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
            $(document).ready(function () {
            var table = $('#myTable').DataTable({
            "ordering": false // Disable ordering (sorting) for all columns
            });
        });
    </script>

    @endsection
