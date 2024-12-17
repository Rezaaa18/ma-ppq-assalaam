@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Visi dan Misi</h2>
            </div>
            <div class="col">
                <a href="{{ route('backend.visi.create') }}" type="button" class="btn rounded-pill btn-success float-end">
                    <i class='bx bxs-add-to-queue'></i> Tambahkan Visi
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($visi as $data)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{!! Str::limit($data->isi, 40, '...') !!}</td>
                                    <td>
                                        <a href="{{ route('backend.visi.edit', $data->slug) }}" type="button"
                                            class="btn btn-sm rounded-pill btn-primary" data-bs-toggle="tooltip"
                                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                            title="<span>ubah</span>">
                                            <i class='bx bxs-edit'></i>
                                        </a>
                                        <form action="{{ route('backend.visi.destroy', $data->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm rounded-pill btn-danger"
                                                data-confirm-delete="true" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                data-bs-placement="top" data-bs-html="true" title="<span>hapus</span>">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
