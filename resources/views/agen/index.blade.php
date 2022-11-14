@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Daftar Agen</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/agen/create') }}" class="btn btn-success btn-sm float-left" title="Add New Agen">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cari" id="cari" placeholder="Search for..."
                                value={{ $cari }}>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>@sortablelink('name', 'Name')</th>
                                        <th>@sortablelink('email', 'Email')</th>
                                        <th>Tanggal Dibuat</th>
                                        {{-- <th>Tanggal Diupdate</th> --}}
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($agen as $key => $item)
                                    <tr>
                                        <td>{{ $agen->firstItem() + $key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        {{-- <td>{{ $item->updated_at }}</td> --}}
                                        {{-- <td>{{ $item->role }}</td> --}}
                                        @if($item->role =='1') 
                                            <td>Admin</td>
                                        @else
                                            <td>Member</td>
                                        
                                        @endif
                                        <td>
                                            <a href="{{ url('/agen/' . $item->id) }}" title="View Agen"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            {{-- <a href="{{ url('/agen/' . $item->id . '/edit') }}" title="Edit Agen"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                                            <form method="POST" action="{{ url('/agen' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Agen" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-8">
                                    Showing {{ $agen->firstItem() }} to {{ $agen->lastItem() }} of {{ $agen->total() }}
                                </div>
                                <div class="col-md-4">
                                    {{-- {{ $siswa->links() }} --}}
                                    {{ $agen->links()}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection