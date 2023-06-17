@extends('layouts.app')

@section('style')
<style type="text/css">
.switch-field {
	display: flex;
	margin-bottom: 36px;
	overflow: hidden;
}

.switch-field input {
	position: absolute !important;
	clip: rect(0, 0, 0, 0);
	height: 1px;
	width: 1px;
	border: 0;
	overflow: hidden;
}

.switch-field label {
	background-color: #e4e4e4;
	color: rgba(0, 0, 0, 0.6);
	font-size: 14px;
	line-height: 1;
	text-align: center;
	padding: 8px 16px;
	margin-right: -1px;
	border: 1px solid rgba(0, 0, 0, 0.2);
	box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
	transition: all 0.1s ease-in-out;
}

.switch-field label:hover {
	cursor: pointer;
}

.switch-field input:checked + label {
	background-color: #a5dc86;
	box-shadow: none;
}

.switch-field label:first-of-type {
	border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
	border-radius: 0 4px 4px 0;
}
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة الاقسام  </h5>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo23" style="float: left;">
                إضافة قسم جديد
                     <i class="fas fa-plus"></i>
                </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الصورة</th>
                  <th>إسم القسم</th>
                  <th>التاريخ</th>

                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sections as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>
                      @if($value->image != null)
                      <img src="{{ asset('uploads/sections/'.$value->image) }}" style="width: 70px;">
                      @else
                        <img src="{{ asset('uploads/users/'.$setting->image) }}" alt=""   style="width: 70px;">

                      @endif
                      </td>
                      <td>{{$value->name}}</td>

                      <td> <span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span></td>
                      <td>
                        <a href=""
                        class="btn btn-info btn-sm edit"
                        data-toggle="modal"
                        data-target="#modal-update"
                        data-id       = "{{$value->id}}"
                        data-name  = "{{$value->name}}"
                        data-image    = "{{$value->image}}"
                        >  <i class="fas fa-edit"></i></a>
                        <a href="{{ route('deletesections',$value->id) }}"  class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        {{-- add section modal --}}
        <div class="modal" id="modaldemo23">
            <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form action="{{route('storesections')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <label>إسم القسم </label> <span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control" placeholder="إسم القسم  " required="" style="margin-bottom: 10px">
                        <label style="margin-top: 10px;display: block;" >إختيار صورة <span class="text-danger"> * </span></label>
                        <input type="file" name="image" accept="image/*" onchange="loadAvatar(event)" style="display: none;">
                        <img src="{{asset('dist/img/placeholder2.webp')}}"  style="display: block;width: 100%;height: 250px;cursor: pointer;" onclick="ChooseAvatar()" id="avatar">


                        <button type="submit" id="submit1" style="display: none;"></button>
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary save1">حفظ</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            </div>
        </div>

        {{-- edit section modal --}}
        <div class="modal fade" id="modal-update">
            <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                <h4 class="modal-title">تعديل قسم : <span class="item_name"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form action="{{route('updatesections')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="edit_id" value="">
                        <label>إسم القسم </label> <span class="text-danger">*</span>
                        <input type="text" name="edit_name" class="form-control" placeholder="إسم القسم  " required="" style="margin-bottom: 10px">

                        <label  style="margin-top: 10px;display: block;">إختيار صورة <span class="text-primary"> * </span></label>
                        <input type="file" name="edit_image" accept="image/*" onchange="loadAvatar1(event)" style="display: none;">
                        <img src="" class="test" style="display: block;width: 100%;height: 250px;cursor: pointer;" onclick="ChooseAvatar1()" id="avatar1">


                        <button type="submit" id="update" style="display: none;"></button>
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary update">تحديث</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
<script type="text/javascript">

function ChooseAvatar(){$("input[name='image']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

  function ChooseAvatar1(){$("input[name='edit_image']").click()}
      var loadAvatar1 = function(event) {
        var output = document.getElementById('avatar1');
        output.src = URL.createObjectURL(event.target.files[0]);
      };

      function ChooseAvatar2(){$("input[name='edit_avatar']").click()}
      var loadAvatar2 = function(event) {
        var output = document.getElementById('avatar2');
        output.src = URL.createObjectURL(event.target.files[0]);
      };
      function ChooseAvatar3(){$("input[name='avatar']").click()}
      var loadAvatar3 = function(event) {
        var output = document.getElementById('avatar3');
        output.src = URL.createObjectURL(event.target.files[0]);
      };

    // add section


    $('.save1').on('click',function(){
        $('#submit1').click();
    })




    //edit section
    $('.edit').on('click',function(){
        var id         = $(this).data('id')
        var name    = $(this).data('name')
        var image      = $(this).data('image')

        $('.item_name').text(name)
        $("input[name='edit_id']").val(id)
        $("input[name='edit_name']").val(name)
        var url =  '{{ url("uploads/sections/") }}/' + image
        $('.test').attr('src',url);



    })

    // update section
    $('.update').on('click',function(){
        $('#update').click();
    })

</script>
@endsection

