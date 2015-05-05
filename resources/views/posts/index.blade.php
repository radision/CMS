@extends(Config::get('core.default'))

@section('title')
文章列表
@stop

@section('top')
<div class="page-header">
<h1>文章列表</h1>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-xs-8">
        <p class="lead">
            @if (count($posts) == 0)
                无文章
            @else
                查找文章
            @endif
        </p>
    </div>
    @auth('blog')
        <div class="col-xs-4">
            <div class="pull-right">
                <a class="btn btn-primary" href="{!! URL::route('blog.posts.create') !!}"><i class="fa fa-book"></i> 新文章</a>
            </div>
        </div>
    @endauth
</div>
@foreach($posts as $post)
    <h2>{!! $post->title !!}</h2>
    <p>
        <strong>{!! $post->summary !!}</strong>
    </p>
    <p>
        <a class="btn btn-success" href="{!! URL::route('blog.posts.show', array('posts' => $post->id)) !!}"><i class="fa fa-file-text"></i> 查看</a>
        @auth('blog')
             <a class="btn btn-info" href="{!! URL::route('blog.posts.edit', array('posts' => $post->id)) !!}"><i class="fa fa-pencil-square-o"></i> 修改</a> <a class="btn btn-danger" href="#delete_post_{!! $post->id !!}" data-toggle="modal" data-target="#delete_post_{!! $post->id !!}"><i class="fa fa-times"></i> 删除</a>
        @endauth
    </p>
    <br>
@endforeach
{!! $links !!}
@stop

@section('bottom')
@auth('blog')
    @include('posts.deletes')
@endauth
@stop
