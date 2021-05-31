<div class="row">
    <div class="col-sm-3">

    </div>

    <div class="col-sm-6">
        <br>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <br>
        <div class="card">
            <div class="card-header">
                <h4>Register</h4>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="submit">
                    <div class="form-group">
                        <input type="text" class="form-control" wire:model="form.name" placeholder="Name">
                        @error('form.name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" wire:model="form.email" placeholder="Email">
                        @error('form.email')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" wire:model="form.password" placeholder="Password">
                        @error('form.password')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" wire:model="form.password_confirmation" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary float-right">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
