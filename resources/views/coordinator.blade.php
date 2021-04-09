@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Contributions</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm text-center" style="vertical-align: middle;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File</th>
                    <th>Student</th>
                    <th style="width: 50%;">Comment</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contributions as $item)
                @foreach($users as $user)
                @if($user->faculty == Auth::user()->faculty)
                @if($item->submitted_by == $user->id)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="/uploads/{{ $item->file }}" download>{{ $item->file }}</a></td>
                    <td>
                        @foreach ($users as $user)
                        @if ($user->id == $item->submitted_by)
                        {{ $user->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $item->comment }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>@if ($item->status == 0)
                        <span class="text-muted">Pending</span>
                        @elseif ($item->status == 1)
                        <span class="text-primary">Resubmitted</span>
                        @elseif($item->status == 3)
                        <span class="text-success">Approved</span>
                        @elseif($item->status == 2)
                        <span class="text-danger">Rejected</span>
                    @endif</td>
                    <td><button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#submission{{ $item->id }}">Review</button></td>
                </tr>
                @endif
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@foreach ($contributions as $item)
@foreach($users as $user)
@if($user->faculty == Auth::user()->faculty)
@if($item->submitted_by == $user->id)
<div class="modal fade" id="submission{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Review Submission #{{ $item->id }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h6 >Submitted by: <b> @foreach ($users as $user)
                @if ($user->id == $item->submitted_by)
                {{ $user->name }}
                @endif
                @endforeach </b> -  <a class="mb-5" href="/uploads/{{ $item->file }}" download>{{ $item->file }}</a></h6>
               
            <form id="review{{ $item->id }}" action="{{ url('review', $item->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Comment</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="comment" placeholder="Enter comment here">
                </div>
                <select class="form-select form-select-sm mt-3" aria-label=".form-select-sm example" name="status">
                    <option selected>Change Status of Contribution</option>
                    <option value="2">Reject Contribution</option>
                    <option value="3">Approve for Publication</option>
                </select>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="review{{ $item->id }}" class="btn btn-success btn-sm">Submit</button>
        </div>
        </div>
    </div>
</div>
@endif
@endif
@endforeach
@endforeach
@endsection