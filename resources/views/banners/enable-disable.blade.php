
<div id="banner-{{$banner->id}}" class="modal curtain" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if (!$banner->deleted_at)
                        Disable banner
                    @else
                        Enable banner
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (!$banner->deleted_at)
                    <p>Do you want to disable the banner <strong>{{$banner->title}}</strong></p>    
                @else
                <p>Do you want to enable the banner <strong>{{$banner->title}}</strong></p>
                @endif
                
            </div>
            <div class="modal-footer">
                <form action="{{route('banners.destroy', $banner->id)}}" method="POST" novalidate="">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">{{!$banner->deleted_at ? 'Disable' : 'Enable'}}</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>