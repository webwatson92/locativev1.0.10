<div>
    selected : {{ $modelId }}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Title</label>
        <input type="title" wire:model="title" required class="form-control">
        @if($errors->has('title'))
            <p style="color:red">{{$errors->first('title')}}</p>
        @endif
        <label class="control-label">Content</label>
        <textarea wire:model="content" required class="form-control"></textarea>
        @if($errors->has('content'))
            <p style="color:red">{{$errors->first('content')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>