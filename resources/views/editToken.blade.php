<!-- resources/views/showManualData.blade.php -->


@extends('layouts.app')



@section('title')
    Edit Token
@endsection
@section('content')





<div class="card">
    <div class="card-header">
        <h2>Edit Token</h2>
    </div>
    <div class="card-body">



        <form
        action="{{ route('update-manual-data', ['id' => $data->id]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf @method('PUT')
        <div class="row">
            <div class="col-6 mb-3">
                <label for="token_name" class="form-label"
                    >Name of the Token*</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="token_name"
                    name="token_name"
                    value="{{ $data->token_name }}"
                    required
                />
            </div>
            <div class="col-6 mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    accept="image/*"
                />
                @if($data->image_path)
                <img
                    src="{{ asset('storage/' . $data->image_path) }}"
                    alt="{{ $data->token_name }}"
                    width="50"
                    class="mt-2"
                />
                @else
                <p>No Image</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <label for="token_symbol" class="form-label"
                    >Token Symbol</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="token_symbol"
                    name="token_symbol"
                    value="{{$data->token_symbol}}"
                />
            </div>
            <div class="col-6 mb-3">
                <label for="token_chain" class="form-label">Token Chain</label>
                <select name="token_chain" id="token_chain" class="form-control" >

                    @foreach ($Coin as $key=> $token)
                    <option {{(strtolower($data->token_chain)==strtolower($token->chain))?"selected":""}} value="{{strtolower($token->chain)}}">{{ucfirst($token->chain)}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <label for="contract_address" class="form-label"
                    >Token Contract Address</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="contract_address"
                    name="contract_address"
                    value="{{$data->contract_address}}"
                />
            </div>
            <div class="col-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                >{{$token->description}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <label for="telegram" class="form-label"
                    >Telegram (number)</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="telegram"
                    name="telegram"
                    value="{{$data->telegram}}"
                />
            </div>
            <div class="col-4 mb-3">
                <label for="twitter" class="form-label">Twitter (url)</label>
                <input
                    type="url"
                    class="form-control"
                    id="twitter"
                    name="twitter"
                    value="{{$data->twitter}}"
                />
            </div>

            <div class="col-4 mb-3">
                <label for="website" class="form-label">Website (url)</label>
                <input
                    type="url"
                    class="form-control"
                    id="website"
                    name="website"
                    value="{{$data->website}}"
                />
            </div>

        </div>
        <button type="submit" class="btn btn-primary mb-3 float-right">Submit</button>
    </form>

    </div>
</div>

@endsection
