@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">Post
                <small>Add</small>
            </h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="row">
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" id="title" placeholder="Please Enter Title" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input class="form-control" name="description" id="description" placeholder="Please Enter Description" />
                        </div>
                        <div class="form-group">
                            <label>New post</label>
                            <input type="checkbox"  name="new_post">
                        </div>
                        <div class="form-group">
                            <label>Highlight post</label>
                            <input type="checkbox"  name="highlight_post">
                        </div>
                        <div class="form-group">
                            <label for="txtContent">Content</label>
                            <textarea class="form-control ckeditor" rows="3" name="txtContent" id="txtContent"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                         <button type="submit" class="btn btn-default">Add</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
