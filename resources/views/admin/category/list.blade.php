@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">Category
                <small>List</small>
            </h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category Parent</th>
                    <th>Description</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="odd gradeX" align="center">
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->parent}}</td>
                        <td>{{$category->description}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.category.delete',$category->id)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.category.edit',$category->id)}}">Edit</a></td>
                    </tr>
                @endforeach

{{--                    <tr class="even gradeC" align="center">--}}
{{--                        <td>2</td>--}}
{{--                        <td>Bóng Đá</td>--}}
{{--                        <td>Thể Thao</td>--}}
{{--                        <td>Ẩn</td>--}}
{{--                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>--}}
{{--                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>--}}
{{--                    </tr>--}}
                </tbody>
            </table>
{{--            {{ $categories->links() }}--}}
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
