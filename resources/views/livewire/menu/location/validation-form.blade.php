<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Validation</label>
        <input type="checkbox" wire:model="option_validation" class="switch-input" checked="true">
        @if($errors->has('option_validation'))
            <p style="color:red">{{$errors->first('option_validation')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary"  style="padding-top: 20px" >Enregistrer</button>
    </form>
</div>