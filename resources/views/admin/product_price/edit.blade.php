@extends('admin.Layout.app')

@section('main-content')

    <div class=" col-md-8 col-md-offset-2">
        <h3>Edit Product Price</h3>
        <div class="box box-info clearfix pad">

            {!! Form::model($prod_price,array('route'=>['product_price.update',$prod_price->priceid],'method'=>'PUT' ))!!}
            {{ csrf_field() }}
{{--{{dd($prod_price)}}--}}

            <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }} clearfix">
                <label for="product_id" class="col-sm-4 control-label">Product ID </label>

                <div class="col-md-8 ">
                    <select id="product_id" name="product_id"
                            class=" form-control " required>

                        @foreach ($product as $pro)
                            <option value="{{$pro->id}}" @if($pro->id==$prod_price->prodid)selected @endif>
                                {{$pro->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }} clearfix">
                <label for="currency_id" class="col-sm-4 control-label">Currency </label>

                <div class="col-md-8 ">
                    <select id="currency_id" name="currency_id"
                            class=" form-control " required>

                        @foreach ($currency as $curen)
                            <option value="{{$curen->id}}" @if($curen->id==$prod_price->cid)selected @endif>
                                {{$curen->currency}}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>




            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} clearfix">
                <label for="price" class="col-sm-4 control-label">Price</label>

                <div class="col-sm-8">
                    {{ Form::number('price',null,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="clearfix " align="right">
                {{Form::submit('Save Changes', array('class'=>'btn btn-primary btn-sm ','title'=>'Save the changes in the Product Price'))}}
                <a type="button" class="btn btn-warning  btn-sm" href="/admin/product_price">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@endsection
