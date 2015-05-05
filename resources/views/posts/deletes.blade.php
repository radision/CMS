@foreach ($posts as $post)
    <div id="delete_post_{!! $post->id !!}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">确信要删除文章?</h4>
                </div>
                <div class="modal-body">
                    <p>您正在删除这些文章，这个操作是不能回退的</p>
                    <p>确信要继续此操作?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="{!! URL::route('blog.posts.destroy', array('posts' => $post->id)) !!}" data-token="{!! Session::getToken() !!}" data-method="DELETE">是的</a>
                    <button class="btn btn-danger" data-dismiss="modal">后悔了</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
