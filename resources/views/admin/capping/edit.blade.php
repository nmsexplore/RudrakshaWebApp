@extends('admin.Layout.app')

@section('main-content')

    <div class="panel-body">


        <div class="col-md-8 col-md-offset-2 ">

            <h3>Edit Capping</h3>
            <div class="box box-info clearfix pad ">


                {!! Form::model($capping,array('route'=>['capping.update',$capping->id],'method'=>'PUT','enctype'=>'multipart/form-data'  ))!!}

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} clearfix">
                    <label for="type" class="col-sm-4 control-label">Type</label>

                    <div class="col-md-8 ">
                        <select id="type" name="type"
                                class=" form-control " required>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                        </select>
                    </div>

                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} clearfix">
                    <label for="price" class="col-sm-4 control-label">Price</label>

                    <div class="col-sm-8">
                        {{ Form::text('price',null,array('class'=>'form-control'))}}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('metal_quantity_used') ? ' has-error' : '' }} clearfix">
                    <label for="metal_quantity_used" class="col-sm-4 control-label">Metal Quantity</label>

                    <div class="col-sm-8">
                        {{ Form::text('metal_quantity_used',null,array('class'=>'form-control'))}}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} clearfix">
                    <label for="description" class="col-sm-4 control-label">Description</label>

                    <div class="col-sm-8">
                        {{ Form::text('description',null,array('class'=>'form-control'))}}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} clearfix">
                    <label for="status" class="col-sm-4 control-label">Status</label>

                    <div class="checkbox col-sm-8">

                        <label>

                            <input name="status" type="radio" value="1" @if($capping->status==1) checked @endif>
                            Active
                        </label>

                        <label>
                            <input name="status" type="radio" value="0" @if($capping->status==0) checked @endif>
                            Inactive
                        </label>
                    </div>
                </div>

                <div class="clearfix pad"></div>
                <div align="right">
                    {{Form::submit('Save changes', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the Capping changes'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/admin/capping">Cancel</a>
                    {!! Form::close() !!}
                </div>


            </div>

@endsection