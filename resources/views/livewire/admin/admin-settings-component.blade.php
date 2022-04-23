<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    Admin Settings
                </div>

                <div class="card-body">
                    <form class="row" wire:submit.prevent="saveSettings">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email@example.com" wire:model="email">
                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" placeholder="phone number" wire:model="phone">
                                @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone2" class="form-label">Second Phone</label>
                                <input type="tel" class="form-control" placeholder="+93 (783)-728-301" wire:model="phone2">
                                @error('phone2') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="address, street" wire:model="address">
                                @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="map" class="form-label">Map</label>
                                <input type="text" class="form-control" placeholder="Map" wire:model="map">
                                @error('map') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="twiter" class="form-label">Twiter</label>
                                <input type="twiter" class="form-control" placeholder="Twiter" wire:model="twiter">
                                @error('twiter') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="facebook" class="form-control" placeholder="Facebook" wire:model="facebook">
                                @error('facebook') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="instagram" class="form-control" placeholder="Instagram" wire:model="instagram">
                                @error('instagram') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="youtube" class="form-label">Youtube</label>
                                <input type="youtube" class="form-control" placeholder="You Tube" wire:model="youtube">
                                @error('youtube') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary col-10" style="margin-left: 85px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
