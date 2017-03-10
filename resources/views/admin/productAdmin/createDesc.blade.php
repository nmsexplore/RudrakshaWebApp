@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')

{{--{{dd($productid)}}--}}
            <div class="row setup-content" id="step-1">
                <div class="col-xs-10">
                    <div class="col-md-12 well text-center">
                        <h1>Product Description</h1>

                        {!! Form::open(array('route'=>'product_description_add', 'method'=>'post' ))!!}

                        {{ Form::hidden('product_id', $productid) }}



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} clearfix">
                            <label for="description" class="col-sm-4 control-label">Description</label>

                            <div class="col-sm-8">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required
                                       autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }} clearfix">
                            <label for="information" class="col-sm-4 control-label">Information</label>

                            <div class="col-sm-8">
                         <textarea id="information" type="text" class="form-control" name="information"
                                   value="{{ old('information') }}" required autofocus></textarea>

                                @if ($errors->has('information'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('information') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('benifit') ? ' has-error' : '' }} clearfix">
                            <label for="benifit" class="col-sm-4 control-label"> Health Benifits </label>


                            <div class="col-sm-8">

                                <div class="" id="room_fileds">
                                   <input id="more_fields" type="text" class="form-control" name='benifit[health][]'
                                              autofocus>
                                </div>
                                <input type="button" id="more_fields" onclick="add_fields();" value="Add More"/>


                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('benifit') ? ' has-error' : '' }} clearfix">
                            <label for="benifit" class="col-sm-4 control-label"> Business Benifits </label>


                            <div class="col-sm-8">

                                <div class="" id="b_room_fileds">
                                    <input id="b_more_fields" type="text" class="form-control" name='benifit[business][]'
                                           autofocus>
                                </div>
                                <input type="button" id="b_more_fields" onclick="b_add_fields();" value="Add More"/>


                            </div>
                        </div>





                        <div class="clearfix pad"></div>
                        <div align="right" >
                            {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                            {!! Form::close() !!}

                    </div>
                </div>
            </div>







    </div>

    @endsection