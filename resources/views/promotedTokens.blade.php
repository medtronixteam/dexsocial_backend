<!-- resources/views/promotedTokens.blade.php -->
@extends('layouts.app') @section('content')
<div class="card ">
    <div class="card-header h5">
        Promoted Tokens

    </div>
    <div class="card-body">


        <table class="table table-bordered dataTable1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Token Name</th>
                    <th>Token Symbol</th>
                    <th>Token Chain</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($promotedTokens as $key=> $data)
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
                         @if ($data->promoted==1)
                         <a  class="btn dropdown-item" onclick="demoteit(`{{base64_encode($data->id)}}`)" href="javascript:void(0)">Demote</a>
                         @else
                         <a  class="btn dropdown-item" onclick="promoteit(`{{base64_encode($data->id)}}`)" href="javascript:void(0)">Promote</a>
                         @endif
                         <a  class="btn dropdown-item bg-danger" onclick="deleteStudent(`{{base64_encode($data->id)}}`,'token')" href="javascript:void(0)">Delete</a>


                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
