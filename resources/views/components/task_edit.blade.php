<form wire:submit.prevent="save">
    <div wire:ignore.self class="modal fade" id="edit_task" tabindex="-1" role="dialog" aria-labelledby="edit_task" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ isset($editing->id) ? 'Edit': 'Create New' }} Task <strong>{{ isset($editing->id) ? $editing->name : '' }}</strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    @include('components.flashes')

                    <div class="form-group row">
                        <label for="editing.name" class="col-12">Name</label>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-font"></i></span>
                                </div>

                                <input wire:model.lazy="editing.name" id="editing.name" type="text" class="form-control" required>
                            </div>

                            @error('editing.name')
                                <div class="error invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="editing.description" class="col-12">Description</label>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                </div>

                                <textarea wire:model.lazy="editing.description" class="form-control" required></textarea>
                            </div>

                            @error('editing.description')
                                <div class="error invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="editing.name" class="col-12">Due Date</label>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                </div>

                                <input wire:model.lazy="editing.due_date" type="date" min="{{ date('Y-m-d') }}" class="form-control" required>
                            </div>

                            @error('editing.due_date')
                                <div class="error invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
