@extends('layouts.app') {{-- Assuming you have a master layout --}}

@section('title')
    View Manual Data
@endsection

@section('content')
<style>
    .crypto-link img{
  width: 20px;
  margin: 5px;
  height: auto;
  border-radius: 25px;
}
</style>
<div class="container">
    <h2 class=" text-white pb-5">Token Detail</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    @if($data->image_path)
                    <img class="img-fluid"  src="{{ asset('storage/'. $data->image_path) }}" alt="{{ $data->token_name }}" />
                @else No Image @endif
                </div>
                <div class="col-sm-6 mt-3">



                    <p><strong>Token Symbol:</strong> {{ $data->token_symbol }}</p>
                    <p><strong>Token Chain:</strong> {{ $data->token_chain }}</p>
                    <p><strong>Contract Address:</strong> </p>
                    <p class="bg_more_dark">
                        {{ $data->contract_address }}
                        <i class='bx bxs-copy'></i>

                    </p>

                </div>
                <div class="col-md-12 mt-3">
                    <p><strong>Description:</strong> {{ $data->description }}</p>
                    <p><strong>Telegram:</strong> {{ $data->telegram }}</p>
                    <p><strong>Twitter:</strong> {{ $data->twitter }}</p>
                    <p><strong>Website:</strong> {{ $data->website }}</p>

                    <div class="d-flex">
                        <a
                            title="{{getTokens(strtolower($data->token_chain),'dexscreener')}}{{ $data->contract_address }}"
                            class="crypto-link mx-1"
                            href="{{getTokens(strtolower($data->token_chain),'dexscreener')}}{{ $data->contract_address }}"
                            ><img
                                src="{{url('main/images/token_logos/Dexscreener.webp')}}"
                                alt="Dexscreener"
                        /></a>
                        <a
                            title="{{getTokens(strtolower($data->token_chain),'dextool')}}{{ $data->contract_address }}"
                            class="crypto-link mx-1"
                            href="{{getTokens(strtolower($data->token_chain),'dextool')}}{{ $data->contract_address }}"
                            ><img
                                src="{{url('main/images/token_logos/Dextools.svg')}}"
                                alt="Dextools"
                        /></a>
                        <a
                            class="crypto-link mx-1"
                            href="#"
                            ><img
                                src="{{getTokens(strtolower($data->token_chain),'swap_logo')}}"
                                alt="Swap"
                        /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
