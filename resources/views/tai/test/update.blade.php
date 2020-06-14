{{-- @include('update') --}}
@foreach ($repo as $item)
<div class="modal fade" id="modal-edit{{ $item->guid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('update-post') }}" method="POST" role="form">
                @csrf
                <div class="modal-body">
                    
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <input type="hidden" name="guid" value="{{ $item->guid }}">
                            <fieldset class="form-group">
                                <label>Text Input with Placeholder</label>
                                <input class="form-control" value="{{ $item->guid }}">
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Text area</label>
                                <textarea name="name" class="form-control" rows="3">{{ $item->name }}</textarea>
                            </fieldset>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    {{-- <button type="reset" class="btn btn-primary">Làm Lại</button> --}}
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
{{--  end update  --}}