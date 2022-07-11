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
                        <div class="form-group d-flex">
                            <div class="input-group mb-3 w-15 mr-3">
                                <label for="select-major">Ngành</label>
                                <select class="custom-select select-filter-major" id="select-major" name="major" >
                                    <option selected>All...</option>
                                    @foreach($majors as $major )
                                        <option value="{{ $major->id }}"
                                                @if ((string)$major->id === $selectedMajor) selected @endif>
                                            {{$major->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3 w-15 mr-3">
                                <label for="select-subject">Môn học</label>
                                <select class="custom-select select-filter-subject" id="select-subject" name="subject" >
                                    <option selected>All...</option>
                                    @foreach($subjects as $subject )
                                        <option value="{{ $subject->id }}"
                                                @if ((string)$subject->id === $selectedSubject) selected @endif>
                                            {{$subject->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="float-right col">
                                <a href="" id="btn-create-classe" class="btn btn-success float-right">
                                    Tạo môn học
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên môn học</th>
                            <th>Thông tin môn học</th>
                            <th>Chuyên ngành</th>
                            <th style="width:10%">Sửa</th>
                            <th style="width:10%">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $each)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$each->id}}
                                    </a>
                                </td>
                                <td style="">
                                    <span style="color:black">{{$each->name}}</span>
                                </td>
                                <td>
                                    Số tín chỉ:
                                    <span style="color:black">{{$each->number_credits}} tín chỉ </span>
                                    <br>
                                    Loại môn học:
                                    <span style="color:black">{{$each->study_typename}} </span>
                                </td>
                                <td>
                                    <span style="color:black">{{$each->major_name}}  </span>
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
            $('#select-major').select2();
            $('#select-subject').select2();

            $(document).ready(async function() {
                $('.select-filter-subject,.select-filter-major').change(function(){
                    $('#form-filter').submit();
                });
            });
        </script>
    @endpush
@endsection()
