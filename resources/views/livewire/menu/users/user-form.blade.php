<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="saveuser" autocomplete="off">
        <label class="control-label">Nom</label>
        <input type="text" wire:model="name" required class="form-control">
        @if($errors->has('name'))
            <p style="color:red">{{$errors->first('name')}}</p>
        @endif
        <label class="control-label">Email</label>
        <input type="text" wire:model="email" required class="form-control">
        @if($errors->has('email'))
            <p style="color:red">{{$errors->first('email')}}</p>
        @endif <br>
        <label for="role">Rôle</label>
        <select class="form-control" id="role" wire:model="role">
            <option value="admin">Admin</option>
            <option value="superadmin">Super admin</option>
        </select>
        <label for="password">Mot de passe</label>
        <input type="password" required="required" class="form-control" wire:model="password" placeholder="Mot de passe"> 
        @if($errors->has('password'))
            <p style="color:red">{{$errors->first('password')}}</p>
        @endif <br>
        @if($errors->has('role'))
            <p style="color:red">{{$errors->first('role')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>