@extends('layouts.guest')

@section('content')

         <!-- 1 section -->
         <section class="token-section">
            <div class="container-fluid mt-4 position-relative">
              <div class="card bg-dark">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-8 col-lg-9 col-xl-10">

                            <div class="d-flex align-items-center">
                                @if(@$data->image_path)
                                <img class="img-fluid"  src="{{ asset('storage/'. $data->image_path) }}" alt="{{ $data->token_name }}" class="card-img-top"
                                style="max-width: 140px; height: auto;" />
                            @else No Image @endif

                                <div class="card-body">
                                    <h5 class="card-title  ml-3 mb-0 h4">{{@$data->token_name }}</h5>
                                    <div class="d-flex flex-wrap">
                                        <button class="btn gradient-btn btn-sm m-3">
                                            <h4>{{Str::ucfirst($data->token_symbol) }}</h4>
                                        </button>
                                        <button class="btn btn-success btn-sm m-3"><span class="h4">{{Str::ucfirst($data->token_chain) }}</span></button>
                                        <button class="btn gradient-btn btn-sm m-3">
                                            {{@$data->people_clicked }}
                                            <small class="d-block">People Clicked</small>
                                        </button>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 ml-3">
                                            <p class="bg_more_dark">
                                                {{ $data->contract_address }}
                                                <i class='bx bxs-copy'></i>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="card-text mt-3">
                                {{ $data->description }}
                            </p>
                            <hr>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-4 col-lg-3 col-xl-2">
                            <div class="mt-4">
                                <a href="{{ $data->website }}" class="btn btn-block btn-black mb-2">
                                    <i class="fas fa-star"></i> Visit Website
                                </a>
                                <button class="btn btn-block  btn-black mb-2">
                                    <i class="bx bxl-telegram mr-1"></i> Telegram {{ $data->telegram }}
                                </button>
                                <a href="{{ $data->twitter }}" class="btn btn-block  btn-black mb-2">
                                    <i class="bx bxl-twitter mr-1"></i>Twitter
                                </a>

                                <a
                                title="{{getTokens(strtolower($data->token_chain),'dexscreener')}}{{ $data->contract_address }}"
                                class="btn btn-block gradient-btn"
                                href="{{getTokens(strtolower($data->token_chain),'dexscreener')}}{{ $data->contract_address }}"
                                ><img class="right_btns"
                                    src="{{url('main/images/token_logos/Dexscreener.webp')}}"
                                    alt="Dexscreener"
                            />
                            Dexscreener
                        </a>
                        <a
                        title="{{getTokens(strtolower($data->token_chain),'dextool')}}{{ $data->contract_address }}"
                        class="btn btn-block gradient-btn"
                        href="{{getTokens(strtolower($data->token_chain),'dextool')}}{{ $data->contract_address }}"
                        ><img
                        class="right_btns"
                            src="{{url('main/images/token_logos/Dextools.svg')}}"
                            alt="Dextools"
                    /> Dextools</a>
                    <a
                        class="btn btn-block gradient-btn"
                        href="#"
                        ><img
                        class="right_btns ml-2"
                            src="{{getTokens(strtolower($data->token_chain),'swap_logo')}}"
                            alt="Swap"
                    />{{ Str::ucfirst($data->pancakeswap) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              {{-- end of card --}}
            </div>
        </section>
    @endsection
