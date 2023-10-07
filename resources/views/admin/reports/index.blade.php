@extends('layouts.index')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    {{-- test1 --}}
                    {{-- <livewire:farmerstable/> --}}
                    {{-- main --}}
                    <livewire:crops-table />
                </div>
            </div>
        </div>
    </section>
@endsection
