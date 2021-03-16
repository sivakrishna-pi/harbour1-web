@extends('backend.layout')
@section('content')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  
					<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $cat)
                                        <tr>
                                            <td>{{$cat->id}}</td>
                                            <td>{{$cat->title}}</td>
                                            <td>
                                                <a href="{{url('category/'.$cat->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>
                                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('category/'.$cat->id.'/delete')}}" class="btn btn-info btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-- /.container-fluid -->
@endsection
           