@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users List</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                @if($item->type == 'default')
                <tr>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</main> 
@endsection