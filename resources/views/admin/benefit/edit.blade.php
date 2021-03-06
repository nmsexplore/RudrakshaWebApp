@extends('admin.Layout.app')

@section('main-content')

    <div class="panel-body">

        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1> Edit Category Benifits</h1>

                    {!! Form::model($beni,array('route'=>['category.benefit.update',$beni->id],'method'=>'PUT' ))!!}

                    {{ Form::hidden('category_id',$beni->category_id) }}

                    <div class="form-group{{ $errors->has('benefit_heading') ? ' has-error' : '' }} clearfix">
                        <label for="benefit_heading" class="col-sm-3 control-label">Benefit Head</label>

                        <div class="col-sm-8">
                            {{ Form::text('benefit_heading',null,array('class'=>'form-control'))}}
                        </div>
                    </div>



                        <label for="benefit" class="col-sm-3 control-label"> Benifits </label>

                        <div class="edit-area2">
                            <div class="controls">
                                <span class="add btn btn-info" style="float: right; margin-right: 17px">+</span>
                            </div>
                        </div>
                               @foreach($beni->benefit as $list)
                            <div class=" formfield  col-sm-offset-3 col-sm-8">
                                    <input id="more_fields" type="text" class="form-control"
                                           name='benefit[]'
                                           value="{{$list}}" autofocus>

                                <span class=" del btn btn-danger del-input benef_del">-</span>
                            </div>
                        @endforeach


                        <div class="example-template2">

                            <div class="formfield col-sm-offset-3 col-sm-8">
                                <input id="more_fields" type="text" class="form-control" name='benefit[]'
                                       required autofocus>
                            </div>
                            <div class="formfield"><span class="del btn btn-danger ben_del ">-</span></div>
                        </div>





                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('Save changes', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the Changes on Benefits'))}}
                        <a type="button" class="btn btn-sm btn-warning" href="/admin/category">Cancel</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection