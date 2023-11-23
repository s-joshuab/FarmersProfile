@extends('layouts.index')

@section('content')
    <section>
       <h3>Benefits Claimed</h3>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="table-responsive mt-3">
                            <table id="myTable" class="datatable table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Benefits Claimed</th>
                                        <th scope="col">Date Claimed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($benefits as $benefit)
                                        <tr>
                                            <td>{{ optional($benefit->farmersProfile)->fname . ' ' . optional($benefit->farmersProfile)->sname }}</td>
                                            <td>{{ optional(optional($benefit->farmersProfile)->barangay)->barangays ?? '' }}</td>
                                            <td>{{ $benefit->benefits }}</td>
                                            <td>{{ $benefit->date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
