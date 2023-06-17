@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
             <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة الطلبات</h5>

            </div> 

            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>رقم الطلب</th>
                  <th>السعر</th>
                  <th>التاريخ</th>

                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Orders as $key => $value)
	                <tr>
	                <td>{{$key+1}}</td>
	                  <td>

                    {{$value->id}}
                   </td>
                    <td>{{$value->total}}</td>


                    <td><span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span></td>

	                  <td>
                      <a href="{{route('editorders',$value->id)}}" class="btn btn-primary btn-sm " type="submit"> <i class="fas fa-edit"></i></a>
                      <a href="{{route('Deleteorder',$value->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i></a>
	                  </td>
	                </tr>
                @endforeach
                </tfoot>
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
