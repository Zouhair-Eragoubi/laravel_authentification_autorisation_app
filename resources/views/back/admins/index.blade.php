@extends('back.master')
@section('title', 'Admins')
@section('admins_active', 'active bg-light')
@includeIf("$directory.pushStyles")

@section('content')
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Admins</h2>

                <div class="page-title-right">
                    {{-- @if (permission(['add_admins'])) --}}
                    <a href="{{ route('back.admins.create') }}" data-title="Add Admin" id="add_btn"
                        class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mainModal">
                        Add Admin
                    </a>
                    {{-- @endif --}}
                </div>

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
                            <th class="text-primary">Role</th>
                            <th class="text-primary" width="11%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($data['data']) > 0)
                            @foreach ($data['data'] as $key => $item)
                                <tr>
                                    <td>{{ $data['data']->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if (count($item->getRoleNames()) > 0)
                                            <span class="badge bg-warning text-white p-2">
                                                {{ $item->getRoleNames()[0] ?? '' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                actions<i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a href="{{ route('back.admins.show', ['admin' => $item]) }}"
                                                    class="dropdown-item displayClass"
                                                    data-title="Show Admin" data-bs-toggle="modal"
                                                    data-bs-target="#mainModal">
                                                    <span class="bx bx-show-alt"></span>
                                                    show
                                                </a>

                                                {{-- @if (permission(['edit_admins'])) --}}
                                                <a href="{{ route('back.admins.edit', ['admin' => $item]) }}"
                                                    class="dropdown-item editClass"
                                                    data-title="edit_admin" data-bs-toggle="modal"
                                                    data-bs-target="#mainModal">
                                                    <span class="bx bx-edit-alt"></span>
                                                    edit
                                                </a>
                                                {{-- @endif --}}

                                                {{-- @if (permission(['delete_admins'])) --}}
                                                <a class="dropdown-item deleteClass"
                                                    href="{{ route('back.admins.destroy', ['admin' => $item]) }}"
                                                    data-title="Delete Admin" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">
                                                    <span class="bx bx-trash-alt"></span>
                                                    delete
                                                </a>
                                                {{-- @endif --}}

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
