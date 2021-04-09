@extends('layouts.superadmin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Approved Contributions</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" onclick="downloadZip()" class="btn btn-sm btn-outline-secondary">Download ZIP</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File</th>
                    <th>Student</th>
                    <th style="width: 50%;">Comment</th>
                    <th>Date Submitted</th>
                    <th>Faculty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contributions as $item)
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
                    <td>@foreach ($users as $user)
                        @if ($user->id == $item->submitted_by)
                            @foreach ($faculties as $faculty)
                                @if ($faculty->id == $user->faculty)
                                    {{ $faculty->faculty_name }}
                                @endif
                            @endforeach
                        @endif
                    @endforeach</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection

@section("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js" integrity="sha512-uVSVjE7zYsGz4ag0HEzfugJ78oHCI1KhdkivjQro8ABL/PRiEO4ROwvrolYAcZnky0Fl/baWKYilQfWvESliRA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js" integrity="sha512-Qlv6VSKh1gDKGoJbnyA5RMXYcvnpIqhO++MhIM2fStMcGT9i2T//tSwYFlcyoRRDcDZ+TYHpH8azBBCyhpSeqw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.1.0/jszip-utils.min.js" integrity="sha512-3WaCYjK/lQuL0dVIRt1thLXr84Z/4Yppka6u40yEJT1QulYm9pCxguF6r8V84ndP5K03koI9hV1+zo/bUbgMtA==" crossorigin="anonymous"></script>
<script>
    function downloadZip(){
        var urls = [
                        @foreach ($contributions as $item)
                        'uploads/{{ $item->file }}',
                        @endforeach
                    ];
        var nombre = "Submissions";
        //The function is called
        compressed_img(urls,nombre);

        function compressed_img(urls,nombre) {
        var zip = new JSZip();
        var count = 0;
        var name = nombre+".zip";
        urls.forEach(function(url){
            JSZipUtils.getBinaryContent(url, function (err, data) {
            if(err) {
                throw err; 
            }
            zip.file(url, data,  {binary:true});
            count++;
            if (count == urls.length) {
                zip.generateAsync({type:'blob'}).then(function(content) {
                    saveAs(content, name);
                });
            }
            });
        });
        }
    }
</script>
@endsection