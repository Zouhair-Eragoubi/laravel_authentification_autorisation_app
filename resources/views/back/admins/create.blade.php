<form action="{{ route('back.admins.store') }}" method="post" id="add_form" enctype="multipart/form-data">
    @csrf

    <div id="add_form_messages"></div>

    {{-- MODIFICATIONS FROM HERE --}}
    <div class="row">
        <div class="form-group col-md-6 p-1">
            <label class="form-label">Name</label>
            <input type="text" class="border form-control" name="name"
                placeholder="Please enter Name...">
        </div>

        <div class="form-group col-md-6 p-1">
            <label class="form-label">Email</label>
            <input type="email" class="border form-control" name="email"
                placeholder="Please enter Email...">
        </div>

        <div class="form-group col-md-12 p-1">
            <label class="form-label">Role</label>
            <select class="border form-control" name="role">
                <option value="">Select role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-6 p-1">
            <label class="form-label">Password</label>
            <input type="password" class="border form-control" name="password"
                placeholder="Please enter Password...">
        </div>

        <div class="form-group col-6 p-1">
            <label class="form-label">Password confirmation</label>
            <input type="password" class="border form-control" name="password_confirmation"
                placeholder="Please enter password_confirmation...">
        </div>
    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <hr class="text-muted">

    <div class="form-group float-end">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_add_form">Submit</button>
    </div>
</form>
