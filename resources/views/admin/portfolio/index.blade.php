@extends('layouts.master') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @if(count($portfolios) > 0) @foreach ($portfolios as $portfolio)
        <div class="col-sm-3">
            <div class="card bg-light shadow p-1 mb-5 bg-white rounded dropdown dropright">
                <div class="card-body text-center dropdown-toggle" data-toggle="dropdown">
                    <b class="card-text">{{$portfolio->title}}</b>
                </div>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/portfolio/{{$portfolio->id}}">View</a>
                    <a class="dropdown-item" href="/admin/portfolio/{{$portfolio->id}}/edit">Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete <b>{{$portfolio->title}}</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this project? Please note this action cannot be reversed!
                            </div>
                            <div class="modal-footer">
                                <form action="{{action("PortfoliosController@destroy", "$portfolio->id")}}" method="POST"> @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach @endif
        <div class="col">
            <a href="/admin/portfolio/create" class="custom-card">
                <div class="card bg-dotted p-1 mb-5 rounded">
                    <div class="card-body text-center">
                        <p class="card-text">Create a new project</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection