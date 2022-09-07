@extends('layout.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header " >
                    <form id="form-filter">
                        <div class="form-group d-flex justify-content-between">
                            <div class="input-group mb-3 w-25 mr-3">
                                <label for="select-post">Bài đăng </label>
                                <select class="custom-select select-filter-role" id="select-post" name="select-post" >
                                    <option selected>All...</option>
                                    @foreach($data as $each )
                                        <option value="{{ $each->title }}"
                                                @if ((string)$each->title === $selectedPost) selected @endif>
                                            {{$each->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="float-right">
                                <a href="{{route('manager.posts.create')}}" id="btn-create-course" class="btn btn-success float-right">
                                    Tạo bài viết mới
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th style="width:40%">Nội dung</th>
                            <th style="width:10%">Sửa</th>
                            <th style="width:10%">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $each)
                            <tr>
                                <td>
                                    <a href="">
                                        {{ $each->id }}
                                    </a>
                                </td>
                                <td>
                                    <img alt="post" width="100px" src="{{ $each->image }}">
                                </td>
                                <td>
                                    {{ $each->title }}
                                </td>
                                <td>
                                    {{ $each->content }}
                                </td>
                                <td>
                                    <a href='' id="btn-edit-course" class="btn btn-primary">
                                        <i>Edit</i>
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action=''>
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" name="delete" class="btn btn-danger">
                                            <i>Delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination pagination-rounded mb-0">
                            {{ $data->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('#select-post').select2();
            $(document).ready(function() {
                $('.select-filter-role').change(function(){
                    $('#form-filter').submit();
                });
            });
        </script>
    @endpush
@endsection()
