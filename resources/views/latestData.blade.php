<!-- resources/views/latestData.blade.php -->
@extends('layouts.app')
@section('title',"Scraped Tokens")
@section('content')
<div class="card">
   <div class="card-header h4">
    Scraped Tokens
   </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Token Name</th>
                    <th>Token Symbol</th>
                    <th>Token Chain</th>
                    <th>Actions</th>
                    <!-- <th>Manually Added</th> -->
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($latestData as $key=> $data)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{ $data->token_name }}</td>

                    <td>{{ $data->token_symbol }}</td>
                    <td>{{ $data->token_chain }}</td>

                    <td>
                        <a type="button" style="cursor: pointer" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a  class="btn dropdown-item" href="{{ route('viewToken',base64_encode($data->id)) }}">View</a>
                            <a  class="btn dropdown-item" href="{{ route('token.edit',base64_encode($data->id)) }}">Edit</a>

                         <!-- Delete button -->
                         <a  class="btn dropdown-item bg-danger" onclick="deleteStudent(`{{base64_encode($data->id)}}`,'token')" href="javascript:void(0)">Delete</a>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                {!! $latestData->withQueryString()->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
