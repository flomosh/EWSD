@extends('layouts.superadmin')

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
                    <th>Faculty</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email}}</td>
                    <td>
                        @foreach ($faculties as $faculty)
                        @if ($item->faculty == $faculty->id)
                            {{ $faculty->faculty_name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @if ($item->type == 'default')
                            Student
                        @endif
                        @if ($item->type == 'admin')
                            Coordinator
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('role', $item->id) }}" method="POST">
                            @csrf
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role" onchange="this.form.submit()">
                                <option selected disabled>Assign New Role</option>
                                <option value="default">Student</option>
                                <option value="admin">Coordinator</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main> 
@endsection