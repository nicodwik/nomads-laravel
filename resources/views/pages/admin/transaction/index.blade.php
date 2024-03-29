@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
            </div>

            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered text-center" width="100%" collspacing="0">
                            <thead class="py-3">
                                <tr>
                                    <th class="py-3">ID</th>
                                    <th>Travel</th>
                                    <th>User</th>
                                    <th>Visa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->travel_package->title}}</th>
                                        <th>{{$item->user->name}}</th>
                                        <th>{{$item->additional_visa}}</th>
                                        <th>{{$item->transaction_total}}</th>
                                        <th>{{$item->transaction_status}}</th>
                                        <th>
                                        <a href="{{route('transaction.show', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('transaction.edit', $item->id)}}" class="btn btn-success">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('transaction.destroy', $item->id)}}" class="d-inline" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            


        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection