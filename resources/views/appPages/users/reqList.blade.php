@extends('layouts.layout')

@section('content')

<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
    <!--div-->
    <div class="card">
        <div class="card-header">
            <div class="card-title">Requisition List</div>
        </div>
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table table-borderless text-nowrap key-buttons">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">Sl. No</th>
                                <th class="border-bottom-0">Requisition id</th>
                                <th class="border-bottom-0">Requisition Type</th>
                                <th class="border-bottom-0">Requisition Title</th>
                                <th class="border-bottom-0">Requisition Requester</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->requisition_id }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->requester }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
@endsection