<form action="{{ route('back.users.update', ['user' => $user]) }}" method="post" id="edit_form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div id="edit_form_messages"></div>

    {{-- MODIFICATIONS FROM HERE --}}
    <div class="row">
        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Name</label>
            <input type="text" class="border form-control" name="name"
                placeholder="Name..." value="{{ $user->name }}">
        </div>

        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Email</label>
            <input type="email" class="border form-control" name="email"
                placeholder="Email..." value="{{ $user->email }}">
        </div>

        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Password</label>
            <input type="password" class="border form-control" name="password"
                placeholder="Password...">
        </div>

        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Password confirmation</label>
            <input type="password" class="border form-control" name="password_confirmation"
                placeholder="Password confirmation...">
        </div>
    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <div class="form-group float-end mt-2">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_edit_form">
            Submit
        </button>
    </div>
</form>
