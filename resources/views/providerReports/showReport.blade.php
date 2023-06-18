@extends('layouts.app')

@section('style')

    <style type="text/css">
        #avatar {
            width: 100%;
            height: 300px;
        }

        #avatar:hover {
            width: 100%;
            height: 300px;
            cursor: pointer;
        }

        .marbo {
            margin-bottom: 10px
        }

        .img img {
            width: 150px;
            height: 150px;
            margin-right: 20px;
            margin-top: 20px;
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
                <h5 class="m-0" style="display: inline;"> رقم التقرير : {{ Str::limit($providerReport->id,40)}} #</h5>
            </div>

            {{-- detials --}}
            <div class="card-body">

                <div class="col-sm-12 marbo" style="margin-top: 10px">
                    <ul class="list-group">

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            اسم المندوب
                            <span class="badge badge-primary badge-pill">{{$providerReport->provider_name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            اسم العميل
                            <span class="badge badge-primary badge-pill">{{$providerReport->customer_name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            اسم الشركه
                            <span class="badge badge-primary badge-pill">{{$providerReport->company_name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الملاحظات
                            <span class="badge badge-primary badge-pill">{{$providerReport->comment}}</span>
                        </li>

                    </ul>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive  mt-5">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-primary">
                            <tr>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">اسم الصنف</th>
                                <th scope="col">الكميه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($providerReport->ProviderReportProducts as $product)
                                    <td>
                                        <span class="badge badge-primary badge-pill">{{$product->Product->name}}</span>


                                    </td>
                                    <td>
                                        <span class="badge badge-primary badge-pill">{{$product->Section->name}}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary badge-pill">{{$product->count}}</span>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
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
        CKEDITOR.replace('des_ar', option);
        CKEDITOR.replace('des_en', option);

        //edit image
        function ChooseAvatar() {
            $("input[name='image']").click()
        }

        var loadAvatar = function (event) {
            var output = document.getElementById('avatar');
            output.src = URL.createObjectURL(event.target.files[0]);
        };


    </script>
@endsection


