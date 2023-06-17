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
      <h5 class="m-0" style="display: inline;">  الطلب :  {{ Str::limit($order->title,40)}}</h5>
    </div>
    
      {{-- detials --}}
        <div class="card-body">
          
          <div class="col-sm-6 marbo" style="margin-top: 10px">
            <ul class="list-group">
              
              <li class="list-group-item d-flex justify-content-between align-items-center">
              الاسم
                <span class="badge badge-primary badge-pill">{{$order->name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
              البريد
                <span class="badge badge-primary badge-pill">{{$order->email}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
              التلفون
                <span class="badge badge-primary badge-pill">{{$order->phone}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
              المجال
                <span class="badge badge-primary badge-pill">{{$order->Section->name}}</span>
              </li>
              
              
            </ul>

          </div>
          <div class="col-sm-6 marbo" style="margin-top: 10px">

            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
              المكان
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
              {{$order->address}}
              </li>
          
              <li class="list-group-item d-flex justify-content-between align-items-center">
              الوصف
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
              
                {{ $order->subject }}
              </li>

              
            </ul>

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


