@extends('back.master')
@section('title', "Users")
@section('users_active', 'active bg-light')
@includeIf("$directory.pushStyles")

@section('content')
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Users</h2>

                @if (permission('add_user'))
                    <div class="page-title-right">
                        <a href="{{ route('back.users.create') }}" data-title="Add User" id="add_btn"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mainModal">
                            Add User
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="card mt-3" id="mainCont">
        <div class="card-body">

            {{-- Table --}}
            <div class="table">
                <table class="table align-middle table-nowrap font-size-14">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-primary" width="5%">#</th>
                            <th class="text-primary">Name</th>
                            <th class="text-primary">Email</th>
                            <th class="text-primary" width="11%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($data['data']) > 0)
                            @foreach ($data['data'] as $key => $item)
                                <tr>
                                    <td>{{ $data['data']->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email ?? '' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                @if (permission(['show_user']))
                                                    <a href="{{ route('back.users.show', ['user' => $item]) }}"
                                                        class="dropdown-item displayClass"
                                                        data-title="Show User" data-bs-toggle="modal"
                                                        data-bs-target="#mainModal">
                                                        <span class="bx bx-show-alt"></span>
                                                        Show User
                                                    </a>
                                                @endif

                                                @if (permission(['edit_user']))
                                                    <a href="{{ route('back.users.edit', ['user' => $item]) }}"
                                                        class="dropdown-item editClass"
                                                        data-title="Edit User" data-bs-toggle="modal"
                                                        data-bs-target="#mainModal">
                                                        <span class="bx bx-edit-alt"></span>
                                                        Edit User
                                                    </a>
                                                @endif

                                                @if (permission(['delete_user']))
                                                    <a class="dropdown-item deleteClass"
                                                        href="{{ route('back.users.destroy', ['user' => $item]) }}"
                                                        data-title="Delete User" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal">
                                                        <span class="bx bx-trash-alt"></span>
                                                        Delete User
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert></x-empty-alert>
                        @endif
                    </tbody>
                </table>
            </div>

            {{ $data['data']->appends(request()->query())->render('pagination::bootstrap-4') }}

        </div>
    </div>
@endsection

@includeIf("$directory.scripts")
@includeIf("$directory.pushScripts")
