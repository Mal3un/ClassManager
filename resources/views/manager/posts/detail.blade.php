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
                <div class="card-body ">
                    <div class="row d-flex justify-content-sm-around">
                        <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
                            <div class="card">
                                <div class="card-body text-center" style="position: relative;display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                    <h4 style="color:black; font-weight:bold;" class="title-preview">{{$data->title}}</h4>
                                    <img src="{{asset($data->image)}}" class="image-preview" width="auto" height="400" alt="ảnh">
                                    <br>
                                    <div class="content-preview" style="width:50%;text-align:justify">
                                        {!! $data->content !!}
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="{{asset('js/summernote-bs4.min.js')}}"></script>
    @endpush
    <div id="modal-preview-post" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-full-width " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Xem trước</h5>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-sm-around">
                        <div class="col-xl-3 col-lg-6 order-lg-1">
                            <div class="card">
                                <div class="card-body text-center" style="position: relative;">
                                    <img class="image-preview" width="auto" height="200" alt="ảnh">
                                    <h4 style="color:black; font-weight:bold;" class="title-preview"></h4>
                                </div>
                            </div> <!-- end card-->
                        </div>
                        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                            <div class="card">
                                <div class="card-body text-center" style="position: relative;display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                    <h4 style="color:black; font-weight:bold;" class="title-preview"></h4>
                                    <img class="image-preview" width="auto" height="400" alt="ảnh">
                                    <br>
                                    <div class="content-preview" style="width:70%;text-align:justify"></div>
                                </div>
                            </div> <!-- end card-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitForm('course','modal-preview-post')" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

@endsection()
