@extends('layouts.app')

@section('style')

<style type="text/css">
	#avatar{
		width: 100%;
		height: 300px;
	}
	#avatar:hover{
		width: 100%;
		height: 300px;
		cursor: pointer;
	}
	.marbo{
		margin-bottom: 10px
	}

	.img img{
		width:150px;
		height:150px;
		margin-right:20px;
		margin-top:20px;
	}

	#gallery-photo-add {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 50px;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}
</style>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="card card-primary card-outline">

                  <div class="card-header">
                    <h5 class="m-0" style="display: inline;">تعديل الطلب <i class="fas fa-exclamation-circle" style="cursor: pointer;color:#FFC107" data-toggle="modal" data-target="#modal-secondary"></i></h5>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                          {{-- orders --}}
                          <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-product-tab" data-toggle="pill" href="#custom-content-below-product" role="tab" aria-controls="custom-content-below-product" aria-selected="true">تفاصيل الطلب</a>
                          </li>
                          {{-- products --}}
                          <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-company-tab" data-toggle="pill" href="#custom-content-below-company" role="tab" aria-controls="custom-content-below-company" aria-selected="false">المنتجات</a>
                          </li>
                    </ul>
                  </div>
    <div class="tab-content" id="custom-content-below-tabContent">
      {{-- orders --}}
      <div class="tab-pane fade show active"  id="custom-content-below-product" role="tabpanel" aria-labelledby="custom-content-below-product-tab">
        <div class="card-body">
          <form >
          <input type="hidden" name="id" value="{{ $ord->id }}">
          {{csrf_field()}}
              <div class="row">
                  <div class="col-sm-6 marbo" style="margin-top: 10px">
                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                      الاسم الاول
                        <span class="badge badge-primary badge-pill">{{$ord->Customer->name}}</span>
                      </li>


                      <li class="list-group-item d-flex justify-content-between align-items-center">
                      الموبيل
                        <span class="badge badge-primary badge-pill">{{$ord->Customer->phone}}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        الوصف
                            <span class="badge badge-primary badge-pill">{{ $ord->desc }} ريال</span>
                        </li>
                    </ul>

                  </div>
                  <div class="col-sm-6 marbo" style="margin-top: 10px">

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        الدولة
                            <span class="badge badge-primary badge-pill">{{ $ord->Country->name_ar }} ريال</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            المدينة
                                <span class="badge badge-primary badge-pill">{{ $ord->City->name_ar }} ريال</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحي
                                <span class="badge badge-primary badge-pill">{{ $ord->area }} ريال</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            الشارع
                                <span class="badge badge-primary badge-pill">{{ $ord->street }} ريال</span>
                            </li>

                      <li class="list-group-item d-flex justify-content-between align-items-center">
                      الإجمالي
                        <span class="badge badge-primary badge-pill">{{ $ord->total }} ريال</span>
                      </li>

                    </ul>

                  </div>




              </div>
          </form>


      </div>
      </div>
      {{-- product --}}
      <div class="tab-pane fade" id="custom-content-below-company" role="tabpanel" aria-labelledby="custom-content-below-company-tab">
        <div class="col-sm-12" style="margin-top: 10px">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-header">
                    <h5 class="m-0" style="display: inline;"> تفاصيل الطلب <i class="fas fa-exclamation-circle" style="cursor: pointer;color:#FFC107" data-toggle="modal" data-target="#modal-secondary"></i></h5>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="card card-primary card-outline">
                    {{--  <div class="card-header">
                      <h5 class="m-0" style="display: inline;">قائمة الطلبات</h5>
                    </div>  --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>الإسم</th>
                          <th>سعر </th>
                          <th>الكمية </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ord->OrderProducts as $key => $val)
                          <tr>
                          <td>{{$key+1}}</td>
                            <td>

                            {{$val->Product->name}}
                            </td>

                            <td>{{ $val->price}}</td>
                            <td>{{ $val->count}}</td>

                          </tr>
                        @endforeach
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
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
   var option = {
        language: 'ar',
        uiColor: '#9AB8F3'
        }
    CKEDITOR.replace( 'des_ar',option );
    CKEDITOR.replace( 'des_en',option );
//edit image
function ChooseAvatar(){$("input[name='image']").click()}
var loadAvatar = function(event) {
var output = document.getElementById('avatar');
output.src = URL.createObjectURL(event.target.files[0]);
};




</script>
@endsection


