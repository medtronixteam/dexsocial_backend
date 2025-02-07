@section('content')
<link rel="stylesheet" href="assets/index/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/index/assets/css/style.css" />
<!-- Include Boxicons stylesheet (adjust the path accordingly) -->
<link rel="stylesheet" href="path/to/boxicons/css/boxicons.min.css" />

<!-- Assuming you have a layout -->
<header class="header bg-dark">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="#">
            <h1>DEXSOCIALS</h1>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 mx-auto">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input
                        type="search"
                        class="form-control mr-sm-2"
                        placeholder="Search"
                        aria-label="Search"
                    />
                </div>
            </form>
            <button class="btn btn-update">Update social</button>
        </div>
    </nav>
</header>
<div class="container-fluid mt-5">
    <!-- <div
        class="bg-dark d-flex justify-content-between p-3 align-items-center text-white"
    >
        <h2>Promoted Tokens</h2>
    </div> -->
    <div class="row mb-4">
        <!-- indextoken.blade.php -->

        @foreach ($messages->where('promoted', 1) as $message)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="dark-card align-items-center">
                <!-- Image and Date Badge -->
                <div class="pokemon">
                    <!-- Logo as a clickable link -->
                    <a href="{{ $message->image }}" target="_blank">
                        <img
                            src="{{ $message->image_path ? asset('storage/' . $message->image_path) : asset('assets/index/assets/images/pok.png') }}"
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
                    </a>

                    <span
                        class="badge date-badge"
                        style="
                            display: flex;
                            justify-content: center;
                            position: absolute;
                            margin-left: 15px;
                            background-color: purple;
                            color: white;
                            top: 48px;
                            padding: 5px 10px;
                        "
                        >{{ $message->created_at->format('M d') }}</span
                    >
                </div>

                <!-- Token Information -->
                <div class="content">
                    <!-- Token Name and Symbol -->
                    <h5 class="font-weight-bold mb-1">
                        {{ $message->token_name }}
                    </h5>

                    <!-- Blockchain Type (Solana, Ethereum, etc.) and Token Contract Address -->
                    <!-- <p>Solana or Eth. | Token Contract Address</p> -->

                    <!-- Token Description -->
                    <p class="text-muted" style="font-size: 10px">
                        {{ $message->description }}
                    </p>

                    <!-- Social Icons -->
                    <div class="icons d-flex">
                        <!-- Website, Telegram, and Twitter Icons -->
                        <a
                            class="social-link"
                            href="{{ $message->twitter_link }}"
                            target="_blank"
                            ><i class="bx bxl-twitter mr-1"></i>43</a
                        >
                        <a
                            class="social-link"
                            href="{{ $message->telegram_link }}"
                            target="_blank"
                            ><i class="bx bxl-telegram mr-1"></i>Telegram</a
                        >
                        <a
                            class="social-link"
                            href="{{ $message->website_link }}"
                            target="_blank"
                            ><i class="bx bx-globe mr-1"></i>Website</a
                        >
                    </div>

                    <!-- Social Icons -->
                    <div
                        class="icons d-flex align-items-end justify-content-between"
                    >
                        <!-- Other Icons (Dexscreener, Dextools, Pancakeswap) -->
                        <div class="d-flex">
                            <a
                                class="crypto-link"
                                href="{{ $message->telegram_link }}"
                                target="_blank"
                            >
                                <img
                                    src="{{
                                        asset(
                                            'assets/index/assets/images/e.jpg'
                                        )
                                    }}"
                                    alt=""
                                />
                            </a>
                            <a
                                class="crypto-link"
                                href="{{ $message->dexscreener}}"
                                target="_blank"
                                ><img
                                    src="{{
                                        asset(
                                            'assets/index/assets/images/token_logos/Dexscreener.webp'
                                        )
                                    }}"
                                    alt="Dexscreener"
                            /></a>
                            <a
                                class="crypto-link"
                                href="{{ $message->dextools}}"
                                target="_blank"
                                ><img
                                    src="{{
                                        asset(
                                            'assets/index/assets/images/token_logos/Dextools.svg'
                                        )
                                    }}"
                                    alt="Dextools"
                            /></a>
                            <a
                                class="crypto-link"
                                href="{{ $message->pancakeswap}}"
                                target="_blank"
                                ><img
                                    src="{{
                                        asset(
                                            'assets/index/assets/images/token_logos/Pancakeswap.png'
                                        )
                                    }}"
                                    alt="Pancakeswap"
                            /></a>
                        </div>

                        <p
                            style="
                                font-size: 12px;
                                font-weight: bold;
                                text-align: right;
                                margin: 0 0 5px 0;
                            "
                        >
                            21 people clicked
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="mt-3 ml-4">
            <div
                class="bg-dark d-flex justify-content-between p-3 align-items-center text-white"
            >
                <h2>Newly Update Tokens</h2>
                <h5 class="mr-3">Update your token socials</h5>
            </div>
            <div class="row mt-2 mb-4">
                <!-- indextoken.blade.php -->

                @foreach ($messages->where('manually_added',
                1)->sortByDesc('created_at') as $message)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="dark-card align-items-center">
                        <!-- Image and Date Badge -->
                        <div class="pokemon">
                            <!-- Logo as a clickable link -->
                            <a href="{{ $message->image }}" target="_blank">
                                <img
                                    src="{{ $message->image_path ? asset('storage/' . $message->image_path) : asset('assets/index/assets/images/pok.png') }}"
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
                            </a>

                            <span
                                class="badge date-badge"
                                style="
                                    display: flex;
                                    justify-content: center;
                                    position: absolute;
                                    margin-left: 15px;
                                    background-color: purple;
                                    color: white;
                                    top: 48px;
                                    padding: 5px 10px;
                                "
                                >{{ $message->created_at->format('M d') }}</span
                            >
                        </div>

                        <!-- Token Information -->
                        <div class="content">
                            <!-- Token Name and Symbol -->
                            <h5 class="font-weight-bold mb-1">
                                {{ $message->token_name }}
                            </h5>

                            <!-- Blockchain Type (Solana, Ethereum, etc.) and Token Contract Address -->
                            <!-- <p>Solana or Eth. | Token Contract Address</p> -->

                            <!-- Token Description -->
                            <p class="text-muted" style="font-size: 10px">
                                {{ $message->description }}
                            </p>

                            <!-- Social Icons -->
                            <div class="icons d-flex">
                                <!-- Website, Telegram, and Twitter Icons -->
                                <a
                                    class="social-link"
                                    href="{{ $message->twitter_link }}"
                                    target="_blank"
                                    ><i class="bx bxl-twitter mr-1"></i>43</a
                                >
                                <a
                                    class="social-link"
                                    href="{{ $message->telegram_link }}"
                                    target="_blank"
                                    ><i class="bx bxl-telegram mr-1"></i
                                    >Telegram</a
                                >
                                <a
                                    class="social-link"
                                    href="{{ $message->website_link }}"
                                    target="_blank"
                                    ><i class="bx bx-globe mr-1"></i>Website</a
                                >
                            </div>

                            <!-- Social Icons -->
                            <div
                                class="icons d-flex align-items-end justify-content-between"
                            >
                                <!-- Other Icons (Dexscreener, Dextools, Pancakeswap) -->
                                <div class="d-flex">
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->telegram_link }}"
                                        target="_blank"
                                    >
                                        <img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/e.jpg'
                                                )
                                            }}"
                                            alt=""
                                        />
                                    </a>
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->dexscreener}}"
                                        target="_blank"
                                        ><img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/token_logos/Dexscreener.webp'
                                                )
                                            }}"
                                            alt="Dexscreener"
                                    /></a>
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->dextools}}"
                                        target="_blank"
                                        ><img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/token_logos/Dextools.svg'
                                                )
                                            }}"
                                            alt="Dextools"
                                    /></a>
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->pancakeswap}}"
                                        target="_blank"
                                        ><img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/token_logos/Pancakeswap.png'
                                                )
                                            }}"
                                            alt="Pancakeswap"
                                    /></a>
                                </div>

                                <p
                                    style="
                                        font-size: 12px;
                                        font-weight: bold;
                                        text-align: right;
                                        margin: 0 0 5px 0;
                                    "
                                >
                                    21 people clicked
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mt-3 mr-4">
            <h2 class="bg-dark p-3 text-white">New Token</h2>
            <div class="row mb-4">
                <!-- indextoken.blade.php -->

                @foreach ($messages->where('manually_added',
                0)->sortByDesc('created_at') as $message)
                <div class="col-lg-12">
                    <div
                        class="dark-card align-items-center"
                        style="padding: 15px 30px 15px 20px"
                    >
                        <!-- Image and Date Badge -->
                        <div class="pokemon">
                            <!-- Logo as a clickable link -->
                            <a href="{{ $message->image }}" target="_blank">
                                <img
                                    src="{{ $message->image_path ? asset('storage/' . $message->image_path) : asset('assets/index/assets/images/pok.png') }}"
                                    alt=""
                                    class="img-fluid rounded-circle"
                                    style="
                                        max-width: 75px;
                                        border-radius: 10px;
                                        max-height: 75px;
                                        height: 75px;
                                        width: 75px;
                                    "
                                />
                            </a>

                            <!-- <span
                                class="badge date-badge"
                                style="
                                    display: flex;
                                    justify-content: center;
                                    position: absolute;
                                    margin-left: 15px;
                                    background-color: purple;
                                    color: white;
                                    top: 48px;
                                    padding: 5px 10px;
                                "
                                >{{ $message->created_at->format('M d') }}</span
                            > -->
                        </div>

                        <!-- Token Information -->
                        <div class="content">
                            <!-- Token Name and Symbol -->
                            <h5 class="font-weight-bold mb-1">
                                {{ $message->token_name }}
                            </h5>

                            <!-- Token Description -->
                            <p class="text-muted" style="font-size: 10px">
                                {{ $message->description }}
                            </p>

                            <!-- Social Icons -->
                            <div class="icons d-flex">
                                <a
                                    class="social-link"
                                    href="{{ $message->twitter_link }}"
                                    target="_blank"
                                    ><i class="bx bxl-twitter mr-1"></i>43</a
                                >
                                <a
                                    class="social-link"
                                    href="{{ $message->telegram_link }}"
                                    target="_blank"
                                    ><i class="bx bxl-telegram mr-1"></i
                                    >Telegram</a
                                >
                                <a
                                    class="social-link"
                                    href="{{ $message->website_link }}"
                                    target="_blank"
                                    ><i class="bx bx-globe mr-1"></i>Website</a
                                >
                            </div>

                            <!-- Social Icons -->
                            <div
                                class="icons d-flex align-items-end justify-content-between"
                            >
                                <!-- Other Icons (Dexscreener, Dextools, Pancakeswap) -->
                                <div class="d-flex">
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->telegram_link }}"
                                        target="_blank"
                                    >
                                        <img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/e.jpg'
                                                )
                                            }}"
                                            alt=""
                                        />
                                    </a>
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->dexscreener}}"
                                        target="_blank"
                                        ><img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/token_logos/Dexscreener.webp'
                                                )
                                            }}"
                                            alt="Dexscreener"
                                    /></a>
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->dextools}}"
                                        target="_blank"
                                        ><img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/token_logos/Dextools.svg'
                                                )
                                            }}"
                                            alt="Dextools"
                                    /></a>
                                    <a
                                        class="crypto-link"
                                        href="{{ $message->pancakeswap}}"
                                        target="_blank"
                                        ><img
                                            src="{{
                                                asset(
                                                    'assets/index/assets/images/token_logos/Pancakeswap.png'
                                                )
                                            }}"
                                            alt="Pancakeswap"
                                    /></a>
                                </div>

                                <p
                                    style="
                                        font-size: 12px;
                                        font-weight: bold;
                                        text-align: right;
                                        margin: 0 0 5px 0;
                                    "
                                >
                                    21 people clicked
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
