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
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Most Planted Commodity</th>
                                        <th scope="col">Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $row)
                                        <tr>
                                            <td>{{ $row->barangay }}</td>
                                            <td>{{ $row->commodity }}</td>
                                            <td>{{ $row->count }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
