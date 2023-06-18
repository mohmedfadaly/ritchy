@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
             <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة نقارير المندوب</h5>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>رقم التقرير</th>
                  <th>اسم المندوب</th>
                  <th>اسم الشركه</th>
                  <th>اسم العميل</th>
                  <th>الملاحظات</th>
                  <th>التاريخ</th>

                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
	                <tr>
	                <td>{{$key+1}}</td>
	                  <td>

                    {{$value->id}}
                   </td>
                    <td>{{$value->provider_name}}</td>
                    <td>{{$value->company_name}}</td>
                    <td>{{$value->customer_name}}</td>
                    <td>{{$value->comment}}</td>
                    <td><span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span></td>

	                  <td>
                      <a href="{{route('deleteProviderReport',$value->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i></a>
                      <a href="{{route('showProviderReport',$value->id)}}" class="btn btn-secondary btn-sm "> <i class="fas fa-eye"></i></a>
	                  </td>
	                </tr>
                    @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
		</div>
	</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection
