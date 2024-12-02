@extends('back.master')
@section('title', __('lang.roles'))
@section('roles_active', 'active bg-light')
@includeIf("$directory.pushStyles")

@section('content')
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" href="" class="btn btn-primary" id="submit_delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Roles</h2>

                <div class="page-title-right">
                    {{-- @if (permission(['add_roles'])) --}}
                    <a href="{{ route('back.roles.create') }}" class="btn btn-primary">
                        Add Role
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
                            <th class="text-primary" width="11%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($data['data']) > 0)
                            @foreach ($data['data'] as $key => $item)
                                <tr>
                                    <td>{{ $data['data']->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a href="{{ route('back.roles.show', ['role' => $item]) }}"
                                                    class="dropdown-item">
                                                    <span class="bx bx-show-alt"></span>
                                                    Show
                                                </a>

                                                {{-- @if (permission(['edit_roles'])) --}}
                                                <a href="{{ route('back.roles.edit', ['role' => $item]) }}"
                                                    class="dropdown-item">
                                                    <span class="bx bx-edit-alt"></span>
                                                    Edit
                                                </a>
                                                {{-- @endif --}}

                                                {{-- @if (permission(['delete_roles'])) --}}
                                                <a class="dropdown-item deleteClass"
                                                    href="{{ route('back.roles.destroy', ['role' => $item]) }}"
                                                    data-title="{{ __('lang.delete_role') }}" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">
                                                    <span class="bx bx-trash-alt"></span>
                                                    Delete
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
