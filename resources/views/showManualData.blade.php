<!-- resources/views/showManualData.blade.php -->


@extends('layouts.app')



@section('title')
Updated Tokens List
@endsection
@section('content')

<div class="card">
  <div class="card-header h4">
    Updated Tokens List
  </div>

    <!-- Display success message if available -->

    <!-- Display manual data here -->
    <div class="card-body">
        <table class="table table-bordered dataTable1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Token Name</th>
                    <th>Image</th>
                    <th>Token Symbol</th>
                    <th>Token Chain</th>
                    <th>Actions</th>
                    <!-- <th>Manually Added</th> -->
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($manualData as $key=> $data)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $data->token_name }}</td>
                    <td>
                        @if($data->image_path)
                        <img
                            src="{{ asset('storage/' . $data->image_path) }}"
                            alt="{{ $data->token_name }}"
                            width="50"
                        />
                        @else No Image @endif
                    </td>
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
                    <!-- <td>{{ $data->manually_added }}</td> -->
                    <!-- Add other columns as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
@foreach($manualData as $data)
<div
    class="modal fade"
    id="editModal{{ $data->id }}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editModalLabel{{ $data->id }}"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $data->id }}">
                    Edit Manual Data
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing data (similar to your edit-manual-data.blade.php) -->
                <form
                    action="{{ route('update-manual-data', ['id' => $data->id]) }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')

                    <!-- Input fields for editing... -->
                    <div class="mb-3">
                        <label for="token_name">Token Name:</label>
                        <input
                            type="text"
                            id="token_name"
                            class="form-control"
                            name="token_name"
                            value="{{ $data->token_name }}"
                            required
                        />
                    </div>
                    <!-- Image upload field -->
                    <div class="mb-3">
                        <label for="image">Upload Image:</label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
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
                    <div class="mb-3">
                        <label for="token_symbol">Token Symbol:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="token_symbol"
                            name="token_symbol"
                            value="{{ $data->token_symbol }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="token_chain">Token Chain:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="token_chain"
                            name="token_chain"
                            value="{{ $data->token_chain }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="contract_address"
                            >Token Contract Address:</label
                        >
                        <input
                            type="text"
                            id="contract_address"
                            class="form-control"
                            name="contract_address"
                            value="{{ $data->contract_address }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="description">Description:</label>
                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            >{{ $data->description }}</textarea
                        >
                    </div>
                    <div class="mb-3">
                        <label for="telegram">Telegram (number):</label>
                        <input
                            type="tel"
                            id="telegram"
                            class="form-control"
                            name="telegram"
                            value="{{ $data->telegram }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="twitter">Twitter (url):</label>
                        <input
                            type="url"
                            id="twitter"
                            name="twitter"
                            class="form-control"
                            value="{{ $data->twitter }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="website">Website (url):</label>
                        <input
                            type="url"
                            id="website"
                            name="website"
                            class="form-control"
                            value="{{ $data->website }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="dexscreener">Dexscreener (url):</label>
                        <input
                            type="url"
                            id="dexscreener"
                            name="dexscreener"
                            class="form-control"
                            value="{{ $data->dexscreener }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="dextools">Dextools (url):</label>
                        <input
                            type="url"
                            id="dextools"
                            name="dextools"
                            class="form-control"
                            value="{{ $data->dextools }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="pancakeswap">Pancakeswap Name:</label>
                        <input
                            type="text"
                            id="pancakeswap"
                            name="pancakeswap"
                            class="form-control"
                            value="{{ $data->pancakeswap }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="promoted">Promoted:</label>
                        <select
                            id="promoted"
                            name="promoted"
                            class="form-control"
                        >
                            <option value="0" {{ $data->
                                promoted == 0 ? 'selected' : '' }}>No
                            </option>
                            <option value="1" {{ $data->
                                promoted == 1 ? 'selected' : '' }}>Yes
                            </option>
                        </select>
                    </div>
                    <!-- Button to submit the form -->
                    <button type="submit" class="btn btn-primary mt-3">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach @endsection
