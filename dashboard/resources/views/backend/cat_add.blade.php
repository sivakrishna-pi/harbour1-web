@extends('backend.layout')
@section('content')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                        @if($errors)
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>
                            @endforeach
                        @endif

                        @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                        <form action="{{url('category')}}" method="POST" enctype="multipart/form-data">
    		                @csrf
                            <div class="form-group">
                                <label for="title">Title <span class="require">*</span></label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="5" class="form-control" name="description" ></textarea>
                            </div>

                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                                <button class="btn btn-default">
                                    Cancel
                                </button>
                            </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
@endsection        <!-- /.container-fluid -->

          