<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {{-- <form action="{{ route('add-post') }}" id="form-create" method="POST" role="form"> --}}
                <div class="modal-body">
                    
                        {{-- @csrf --}}
                        <fieldset class="form-group">
                            <label>Name</label>
                            <input class="form-control" id="add-name" name="_name" placeholder="name">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Password</label>
                            <input class="form-control" id="add-password" name="_password" >
                        </fieldset>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="add()"  class="btn btn-primary">thêm</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
