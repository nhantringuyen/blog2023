@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">Category
                <small>Edit</small>
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
                    <form action="{{route('admin.category.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="parent">Category Parent</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="">Select Parent Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $category->parent == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtCateName">Category Name</label>
                            <input class="form-control" id="txtCateName" name="name" value="{{ $category->name }}" placeholder="Please Enter Category Name"/>
                        </div>
                        <div class="form-group">
                            <label for="txtOrder">Category Order</label>
                            <input type="number" name="txtOrder" id="txtOrder" class="form-control" min="0" value="{{ $category->order }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Category Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default" title="update">Update</button>
                        <button type="reset" class="btn btn-default" title="reset">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
