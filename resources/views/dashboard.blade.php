<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="chart-container">
                        
                        @include('graficas.numdama')

                </div>
            </div>
        </div>
    </div>
@endsection