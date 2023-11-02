@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>New post</th>
                        <th>HighLight post</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="odd gradeX" align="center">
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td></td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->new_post == 1 ? 'x': ''}}</td>
                            <td>{{$post->highlight_post == 1 ? 'x': ''}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.post.delete',$post->id)}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.post.update',$post->id)}}">Edit</a></td>
                        </tr>
                    @endforeach

                    <tr class="even gradeC" align="center">
                        <td>2</td>
                        <td>Áo Thun Polo</td>
                        <td>250.000 VNĐ</td>
                        <td>1 Hours Age</td>
                        <td>Ẩn</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                    </tr>
                    </tbody>
                </table>
                {!! $posts->links() !!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
