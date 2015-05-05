@foreach ($events as $event)
    <div id="delete_event_{!! $event->id !!}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">确信要删除这些事件吗?</h4>
                </div>
                <div class="modal-body">
                    <p>您正准备删除多个事件，这个操作是不能撤消的</p>
                    <p>确信要继续此操作吗?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="{!! URL::route('events.destroy', array('events' => $event->id)) !!}" data-token="{!! Session::getToken() !!}" data-method="DELETE">是的</a>
                    <button class="btn btn-danger" data-dismiss="modal">反悔了</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
