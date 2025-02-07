@extends('layouts.guest')

@section('content')
            <!-- 1 section -->
    <section class="token-section">
                <div class="container-fluid">
                    <div class="row mb-4">
                        @foreach ($promotedTokens as $token)
                        <div class="col-md-6 col-lg-4">
                            <a
                                href="{{ route('view-manual-data', $token->contract_address) }}"
                            >
                                <div class="dark-card align-items-center">
                                    <!-- Image and Date Badge -->
                                    <div class="pokemon">
                                        <img
                                            src="{{ $token->image_path ? asset('storage/' . $token->image_path) : asset('assets/index/assets/images/pok.png') }}"
                                            alt=""
                                            class="img-fluid"
                                            style="
                                                max-width: 90px;
                                                border-radius: 10px;
                                                max-height: 90px;
                                                height: 90px;
                                                width: 90px;
                                            "
                                        />
                                        <img
                                            style="
                                                position: absolute;
                                                max-width: 20px;
                                                bottom: -2px;
                                                left: 40%;
                                                box-shadow: 0 4px 8px 0
                                                        rgba(0, 0, 0, 0.2),
                                                    0 6px 20px 0
                                                        rgba(0, 0, 0, 0.19);
                                            "
                                            src="{{getTokens(strtolower($token->token_chain),'logo')}}"
                                            alt=""
                                        />
                                        <span
                                            class="badge badge-warning date-badge"
                                            >{{getTimeFormat('M',$token->created_at)}}</span
                                        >
                                    </div>

                                    <!-- Token Information -->
                                    <div
                                        class="content mx-3"
                                        style="width: 80%"
                                    >
                                        <!-- Token Name and Symbol -->
                                        <h5
                                            class="font-weight-bold mb-1 text-white"
                                        >
                                            {{$token->token_name}}
                                        </h5>

                                        <!-- Blockchain Type (Solana, Ethereum, etc.) and Token Contract Address -->
                                        <!-- <p>Solana or Eth. | Token Contract Address</p> -->

                                        <!-- Token Description -->
                                        <p
                                            class="text-muted"
                                            style="font-size: 10px"
                                        >
                                            {{getFirstLastWords($token->contract_address)}}
                                        </p>

                                        <!-- Social Icons -->
                                        <div class="icons d-flex">
                                            <!-- Website, Telegram, and Twitter Icons -->
                                            <a
                                                class="social-link"
                                                href="{{$token->twitter}}"
                                                ><i class="bx bxl-twitter"></i
                                            ></a>
                                            <a class="social-link" href="#"
                                                ><i
                                                    class="bx bxl-telegram mr-1"
                                                ></i
                                                >{{$token->telegram}}</a
                                            >
                                            <a
                                                class="social-link"
                                                href="{{$token->website}}"
                                                ><i class="bx bx-globe mr-1"></i
                                                >Website</a
                                            >
                                        </div>

                                        <!-- Social Icons -->
                                        <div
                                            class="icons d-flex align-items-end justify-content-between"
                                        >
                                            <!-- Other Icons (Dexscreener, Dextools, Pancakeswap) -->
                                            <div class="d-flex">
                                                <a
                                                    title="{{getTokens(strtolower($token->token_chain),'dexscreener')}}{{ $token->contract_address }}"
                                                    class="crypto-link mx-1"
                                                    href="{{getTokens(strtolower($token->token_chain),'dexscreener')}}{{ $token->contract_address }}"
                                                    ><img
                                                        src="{{url('main/images/token_logos/Dexscreener.webp')}}"
                                                        alt="Dexscreener"
                                                /></a>
                                                <a
                                                    title="{{getTokens(strtolower($token->token_chain),'dextool')}}{{ $token->contract_address }}"
                                                    class="crypto-link mx-1"
                                                    href="{{getTokens(strtolower($token->token_chain),'dextool')}}{{ $token->contract_address }}"
                                                    ><img
                                                        src="{{url('main/images/token_logos/Dextools.svg')}}"
                                                        alt="Dextools"
                                                /></a>
                                                @if (getTokens(strtolower($token->token_chain),'swap_logo'))


                                                <a
                                                    class="crypto-link mx-1"
                                                    href="#"
                                                    ><img
                                                        src="{{getTokens(strtolower($token->token_chain),'swap_logo')}}"
                                                        alt="Swap"
                                                /></a>
                                                @endif
                                            </div>

                                            <p
                                                style="
                                                    font-size: 12px;
                                                    font-weight: bold;
                                                    text-align: right;
                                                "
                                            >
                                                {{$token->people_clicked}}
                                                people clicked
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-8">
                            <div
                                class="bg-dark d-flex justify-content-between p-3 align-items-center text-white"
                            >
                                <h2>Newly Update Tokens</h2>
                                <h5 class="mr-3">Update your token socials</h5>
                            </div>
                            <div class="row mt-5">
                                @foreach ($updatedTokens as $token)
                                <div class="col-md-6">
                                    <a
                                        href="{{ route('view-manual-data', $token->contract_address) }}"
                                    >
                                        <div
                                            class="dark-card align-items-center"
                                        >
                                            <!-- Image and Date Badge -->
                                            <div class="pokemon">
                                                <img
                                                    src="{{ $token->image_path ? asset('storage/' . $token->image_path) : asset('assets/index/assets/images/pok.png') }}"
                                                    alt=""
                                                    class="img-fluid"
                                                    style="
                                                        max-width: 90px;
                                                        border-radius: 10px;
                                                        max-height: 90px;
                                                        height: 90px;
                                                        width: 90px;
                                                    "
                                                />
                                                <img
                                                    style="
                                                        position: absolute;
                                                        max-width: 20px;
                                                        bottom: -2px;
                                                        left: 40%;
                                                        box-shadow: 0 4px 8px 0
                                                                rgba(
                                                                    0,
                                                                    0,
                                                                    0,
                                                                    0.2
                                                                ),
                                                            0 6px 20px 0
                                                                rgba(
                                                                    0,
                                                                    0,
                                                                    0,
                                                                    0.19
                                                                );
                                                    "
                                                     src="{{getTokens(strtolower($token->token_chain),'logo')}}"
                                                    alt=""
                                                />
                                                <span
                                                    class="badge badge-warning date-badge"
                                                    >{{getTimeFormat('d M',$token->created_at)}}</span
                                                >
                                            </div>

                                            <!-- Token Information -->
                                            <div
                                                class="content mx-3"
                                                style="width: 80%"
                                            >
                                                <!-- Token Name and Symbol -->
                                                <h5
                                                    class="font-weight-bold mb-1 text-white"
                                                >
                                                    {{$token->token_name}}
                                                </h5>

                                                <!-- Blockchain Type (Solana, Ethereum, etc.) and Token Contract Address -->
                                                <!-- <p>Solana or Eth. | Token Contract Address</p> -->

                                                <!-- Token Description -->
                                                <p
                                                    class="text-muted"
                                                    style="font-size: 10px"
                                                >
                                                    {{getFirstLastWords($token->contract_address)}}
                                                </p>

                                                <!-- Social Icons -->
                                                <div class="icons d-flex">
                                                    <!-- Website, Telegram, and Twitter Icons -->
                                                    <a
                                                        class="social-link"
                                                        href="{{$token->twitter}}"
                                                        ><i
                                                            class="bx bxl-twitter"
                                                        ></i
                                                    ></a>
                                                    <a
                                                        class="social-link"
                                                        href="#"
                                                        ><i
                                                            class="bx bxl-telegram mr-1"
                                                        ></i
                                                        >{{$token->telegram}}</a
                                                    >
                                                    <a
                                                        class="social-link"
                                                        href="{{$token->website}}"
                                                        ><i
                                                            class="bx bx-globe mr-1"
                                                        ></i
                                                        >Website</a
                                                    >
                                                </div>

                                                <!-- Social Icons -->
                                                <div
                                                    class="icons d-flex align-items-end justify-content-between"
                                                >
                                                    <!-- Other Icons (Dexscreener, Dextools, Pancakeswap) -->
                                                    <div class="d-flex">
                                                        <a
                                                    title="{{getTokens(strtolower($token->token_chain),'dexscreener')}}{{ $token->contract_address }}"
                                                    class="crypto-link mx-1"
                                                    href="{{getTokens(strtolower($token->token_chain),'dexscreener')}}{{ $token->contract_address }}"
                                                    ><img
                                                        src="{{url('main/images/token_logos/Dexscreener.webp')}}"
                                                        alt="Dexscreener"
                                                /></a>
                                                <a
                                                    title="{{getTokens(strtolower($token->token_chain),'dextool')}}{{ $token->contract_address }}"
                                                    class="crypto-link mx-1"
                                                    href="{{getTokens(strtolower($token->token_chain),'dextool')}}{{ $token->contract_address }}"
                                                    ><img
                                                        src="{{url('main/images/token_logos/Dextools.svg')}}"
                                                        alt="Dextools"
                                                /></a>
                                                <a
                                                    class="crypto-link mx-1"
                                                    href="#"
                                                    ><img
                                                        src="{{getTokens(strtolower($token->token_chain),'swap_logo')}}"
                                                        alt="Swap"
                                                /></a>
                                                    </div>

                                                    <p
                                                        style="
                                                            font-size: 12px;
                                                            font-weight: bold;
                                                            text-align: right;
                                                        "
                                                    >
                                                        {{$token->people_clicked}}
                                                        people clicked
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="bg-dark p-3 text-white">
                                        New Token
                                    </h2>
                                    @foreach ($scrapedTokens as $token)
                                    <a
                                        href="{{ route('view-manual-data', $token->contract_address) }}"
                                    >
                                        <div
                                            class="dark-lists justify-content-between mt-3"
                                        >
                                            <div class="d-flex">
                                                <img
                                                    src="{{ $token->image_path ? asset('storage/' . $token->image_path) : asset('main/images/e.jpg') }}"
                                                    alt=""
                                                    class="img-fluid rounded-circle pok-img mr-2 mt-1"
                                                />
                                                <div>
                                                    <p
                                                        class="mb-0 mt-2 mx-2 font-weight-bold text-white"
                                                    >
                                                        {{$token->token_name}}
                                                    </p>
                                                    <span
                                                        class="text-muted"
                                                        >{{getFirstLastWords($token->contract_address)}}</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <a
                                                    class="crypto-link mx-1"
                                                    href="{{$token->dexscreener}}"
                                                    ><img
                                                        src="main/images/token_logos/Dexscreener.webp"
                                                        alt="Dexscreener"
                                                /></a>
                                                <a
                                                    class="crypto-link mx-1"
                                                    href="{{$token->dextools}}"
                                                    ><img
                                                        src="main/images/token_logos/Dextools.svg"
                                                        alt="Dextools"
                                                /></a>
                                                <a
                                                    class="crypto-link mx-1"
                                                    href="#"
                                                    ><img
                                                        src="main/images/token_logos/Pancakeswap.png"
                                                        alt="Pancakeswap"
                                                /></a>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
