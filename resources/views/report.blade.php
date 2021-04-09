@extends('layouts.superadmin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Reports</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-2 mt-md-0">
                <div class="card text-center">
                    <h1 class="m-0 mt-2">{{ count($contributions) }}</h1>
                    <p>Total Contributions</p>
                </div>
            </div>
            <div class="col-md-3 mt-2 mt-md-0">
                <div class="card text-center">
                    <h1 class="m-0 mt-2">{{ count($contributions->where('comment', null)) }}</h1>
                    <p>Contributions without Comments</p>
                </div>
            </div>
            <div class="col-md-3 mt-2 mt-md-0">
                <div class="card text-center">
                    <h1 class="m-0 mt-2">{{ count($contributions->where('status', 3)) }}</h1>
                    <p>Approved Submissions</p>
                </div>
            </div>
            <div class="col-md-3 mt-2 mt-md-0">
                <div class="card text-center">
                    <h1 class="m-0 mt-2">{{ count($users->where('type', 'default')) }}</h1>
                    <p>Contributors</p>
                </div>
            </div>
            <div class="col-md-12 mt-2 mt-md-3">
                <div class="card p-3">
                    <h6 class="text-center text-capitalize mb-4">Contributors by each faculty</h6>
                    <canvas id="myChart" style="width: 100%; height: 400px;"></canvas>
                </div>
            </div>   
        </div>
    </div>
</main>
@endsection

@section("script")
<script>
    (function () {
    'use strict'

    feather.replace()

    // Graphs
    var ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: [
            @foreach($faculties as $faculty)
            '{{ $faculty->faculty_name }}',
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach($faculties as $faculty)
                {{ count($users->where('faculty', $faculty->id)) }},
                @endforeach
            ],
            label: 'contributors',
            lineTension: 0,
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            borderWidth: 5,
        }]
        },
        options: {
        scales: {
            yAxes: [{
            ticks: {
                beginAtZero: true
            },
            max: 100,
            min: 0
            }]
        },
        legend: {
            display: false
        }
        }
    })
    })()
</script>
@endsection