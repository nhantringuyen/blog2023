@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="parent">Category</label>
                            <select name="parent" id="parent" class="form-control">
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
                            <label>Intro</label>
                            <textarea class="form-control" rows="3" name="txtIntro"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txtContent">Content</label>
                            <textarea class="form-control" rows="3" name="txtContent" id="txtContent"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="fImages">
                        </div>
                        <div class="form-group">
                            <label>Product Keywords</label>
                            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" />
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Status</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1" checked="" type="radio">Visible
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="2" type="radio">Invisible
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Product Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
