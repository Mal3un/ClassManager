@extends('layout.master')
@push('css')
    <link href="{{asset('css/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header " >

                </div>
                <form id="form_create_post" method="post" action="{{route('manager.posts.store')}}">
                    @csrf
                    <div class="card-body row">
                        <div class="col-8">
                            <label for="title">Tiêu đề chính</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề">
                        </div>
                        <div class="col-2">
                            <label for="image">Hình ảnh tiêu đề</label>
                            <input type="file" class="fileinput-controls" id="image" name="image" placeholder="Hình ảnh">
                        </div>
                        <div class="col-12 mt-4">
                            <label for="summernote">Nội dung</label>
                            <div id="summernote"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="button-review-post" class="btn btn-primary">Xem thử</button>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script src="{{asset('js/summernote-bs4.min.js')}}"></script>
        <script>

            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Nội dung bài viết',
                    tabsize: 2,
                    height: 300,
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    }
                });
                $('#button-review-post').click(function () {
                    let content = $('#summernote').summernote('code');
                    let title = $('#title').val();
                    let image = $('#image').val();
                    let data = {
                        title: title,
                        image: image,
                        content: content
                    };
                    $.ajax({
                        url: '{{route('api.posts.preview')}}',
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
            });


        </script>
    @endpush
@endsection()
