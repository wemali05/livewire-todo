<div class="form-container">
    <form wire:submit.prevent="save" method="post">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" wire:model="form.todo_id" >
                <label for="">Title</label>
                <input type="text" class="form-control" wire:model="form.title" >
                @error('title')
                    <label class="error">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <label for="">Description</label>
                <textarea rows="3" class="form-control" wire:model="form.desc" ></textarea>
                @error('desc')
                    <label class="error">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <label for="">Task Status</label>
                <select class="form-control" wire:model="form.status" >
                    <option value="">Choose One</option>
                    <option value="pending">Task Pending</option>
                    <option value="accomplished">Task Accomplished</option>
                </select>
                @error('status')
                    <label class="error">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-md" >{{ $submit_btn_title }}</button>
            </div>
        </div>
    </form>
</div>
