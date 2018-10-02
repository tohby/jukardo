@extends('layouts.master') 
@section('content')
<div class="container">
    <div class="justify-content-center">
        <h1>Create new project</h1>
        <hr/>
        <form method="POST" enctype="multipart/form-data" action="{{action("PortfoliosController@store")}}">
            @csrf
            <div class="form-group">
                <label for="title">Project Title</label>
                <input type="text" class="form-control form-control-lg" name="title" placeholder="Enter project name/title"> {{-- <small id="emailHelp"
                    class="form-text text-muted">Project Name or title.</small> --}}
            </div>
            <div class="form-group">
                <label for="desc">Project Description</label>
                <textarea type="text" class="form-control form-control-lg" rows="5" name="desc" placeholder="Project Description"></textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img">
                <label class="custom-file-label" for="img">Choose image file</label>
            </div>
            <hr/>
            <button type="submit" class="btn btn-primary float-right" style="margin-top:10px;">Submit</button>
        </form>
    </div>
</div>
@endsection