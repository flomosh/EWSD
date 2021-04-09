@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Contributions</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"  @if($years->closure_date < date("Y-m-d")) disabled @endif>Add New Contribution</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center" style="vertical-align: middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File</th>
                    <th style="width: 50%;">Comment</th>
                    <th>Submitted on</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($contributions->isEmpty())
                <tr>
                    <td colspan="5">You have no contributions</td>
                </tr>
                @endif
                @foreach ($contributions as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="/uploads/{{ $item->file }}" download>{{ $item->file }}</a></td>
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
                    <td><button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" @if($years->final_closure_date < date("Y-m-d")) disabled @endif>Edit</button></td>
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
          <h5 class="modal-title" id="exampleModalLabel">Submit Article</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="submission" action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file">
                </div>
            </form>
            <p class="text-center bg-danger py-2 text-light rounded mt-2 mb-0">Closure Date: {{ $years->closure_date->format('d/m/Y') }}</p>
            <div class="form-check mt-3 d-flex justify-content-center">
                <input class="form-check-input" id="terms" type="checkbox" required>
                <label class="form-check-label ml-3" for="flexCheckDefault">
                    &nbsp;&nbsp;I agree to the <a href="#">Terms & Conditions</a>
                </label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-sm" onclick="checkForm()">Submit</button>
        </div>
      </div>
    </div>
  </div>

  @foreach ($contributions as $item)
  <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Submit Article</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="submission{{ $item->id }}" action="{{ route('submission.update', $item->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file">
                </div>
            </form>
            <p class="text-center bg-danger py-2 text-light rounded mt-2 mb-0">Final Closure Date: {{ $years->final_closure_date->format('d/m/Y') }}</p>
            <div class="form-check mt-3 d-flex justify-content-center">
                <input class="form-check-input" id="terms{{ $item->id }}" type="checkbox" required>
                <label class="form-check-label ml-3" for="flexCheckDefault">
                    &nbsp;&nbsp;I agree to the <a href="#">Terms & Conditions</a>
                </label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-sm" onclick="checkForm{{ $item->id }}()">Submit</button>
        </div>
      </div>
    </div>
  </div>
  

  <script>

    function checkForm{{ $item->id }}(){
    event.preventDefault();
    terms = document.getElementById('terms{{ $item->id }}');
      if(!terms.checked) {
        alert("Please indicate that you accept the Terms and Conditions");
        form.terms.focus();
        return false;
      }
      document.getElementById('submission{{ $item->id }}').submit();
    }
  
  </script>

    @endforeach

    <script>

        function checkForm(){
        event.preventDefault();
        terms = document.getElementById('terms');
          if(!terms.checked) {
            alert("Please indicate that you accept the Terms and Conditions");
            form.terms.focus();
            return false;
          }
          document.getElementById('submission').submit();
        }
      
      </script>
@endsection