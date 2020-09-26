<div id="{{ $id }}" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:500px" data-always-visible="1" data-rail-visible1="1">
                    {{ $inputs }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                <button type="button" class="btn green {{ $classProvider }}" >Save</button>
            </div>
        </div>
    </div>
</div>

