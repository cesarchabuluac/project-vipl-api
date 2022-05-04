
<div id="user-{{$user->id}}" class="modal curtain" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if ($user->active)
                        Disable User
                    @else
                        Enable User
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($user->active)
                    <p>Do you want to disable the user <strong>{{$user->name}}</strong></p>    
                @else
                <p>Do you want to enable the user <strong>{{$user->name}}</strong></p>
                @endif
                
            </div>
            <div class="modal-footer">
                <form action="{{route('user-mobile.destroy', $user->id)}}" method="POST" novalidate="">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">{{$user->active ? 'Disable' : 'Enable'}}</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>