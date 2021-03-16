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
                        <form action="{{url('category/'.$data->id)}}" method="POST" enctype="multipart/form-data">
    		                @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title <span class="require">*</span></label>
                                <input type="text" value="{{$data->title}}" class="form-control" name="title" />
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="5" class="form-control" name="description">{{$data->detail}}</textarea>
                            </div>

                            <!-- <img src="{{asset('imgs')}}/{{$data->image}}" width="100" alt="" srcset="">
                            <input type="hidden" name="cat_image" value="{{$data->image}}">
                            <div class="form-group">
                                <label class="form-label" for="customFile">Input</label>
                                <input type="file" name="cat_image" class="form-control" id="customFile" />
                            </div> -->
                            
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
                <!-- /.container-fluid -->
@endsection
            