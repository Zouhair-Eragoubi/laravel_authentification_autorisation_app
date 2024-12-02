@extends('back.master')
@section('title', "Add Role")
@section('roles_active', 'active bg-light')
@includeIf("$directory.pushStyles")

@section('content')
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Add Role</h2>

                <div class="page-title-right">
                    {{-- @if (permission(['add_roles'])) --}}
                    <a href="{{ route('back.roles.index') }}" class="btn btn-primary">
                        Roles
                    </a>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3" id="mainCont">
        <div class="card-body">
            <form action="{{ route('back.roles.store') }}" method="post" id="add_form" enctype="multipart/form-data">
                @csrf

                <div id="add_form_messages"></div>

                {{-- MODIFICATIONS FROM HERE --}}
                <div class="row">
                    <div class="form-group col-md-10 p-1">
                        <label class="form-label">Name</label>
                        <input type="text" class="border form-control" name="name"
                            placeholder="Name...">
                    </div>
                    <div class="form-group col-md-2 mt-4">
                        <label class="form-check-label text-primary mt-2">
                            <input class="form-check-input" type="checkbox" id="selectAll">
                            Select all
                        </label>
                    </div>
                    <div class="form-group col-12 mt-2">
                        <div class="row">
                            @if (count($groups) > 0)
                                @foreach ($groups as $permission)
                                    <div class="col-md-6">
                                        <div class="form-check form-check-primary mt-1">
                                            <input class="form-check-input" type="checkbox"
                                                name="permissionArray[{{ $permission->name }}]"
                                                id="formCheckcolor{{ $permission->id }}">
                                            <label class="form-check-label"
                                                for="formCheckcolor{{ $permission->id }}">{{ $permission->description }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                {{-- MODIFICATIONS TO HERE --}}

                <div class="form-group float-end mt-3">
                    <button type="button" class="btn btn-primary" id="submit_add_form">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@includeIf("$directory.scripts")
@includeIf("$directory.pushScripts")
