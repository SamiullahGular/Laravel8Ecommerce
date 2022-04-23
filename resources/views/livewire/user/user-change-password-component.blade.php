<div class="container p-5 admin-con">
    <div class="card">
        <div class="card-header text-dark" style="background-color: rgb(61, 177, 231)">
            Change Password
        </div>

        <div class="card-body">
            @if(Session::has('password_success'))
                <div class="alert alert-success">{{ Session::get('password_success')}}</div>
            @endif
            @if(Session::has('password_error'))
                <div class="alert alert-danger">{{ Session::get('password_error')}}</div>
            @endif
            <form class="form" wire:submit.prevent="changePassword">
                <div class="mb-3 row">
                    <label for="" class="col-md-2 col-form-label">Current Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="current password" name="current_password" wire:model='current_password'>
                        @error('current_password')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-md-2 col-form-label">New Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="new password" name="password" wire:model="password">
                        @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-md-2 col-form-label">Confirm Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="confirm password" name="password_confirmation" autocomplete="password" wire:model='password_confirmation'>
                        @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-outline-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
