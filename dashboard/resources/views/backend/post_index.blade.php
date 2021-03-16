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
                                            <th>Page Category</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Page Category</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->cat_name}}</td>
                                            <td>{{($post->status == 1)? 'Active': 'In Active'}}</td>
                                            <td>
                                                <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>
                                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('post/'.$post->id.'/delete')}}" class="btn btn-info btn-sm">Delete</a>
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