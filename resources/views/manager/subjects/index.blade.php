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

            $('#modal-major').select2();
            $('#modal-subject-type').select2();

            $(document).ready(async function() {
                $('.select-filter-subject,.select-filter-major').change(function(){
                    $('#form-filter').submit();
                });
            });
            $('#btn-create-classe').click(async function(e){
                await e.preventDefault();
                await $('#modal-create-classe').modal('show');
            });


            function submitForm(formType,modalName){
                const obj=$("#form-create-"+formType);
                var formData = new FormData(obj[0]);
                $.ajax({
                    url: obj.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: true,
                    cache: false,
                    enctype: 'multipart/form-data',
                    success: function (response) {
                        hidemodel(modalName)
                        $.toast({
                            heading: 'Success !',
                            text: `Your ${formType} have been created.`,
                            showHideTransition: 'fade',
                            icon: 'success',
                            hideAfter: 5000,
                            position: 'top-right',
                        })
                        window.setTimeout(function(){
                            window.location.href = "{{route("manager.$table.index")}}";
                        }, 1500);

                    },
                    error: function (response) {
                        const errors = Object.values(response.responseJSON.errors);
                        errors.forEach(function (each) {
                            each.forEach(function (error) {
                                $.toast({
                                    heading: 'Error !',
                                    text: error,
                                    showHideTransition: 'fade',
                                    width: '100%',
                                    hideAfter: 5000,
                                    icon: 'error',
                                    position: 'top-right',
                                })
                            });
                        });
                    }
                });
            }
            function hidemodel(idName){
                $('#'+ idName).hide();
            }
        </script>
    @endpush
    <div id="modal-create-classe" class="modal" tabindex="-1" role="dialog" style="background-color:rgba(0,0,0,0.5)">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Create {{$table}}</h5>
                    <button type="button" onclick="hidemodel('modal-create-classe')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
<<<<<<< HEAD
                    <form id="form-create-classe" action='{{route("manager.$table.store")}}' class="d-flex flex-column " method="POST">
                        @csrf
                        <div class="form-group d-flex mb-3">
=======
                    <form id="form-create-classe" action='' class="d-flex flex-column " method="POST">
                        @csrf
                        <div class="form-group d-flex mb-3">
                            <div class="col-md-6 ">
                                <label for="modal-name-subject">Tên môn học </label>
                                <input  class="form-control " id="modal-name-subject"  type="text"  name="name-subject">
                            </div>
                        </div>
                        <div class="form-group d-flex mb-3">
>>>>>>> 87c9dcc6b935912706466e4df36e944843cab1d1
                            <div class="col-md-4 ">
                                <label for="modal-major">Ngành</label>
                                <select class="custom-select " id="modal-major"  name="major_id" >
                                    @foreach($majors as $major )
                                        <option value="{{ $major->id }}">
                                            {{$major->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 ">
                                <label for="modal-subject-type">Loại môn học</label>
<<<<<<< HEAD
                                <select class="custom-select " id="modal-subject-type"  name="study_type" >
                                    @foreach($subject_types as $subject_type => $value)
                                        <option value="{{ $subject_type }}">
                                            {{$value}}
                                        </option>
                                    @endforeach
=======
                                <select class="custom-select " id="modal-subject-type"  name="subject_type" >

                                </select>
                            </div>
                            <div class="col-md-2 ">
                                <label for="modal-class-type">Loại lớp học</label>
                                <select class="custom-select " id="modal-class-type"  name="class_type" >
{{--                                    @foreach($class_types as $class_type => $value)--}}
{{--                                        <option value="{{ $value }}">--}}
{{--                                            {{$class_type}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
>>>>>>> 87c9dcc6b935912706466e4df36e944843cab1d1
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex mb-3">
<<<<<<< HEAD
                            <div class="col-md-6 ">
                                <label for="modal-name-subject">Tên môn học </label>
                                <input  class="form-control " id="modal-name-subject"  type="text"  name="name">
                            </div>
                            <div class="col-md-2 ">
                                <label for="number_credits">Số tín </label>
                                <input  class="form-control " id="number_credits"  type="number"  name="number_credits">
=======
                            <div class="col-md-3 ">
                                <label for="modal-start_date">Thời gian bắt đầu </label>
                                <input  class="form-control " type="date" id="modal-start_date"  name="start_date">
                            </div>
                            <div class="col-md-3 ">
                                <label for="modal-end_date">Thời gian kết thúc</label>
                                <input  class="form-control " type="date" id="modal-end_date"   name="end_date">
                            </div>
                            <div class="col-md-2 ">
                                <label for="modal-quality-all_session">Số buổi học </label>
                                <input  class="form-control " id="modal-quality-all_session" value="1" type="number"  name="all_session">
                            </div>
                        </div>
                        <div class="form-group d-flex mb-3">
                            <div class="col-md-6 ">
                                <label for="modal-classname">Tên lớp </label>
                                <input  class="form-control " id="modal-classname"  name="name">
                            </div>
                            <div class="col-md-2 ">
                                <label for="modal-exam-classname">###</label>
                                <input  class="form-control " id="modal-exam-classname" readonly  name="exam-classname">
>>>>>>> 87c9dcc6b935912706466e4df36e944843cab1d1
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitForm('classe','modal-create-classe')" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

@endsection()
