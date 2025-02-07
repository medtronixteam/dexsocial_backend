<!-- resources/views/updatedTokens.blade.php -->
@extends('layouts.app') @section('content')
<div class="container mt-5">
    <h1>Updated Tokens</h1>

    <table class="table dataTable1">
        <thead>
            <tr>
                <th>User</th>
                <th>Message</th>
                <th>Processed At</th>
                <th>Token Edited</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($updatedTokens as $data)
            <tr>
                <td>{{ $data->from_first_name }}</td>
                <td>{{ $data->text }}</td>
                <td>{{ $data->processed_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        @if ($data->token_edited) Yes @else @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
