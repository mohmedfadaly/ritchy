@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
             <div class="card-header">
                <h5 class="m-0" style="display: inline;">قائمة {{$name}}  </h5>
                <a href="{{$route}}"class="btn btn-primary" style="float: left;">
                    إضافة
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  {{--  <th>#</th>  --}}
                  <th>الصوره</th>
                  <th>الإسم</th>
                  <th>القسم</th>
                  <th>السعر</th>
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
	                <tr>
	                  {{--  <td>{{$key+1}}</td>  --}}
	                  <td> <img src="{{ asset('uploads/products_images/'.$value->image) }}" alt="" style="width: 100px"> </td>
	                  <td>{{$value->name}}</td>
                    <td>{{$value->Section->name}}</td>
                    <td>{{$value->price}}</td>

	                  <td>
                      <a href="{{route('editproducts',$value->id)}}" class="btn btn-primary btn-sm " type="submit"> <i class="fas fa-edit"></i></a>
                      <a href="{{route('DeleteProduct',$value->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i></a>
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
