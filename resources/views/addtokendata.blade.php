<!-- resources/views/addtokendata.blade.php -->

@extends('layouts.app')
<!-- You may need to adjust this based on your project structure -->
@section('title','Manage Token')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Manage Token</h2>
    </div>
    <div class="card-body">



    <form
        action="{{ route('add-manual-data') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
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
                />
            </div>
            <div class="col-6 mb-3">
                <label for="token_chain" class="form-label">Token Chain</label>
                <select name="token_chain" id="token_chain" class="form-control" >
                    @foreach ($Coin as $key=> $token)
                    <option value="{{strtolower($token->chain)}}">{{ucfirst($token->chain)}}</option>
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
                />
            </div>
            <div class="col-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                ></textarea>
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
                />
            </div>
            <div class="col-4 mb-3">
                <label for="twitter" class="form-label">Twitter (url)</label>
                <input
                    type="url"
                    class="form-control"
                    id="twitter"
                    name="twitter"
                />
            </div>

            <div class="col-4 mb-3">
                <label for="website" class="form-label">Website (url)</label>
                <input
                    type="url"
                    class="form-control"
                    id="website"
                    name="website"
                />
            </div>

        </div>
        <button type="submit" class="btn btn-primary mb-3 float-right">Submit</button>
    </form>

    </div>
</div>

@endsection
