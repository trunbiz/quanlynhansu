 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Sửa Chức vụ</h2>
                    {{-- <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                            </ol>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
     
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Sửa chức vụ</h5>
                        <div class="card-body">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <form name="myform" class="needs-validation" method="POST" action="{{url('private/chucvu/sua/'.$chucvu->id_chucvu)}}"  onsubmit="return validatechucvu()" novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label >Phòng Ban</label>
                                                <select name="id_phongban" class="form-control" id="ten_phong_ban" style="-webkit-appearance: auto;" disabled>
                                                  <option selected value="">Chọn phòng ban</option>
                                                    @foreach($phongban as $pb)
                                                    <option @if($chucvu->id_phongban==$pb->id_phongban) {{"selected"}} @endif value="{{$pb->id_phongban}}" >{{$pb->ten_phong_ban}}</option>
                                                     @endforeach
                                                     
                                                </select>
                                                <span id="phongban123"></span>
                                        </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_chucvu">Mã Chức Vụ</label>
                                                <input type="text" class="form-control" id="id_machucvu" name="id_chucvu" placeholder="" value="{{substr($chucvu->id_chucvu,strlen($chucvu->id_phongban))}}" disabled>
                                                <span id="machucvu123"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="ten_chuc_vu">Tên Chức Vụ</label>
                                                <input type="text" class="form-control" id="ten_chuc_vu" name="ten_chuc_vu" placeholder="" value="{{$chucvu->ten_chuc_vu}}">
                                                <span id="chucvu123"></span>
                                            </div> 
                                            <div class="form-group col-md-12">
                                                <label>Nội dung công việc</label>
                                                    <textarea class="form-control" id="editor1" name="noi_dung_cv" rows="15" required>{!!$chucvu->noi_dung_cv!!}</textarea>
                                            </div>
                                            <div class=" form-group col-md-12">
                                                <label >Phân quyền cho chức vụ: </label>
                                            @foreach($permissions as $permission)
                                            <div class="form-check">
                                                <div class="  float-left mt-3" style="width: 20%">
                                                    
                                                <input {{$cv_permission->contains($permission->id)?'checked':''}} type="checkbox" class="form-check-input" name=permission[] value="{{$permission->id}}">
                                                <label class="form-check-label">{{$permission->ten_hien_thi}}</label>
                                                </div>
                                              </div>
                                            @endforeach
                                        </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Sửa</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
    </div>
</div>

@endsection