<form action="{{ route('back.admins.update', ['admin' => $admin]) }}" method="post" id="edit_form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div id="edit_form_messages"></div>

    {{-- MODIFICATIONS FROM HERE --}}
    <div class="row">
        <div class="form-group col-md-6 p-1">
            <label class="form-label">Name</label>
            <input type="text" class="border form-control" name="name"
                placeholder="Name" value="{{ $admin->name }}">
        </div>

        <div class="form-group col-md-6 p-1">
            <label class="form-label">{{ __('lang.email') }}</label>
            <input type="email" class="border form-control" name="email"
                placeholder="Email" value="{{ $admin->email }}">
        </div>

        <div class="form-group col-md-12 p-1">
            <label class="form-label">Role</label>
            <select class="border form-control" name="role">
                <option value="">Select Role</option>
                @foreach ($roles as $item)
                    <option value="{{ $item->name }}" {{$admin->hasRole($item->name) ? "selected" : null}} >{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-6 p-1">
            <label class="form-label">Password</label>
            <input type="password" class="border form-control" name="password"
                placeholder="Password">
        </div>

        <div class="form-group col-6 p-1">
            <label class="form-label">Confirmation Password</label>
            <input type="password" class="border form-control" name="password_confirmation"
                placeholder="Confirmation Password">
        </div>
    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <hr class="text-muted">

    <div class="form-group float-end">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_edit_form">Submit</button>
    </div>
</form>
