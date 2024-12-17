@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
@endsection

@section('navbar')
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <form method="GET" action="{{ route('backend.prestasi.index') }}"
                class="navbar-nav align-items-center d-flex">
                <div class="nav-item d-flex align-items-center">
                    <button type="submit" class="btn p-0" aria-label="Search">
                        <i class="bx bx-search fs-4 lh-0 me-2"></i>
                    </button>
                    <input type="text" name="search" class="form-control border-0 shadow-none"
                        placeholder="Cari prestasi..." aria-label="Search..." value="{{ request()->get('search') }}" />
                </div>
            </form>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User Dropdown -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <span class="w-px-40 h-auto fw-semibold d-block">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off me-2"></i>
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h2>Prestasi</h2>
        </div>
        <div class="col">
            <a href="{{ route('backend.prestasi.create') }}" type="button" class="btn rounded-pill btn-success float-end">
                <i class='bx bxs-add-to-queue'></i> Tambahkan Prestasi
            </a>
        </div>
    </div>
    <hr class="my-3" />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($prestasi as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{!! Str::limit($data->keterangan, 100, '...') !!}</td>
                                <td>
                                    <a href="{{ route('backend.prestasi.edit', $data->slug) }}" type="button"
                                        class="btn btn-sm rounded-pill btn-primary" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                        title="<span>ubah</span>">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <a href="{{ route('backend.prestasi.destroy', $data->id) }}" type="button"
                                        class="btn btn-sm rounded-pill btn-danger" data-confirm-delete="true"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<span>hapus</span>">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#dataTable');
    </script>
@endpush
