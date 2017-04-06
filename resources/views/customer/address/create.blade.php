
@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')




    <div class="panel-body">

        <div class="col-md-8 col-md-offset-2 $address">

            <h3>Create Customer Address</h3>
            <div class="box box-info clearfix pad ">

                {!! Form::open(array('route'=>'customers.address.store'))!!}

                {{ Form::hidden('customer_id', $user->id) }}

                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} clearfix">
                    <label for="country" class="col-sm-4 control-label">Country</label>



                    <?php $x = Config::get('country');?>
                    <div class="col-sm-8">
                        <select id="country_code" name="country" class="form-control" required>
                            <option selected="selected" disabled>Choose Country</option>
                            @foreach($x as $code=>$name)
                                <option value="{{$code}}">
                                    {{$name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <?php $y = Config::get('country_code');?>
                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} clearfix">
                    <label for="contact" class="col-sm-4 control-label">Contact</label>
                    <div class="col-sm-8">
                        <p class="col-sm-2 " id="country_dial"></p>
                        <input  type="number" class="form-control col-sm-6" name="contact"
                               value="{{ old('contact') }}" required autofocus>


                        @if ($errors->has('contact'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} clearfix">
                    <label for="state" class="col-sm-4 control-label">State</label>

                    <div class="col-sm-8">
                        <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required
                               autofocus>

                        @if ($errors->has('state'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} clearfix">
                    <label for="street" class="col-sm-4 control-label">Street</label>

                    <div class="col-sm-8">
                        <input id="street" type="text" class="form-control" name="street"
                               value="{{ old('street') }}" required autofocus>
                        </input>
                        @if ($errors->has('street'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} clearfix">
                    <label for="city" class="col-sm-4 control-label">City</label>

                    <div class="col-sm-8">
                        <input id="city" type="text" class="form-control" name="city"
                               value="{{ old('city') }}" required autofocus>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>



                <div class="form-group clearfix">
                    <label for="latitude_long" class="col-sm-4 control-label">Latitude/Latitude</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="latitude_long"
                               placeholder="latitude,longitude"
                               id="latlong-info"
                               data-toggle="modal"
                               data-target="#myModal"
                               required autofocus>

                    </div>
                </div>


                <div class="clearfix pad"></div>
                <div align="right">
                    {{Form::submit('Create', array('class'=>'btn btn-sm btn-primary ','title'=>'create customer address'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/profile">Cancel</a>
                    {!! Form::close() !!}
                </div>

            </div>

            @include('customer.map')

            <script type="text/javascript"
                    src="http://maps.google.com/maps/api/js?key=AIzaSyDenLLrWG9iWZSXBXlJAAzqcNLgRlMFsRI"></script>
            <script src="{{ asset('js/map.js') }}"></script>

            <script>
                var countryCode = {!! json_encode(config('country_code')) !!};
            </script>




@endsection