@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">Manage Comments</h4>
                    <p class="text-right">
{{--                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTitle">Add Blog</button>--}}
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_id">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Blog title</th>
                                    <th scope="col">User name</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($comments as $comment)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{$comment->title}}</td>
                                        <td>{{$comment->username}}</td>
                                        <td>{!! $comment->comment !!}</td>
{{--                                        <td><img src="{{asset($blog->photo)}}" width="100" height="100"></td>--}}
{{--                                        <td>@if($blog->status == 1) <button class="btn btn-success">Active</button> @else <button class="btn btn-warning">Inactive</button>  @endif</td>--}}
                                        <td>
                                            <div class="d-flex">
{{--                                                <a href="#editCategory-{{ $comment->id }}" data-toggle="modal" class="btn btn-primary">Edit</a>--}}
                                                <a href="#deleteCategory-{{ $comment->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal for delete course -->
                                    <div id="deleteCategory-{{ $comment->id }}" class="modal fade">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><i class="fa fa-trash text-danger" aria-hidden="true"></i></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('delete.comment') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>Are you want to delete this?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $comment->id }}">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div id="editCategory-{{ $comment->id }}" class="modal fade">--}}
{{--                                        <div class="modal-dialog" role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h5 class="modal-title">Edit Blog</h5>--}}
{{--                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <form action="{{ route('update.blog') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                                        @csrf--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="control-label">Blog Title<span class="text-danger">*</span></label>--}}
{{--                                                            <input type="text" name="title" class="form-control" value="{{$blog->title}}">--}}

{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="control-label">Blog Short Description<span class="text-danger">*</span></label>--}}
{{--                                                            <input type="text" name="short_description" class="form-control" value="{{$blog->short_description}}">--}}

{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="control-label">Blog Description<span class="text-danger">*</span></label>--}}
{{--                                                            <textarea  name="description"  class="form-control">{!! $blog->description !!}</textarea>--}}

{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="control-label"><img src="{{asset($blog->photo)}}" width="200" height="200"></label>--}}
{{--                                                            <input type="file" name="photo"  class="form-control" placeholder="name">--}}
{{--                                                            <input type="hidden" name="id" value="{{ $blog->id }}" class="form-control" placeholder="name">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="control-label">Status</label>--}}
{{--                                                            <select name="status" class="form-control">--}}
{{--                                                                @if($blog->status == 1)--}}
{{--                                                                    <option value="1" class="form-control">Active</option>--}}
{{--                                                                    <option value="0" class="form-control">Inactive</option>--}}
{{--                                                                @else--}}
{{--                                                                    <option value="0" class="form-control">Inactive</option>--}}
{{--                                                                    <option value="1" class="form-control">Active</option>--}}
{{--                                                                @endif--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <button type="submit" class="btn btn-primary">Update Save</button>--}}
{{--                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
