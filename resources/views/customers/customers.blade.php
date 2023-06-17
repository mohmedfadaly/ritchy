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
              <h5 class="m-0" style="display: inline;">قائمة العملاء</h5>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo9" style="float: left;">
                إضافة عميل جديد
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
                  <th>الهاتف</th>
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
	                <tr>
	                  <td>{{$key+1}}</td>

	                  <td><img alt="Avatar" class="table-avatar" src="{{asset('uploads/customers/avatar/'.$value->avatar)}}" style="border-radius: 50px;width:50px;"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->phone}}</td>


	                  <td>
                     <a href="{{route('deletecustomers',$value->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i></a>
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
                        <h6 class="modal-title">اضافة عميل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('storecustomers')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label>إسم العميل </label> <span class="text-danger">*</span>
                            <input type="text" name="name" class="form-control" placeholder="إسم العميل  " required="" style="margin-bottom: 10px">
                            <label>هاتف العميل </label> <span class="text-danger">*</span>
                        <input type="text" name="phone" class="form-control" placeholder="هاتف العميل  " required="" style="margin-bottom: 10px">

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
          </div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">

$('.save1').on('click',function(){
        $('#submit1').click();
    })
</script>
@endsection
