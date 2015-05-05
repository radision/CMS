@extends(Config::get('core.default'))

@section('title')
{{ $event->title }}
@stop

@section('top')
<div class="page-header">
<h1>{{ $event->title }}</h1>
</div>
@stop

@section('content')
@auth('edit')
    <div class="well clearfix">
        <div class="hidden-xs">
            <div class="col-xs-6">
                <p>
                    <strong>创建者:</strong> {!! $event->owner !!}
                </p>
                <a class="btn btn-info" href="{!! URL::route('events.edit', array('events' => $event->id)) !!}"><i class="fa fa-pencil-square-o"></i> 修改</a> <a class="btn btn-danger" href="#delete_event" data-toggle="modal" data-target="#delete_event"><i class="fa fa-times"></i> 删除</a>
            </div>
            <div class="col-xs-6">
                <div class="pull-right">
                    <p>
                        <em>创建于: {!! HTML::ago($event->created_at) !!}</em>
                    </p>
                    <p>
                        <em>更新于: {!! HTML::ago($event->updated_at) !!}</em>
                    </p>
                </div>
            </div>
        </div>
        <div class="visible-xs">
            <div class="col-xs-12">
                <p>
                    <strong>创建者:</strong> {!! $event->owner !!}
                </p>
                <p>
                    <strong>创建于:</strong> {!! HTML::ago($event->created_at) !!}
                </p>
                <p>
                    <strong>更新于:</strong> {!! HTML::ago($event->updated_at) !!}
                </p>
                <a class="btn btn-info" href="{!! URL::route('events.edit', array('events' => $event->id)) !!}"><i class="fa fa-pencil-square-o"></i> 修改</a> <a class="btn btn-danger" href="#delete_event" data-toggle="modal" data-target="#delete_event"><i class="fa fa-times"></i> 删除</a>
            </div>
        </div>
    </div>
    <hr>
@endauth
<div class="well clearfix">
    <div class="hidden-xs">
        <div class="col-xs-6">
            <p class="lead">日期: {!! $event->date->format('l jS F Y H:i') !!}</p>
        </div>
        <div class="col-xs-6">
            <div class="pull-right">
                <p class="lead">地点: {!! $event->location !!}</p>
            </div>
        </div>
    </div>
    <div class="visible-xs">
        <div class="col-xs-12">
            <p class="lead">日期: {!! $event->date->format('l jS F Y H:i') !!}</p>
            <p class="lead">地点: {!! $event->location !!}</p>
        </div>
    </div>
    <div class="col-xs-12">
        <hr>
        {!! str_replace('<p>', '<p class="lead">', $event->content) !!}
    </div>
</div>
@stop

@section('bottom')
@auth('edit')
@include('events.delete')
@endauth
@stop
