@extends('layouts.superadmin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Academic Year</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Entry</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th>Academic Year</th>
                    <th>Closure Date</th>
                    <th>Final Closure Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($years as $item)
                <tr>
                    <td>{{ $item->year}}</td>
                    <td>{{ $item->closure_date->format('d/m/Y')}}</td>
                    <td>{{ $item->final_closure_date->format('d/m/Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Academic Year</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="newyear" action="newyear" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="year" class="form-label">Academic Year</label>
                    <input type="number" id="year" class="form-control" name="year">
                </div>
                <div class="mb-3">
                    <label for="closure" class="form-label">Closure Date</label>
                    <input type="date" id="closure" class="form-control" name="closure_date">
                </div>
                <div class="mb-3">
                    <label for="finalclosure" class="form-label">Final Closure Date</label>
                    <input type="date" id="finalclosure" class="form-control" name="final_closure_date">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="newyear" class="btn btn-success btn-sm">Submit</button>
        </div>
        </div>
    </div>
</div>
@endsection