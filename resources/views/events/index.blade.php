@extends(Config::get('core.default'))

@section('title')
Events
@stop

@section('top')
<div class="page-header">
<h1>事件列表</h1>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-xs-8">
        <p class="lead">
            @if (count($events) == 0)
                当前无事件
            @else
                查找:
            @endif
        </p>
    </div>
    @auth('edit')
        <div class="col-xs-4">
            <div class="pull-right">
                <a class="btn btn-primary" href="{!! URL::route('events.create') !!}"><i class="fa fa-calendar"></i> 新事件</a>
            </div>
        </div>
    @endauth
</div>
@foreach($events as $event)
    <h2>{!! $event->title !!}</h2>
    <p>
        <strong>{!! $event->date->format('l jS F Y H:i') !!}</strong>
    </p>
    <p>
        <a class="btn btn-success" href="{!! URL::route('events.show', array('events' => $event->id)) !!}"><i class="fa fa-file-text"></i> 查看</a>
        @auth('edit')
             <a class="btn btn-info" href="{!! URL::route('events.edit', array('events' => $event->id)) !!}"><i class="fa fa-pencil-square-o"></i> 修改</a> <a class="btn btn-danger" href="#delete_event_{!! $event->id !!}" data-toggle="modal" data-target="#delete_event_{!! $event->id !!}"><i class="fa fa-times"></i> 删除</a>
        @endauth
    </p>
    <br>
@endforeach
{!! $links !!}
@stop

@section('bottom')
@auth('edit')
    @include('events.deletes')
@endauth
@stop
