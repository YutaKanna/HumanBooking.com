@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open([
                    'route' => ['projects.store'],
                    'method' => 'post',
                ]) !!}
                {{ csrf_field() }}
                    <h3>案件を登録する</h3>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('project_name', __('validation.attributes.project_name'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('project_name', null, [
                                        'class' => 'form-control'.($errors->has('project_name') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.project_name'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('add_talents', __('validation.attributes.add_talents'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <button type="button" class="btn btn-primary rounded-circle p-0" style="width:2rem;height:2rem;margin-left: 15px;" data-toggle="modal" data-target="#modal1">＋</button>
                            <div class="modal fade" id="modal1" tabindex="-1"
                                role="dialog" aria-labelledby="label1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="margin-top: 100px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="label1">タレントを追加する</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($talents as $talent)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="talents[]" id="check-{{ $talent->id }}" value="{{ $talent->id }}">
                                                <label class="form-check-label" for="check-{{ $talent->id }}">{{ $talent->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <!-- data-dismissは消した方がいい? -->
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">申請する</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
