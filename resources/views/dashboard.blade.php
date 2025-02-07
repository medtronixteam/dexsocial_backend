@extends('layouts.app') @section('title','Dashboard') @section('content')

<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Welcome to Your Home Page</h4>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>All Tokens</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <span class="badge badge-success px-3">
                                <p class="mb-0 h5">{{ $totalTokens }}</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Updated Tokens</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <span class="badge badge-primary px-3">
                                <p class="mb-0 h5">
                                    {{ $manuallyAddedTokens }}
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4>Scraped Tokens</h4>
                    </div>
                    <div class="card-body">
                        <span class="badge badge-dark px-3">
                            <p class="mb-0 h5">{{ $scrapedTokens }}</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4>Promoted Tokens</h4>
                    </div>
                    <div class="card-body">
                        <span class="badge badge-warning px-3">
                            <p class="mb-0 h5">{{ $promotedTokens }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
