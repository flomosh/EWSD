@extends('layouts.superadmin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Faculties</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Faculty</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th>Faculty</th>
                    <th>Coordinator in Charge</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $item)
                <tr>
                    <td>{{ $item->faculty_name }}</td>
                    <td>
                        @foreach ($users as $user)
                        @if ($user->type == 'admin' && $user->faculty == $item->id)
                            {{ $user->name }}
                        @endif
                        @endforeach
                    </td>
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
            <h5 class="modal-title" id="exampleModalLabel">New Faculty</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="faculty" action="new-faculty" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Faculty Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                  </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="faculty" class="btn btn-success btn-sm" onclick="checkForm()">Submit</button>
        </div>
        </div>
    </div>
</div>
@endsection