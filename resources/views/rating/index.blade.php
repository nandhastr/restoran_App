@extends('manager/layouts.master')

@section('css')
{{--
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('javascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
            $("#data-table").DataTable();
        })

</script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    confirmDelete = function(button){
            var url = $(button).data('url');
            swal({
                'title': 'konfirmasi hapus',
                'text' : 'Yakin Untuk Menghapus Data Ini',
                'dangermode' : true,
                'buttons' : true
            }).then(function(value){
                if(value){
                    window.location = url;
                }
            })
        }
</script>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Rating</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rating</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content mt-4">
        <div class="container-fluid">
            <div class="container">
                {{-- this content --}}
                <div class="card">
                    <div class="card-header text-left">
                        <a class="btn btn-info mb-3" href="{{ route('manager.index') }}" role="button">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        {{-- <a class="btn btn-info mb-3" href="" role="button">
                            + RATING
                        </a> --}}

                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-bordered text-center" id="data-tabel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NAMA</th>
                                    <th>RATING</th>
                                    <th>REVIEW</th>
                                    <th>WAKTU REVIEW</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($value as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->star_rating }}</td>
                                    <td>{{ $value->comments }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->status }}</td>
                                    <td>
                                        {{-- <a href="" type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#modal-secondary{{ $value->id }}">View
                                    </a> --}}
                                    <button type="button" class="btn btn-success btn-sm view-modal"
                                    data-toggle="modal"
                                    data-target="#modal-secondary{{ $value->id }}"
                                    data-id="{{ $value->id }}">
                                    View
                                    </button>
            
                                        {{-- <a href="{{ route('rating.edit', ['rating' => $rating->user_name]) }}"
                                            class="btn btn-primary btn-sm">edit </a> --}}
                                        <a onclick="confirmDelete(this)"
                                            data-url="{{ route('deleteRating', ['rating' => $value->id]) }}"
                                            class="btn btn-danger btn-sm" role="button">Hapus</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- MODAL --}}
                    <div class="modal fade" id="modal-secondary{{ $value->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content bg-secondary">
                                <div class="modal-header">
                                    <h4 class="modal-title">Data Rating</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body ">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center text-dark">{{ $value->name }}
                                            </h3>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- About Me Box -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Review</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <small class="text-dark">Rating Star</small> <br>
                                            @for ($i = 1; $i <= $value->star_rating; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                                @endfor

                                                @for ($i = $value->star_rating + 1; $i <= 5; $i++) <i
                                                    class="fas fa-star text-secondary"></i>
                                                    @endfor <br>
                                                    <small class="text-dark">{{ $value->created_at }}</small>
                                                    <hr>
                                                    <hr>
                                                    <strong class="text-dark"><i
                                                            class="far fa-file-alt mr-1 text-dark"></i>
                                                        Notes :</strong>
                                                    <br>
                                                    <p class="text-dark">{{ $value->comments }}.
                                                    </p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection