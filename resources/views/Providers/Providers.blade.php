@extends('layouts.app')
@section('style')
<style type="text/css">

</style>
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
             <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة المناديب</h5>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo9" style="float: left;">
                إضافة مندوب جديد
                     <i class="fas fa-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الصوره</th>
                  <th>الإسم</th>
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
	                <tr>
	                  <td>{{$key+1}}</td>

	                  <td><img alt="Avatar" class="table-avatar" src="{{asset('uploads/customers/avatar/'.$value->avatar)}}" style="border-radius: 50px;width:50px;"></td>
                    <td>{{$value->name}}</td>


	                  <td>
                        <a href=""
                        class="btn btn-info btn-sm edit"
                        data-toggle="modal"
                        data-target="#modal-update"
                        data-id       = "{{$value->id}}"
                        data-name  = "{{$value->name}}"
                        data-phone    = "{{$value->phone}}"
                        >  <i class="fas fa-edit"></i></a>

                        <a href="{{route('deleteProviders',$value->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i></a>
	                  </td>
	                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            {{csrf_field()}}
            <!-- /.card-body -->
            {{-- add doctors modal --}}
            <div class="modal" id="modaldemo9">
                <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة مندوب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('storeProviders')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label>إسم المندوب </label> <span class="text-danger">*</span>
                            <input type="text" name="name" class="form-control" placeholder="إسم المندوب  " required="" style="margin-bottom: 10px">
                            <label>هاتف المندوب </label> <span class="text-danger">*</span>
                            <input type="text" name="phone" class="form-control" placeholder="هاتف المندوب  " required="" style="margin-bottom: 10px">

                            <label >كلمة المرور : <span class="text-danger">*</span></label>
							<input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="كلمة المرور" required="">

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
                <h4 class="modal-title">تعديل مندوب : <span class="item_name"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form action="{{route('updateProviders')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="edit_id" value="">
                        <label>إسم المندوب </label> <span class="text-danger">*</span>
                        <input type="text" name="edit_name" class="form-control" placeholder="إسم المندوب  " required="" style="margin-bottom: 10px">
                        <label>هاتف المندوب </label> <span class="text-danger">*</span>
                        <input type="text" name="edit_phone" class="form-control" placeholder="هاتف المندوب  " required="" style="margin-bottom: 10px">

                        <label >كلمة المرور : <span class="text-danger">*</span></label>
                        <input type="text" name="edit_password" class="form-control" value="{{old('password')}}" placeholder="كلمة المرور" required="">

                        <button type="submit" id="update" style="display: none;"></button>
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary update">{{ __('messages.update') }}</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            </div>
        </div>
          </div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">

$('.save').on('click',function(){
        $('#submit').click();
    })




    //edit section
    $('.edit').on('click',function(){
        var id         = $(this).data('id')
        var name    = $(this).data('name')
        var phone      = $(this).data('phone')

        $('.item_name').text(name)
        $("input[name='edit_id']").val(id)
        $("input[name='edit_name']").val(name)
        $("input[name='edit_phone']").val(phone)


    })

    // update section
    $('.update').on('click',function(){
        $('#update').click();
    })
    $('.save1').on('click',function(){
        $('#submit1').click();
    })
</script>
@endsection
