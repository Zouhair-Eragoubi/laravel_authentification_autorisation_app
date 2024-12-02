<form action="{{ route('back.users.store') }}" method="post" id="add_form" enctype="multipart/form-data">
    @csrf

    <div id="add_form_messages"></div>

    {{-- MODIFICATIONS FROM HERE --}}
    <div class="row">
        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Name</label>
            <input type="text" class="border form-control" name="name"
                placeholder="Name...">
        </div>

        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Email</label>
            <input type="email" class="border form-control" name="email"
                placeholder="Email...">
        </div>

        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Password</label>
            <input type="password" class="border form-control" name="password"
                placeholder="Password...">
        </div>

        <div class="form-group col-12 col-md-6 mt-1">
            <label class="form-label">Password Confirmation</label>
            <input type="password" class="border form-control" name="password_confirmation"
                placeholder="Password Confirmation...">
        </div>
    </div>
    {{-- MODIFICATIONS TO HERE --}}

    <div class="form-group float-end mt-2">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit_add_form">
            Submit
        </button>
    </div>
</form>
