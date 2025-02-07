<!-- resources/views/editData.blade.php -->
@extends('layouts.app') @section('content')
<div class="container mt-5">
    <h1>Edit Tokens</h1>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Message</th>
                <th>Processed At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allData as $data)
            <tr>
                <td>{{ $data->from_first_name }}</td>
                <td>{{ $data->text }}</td>
                <td>{{ $data->processed_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button
                            type="button"
                            class="btn btn-sm btn-primary"
                            data-toggle="modal"
                            data-target="#editModal{{ $data->id }}"
                        >
                            Edit
                        </button>
                        <form
                            action="{{ route('delete-data', $data->id) }}"
                            method="post"
                            onsubmit="return confirmDelete('{{ $data->id }}');"
                        >
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                        <form
                            action="{{ route('promote-data', $data->id) }}"
                            method="post"
                        >
                            @csrf @method('PUT')
                            <button
                                type="submit"
                                class="btn btn-sm {{ $data->promoted_token ? 'btn-success' : 'btn-secondary' }}"
                                onclick="return confirmPromote('{{ $data->id }}', {{ $data->promoted_token }})"
                            >
                                {{ $data->promoted_token ? 'Unpromote' : 'Promote' }}
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- Edit Modal -->
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
                            <h5
                                class="modal-title"
                                id="editModalLabel{{ $data->id }}"
                            >
                                Edit Message
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
                            <form
                                action="{{ route('update-data', $data->id) }}"
                                method="post"
                            >
                                @csrf @method('PUT')
                                <div class="form-group">
                                    <label for="editedText{{ $data->id }}"
                                        >Edited Text</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="editedText{{ $data->id }}"
                                        name="edited_text"
                                        value="{{ $data->text }}"
                                    />
                                    <!-- Add a hidden input field for token_edited -->
                                    <input
                                        type="hidden"
                                        name="token_edited"
                                        value="{{ $data->token_edited }}"
                                    />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript for confirmation popups and modal -->
<script>
    function confirmPromote(dataId, isPromoted) {
        if (isPromoted) {
            return confirm("Are you sure you want to unpromote this token?");
        } else {
            return confirm("Are you sure you want to promote this token?");
        }
    }

    function confirmDelete(dataId) {
        if (confirm("Are you sure you want to delete this token?")) {
            alert("Success: Token deleted!");
            return true;
        } else {
            alert("Deletion canceled.");
            return false;
        }
    }
</script>

@endsection
