@extends('layouts.app')

@section('style')
<style type="text/css">
    .selectize-input{
        min-height: 38px !important
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

	<div class="card card-primary card-outline">
		{{--  <div class="card-header">
			<h5 class="m-0" style="display: inline;">إضافة منتج جديد</h5>
		</div>  --}}

		<div class="card-body">
			<form action="{{route('updateproducts')}}" method="post" enctype="multipart/form-data">
				<div class="row">
                    <input type="hidden" name="id" value="{{ $data->id }}">
					{{csrf_field()}}

					{{-- card image --}}
					<div class="col-sm-3" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">صورة الكارت : <span class="text-primary">*</span></label>
							<input type="file" name="card_image" class="form-control" accept="image/*">
						</div>
					</div>

					{{-- name ar --}}
					<div class="col-sm-3" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">الإسم  : <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control" value="{{ $data->name }}" placeholder="الإسم " required="">
						</div>
					</div>


					{{-- old price --}}
					<div class="col-sm-3" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">السعر : <span class="text-danger">*</span></label>
							<input type="number" name="price" class="form-control" value="{{$data->price}}" step="0.01" required="">
						</div>
					</div>

					<div class="col-sm-3" style="margin-top: 10px">
						<div class="from-group">
						<label> القسم</label> <span class="text-danger">*</span>
							<select name="section_id" class="form-control" required>
								@foreach($sections as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>

						</div>
					</div>

                    {{--  discription  --}}
                    <div class="col-sm-12">
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="text-primary">وصف المنتج   : <span class="text-primary">*</span></label>
                                <textarea class="form-control"  name="desc" id="editor1" rows="10" cols="80" required>{{ $data->desc }}</textarea>
                            </div>
                           
                        </div>
                    </div>

					
					
					{{-- submit --}}
					<div class="col-sm-4 offset-3" style="margin-top: 20px">
						<button class="btn btn-outline-primary btn-block store">حفظ</button>
					</div>

				</div>
			</form>
		</div>
	</div>

@endsection

@section('script')
    <script>
        var option = {
        language: 'ar',
        uiColor: '#9AB8F3'
        }
    CKEDITOR.replace( 'desc',option );
    CKEDITOR.replace( 'desc',option );


    </script>
@endsection


