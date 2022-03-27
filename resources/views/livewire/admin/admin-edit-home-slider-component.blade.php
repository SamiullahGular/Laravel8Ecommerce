<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-md-6">
                            Edit Slide
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('admin.slider') }}" class="btn btn-success cat-button">All Slides</a>
                        </div>
                    </div>
                </div>
                <form class="card-body col-8" wire:submit.prevent="updateSlide()">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Title" wire:model="title">
                    </div>

                    <div class="form-group">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control" placeholder="Subtitle" wire:model="subtitle">
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" placeholder="00.0" wire:model="price">
                    </div>

                    <div class="form-group">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" placeholder="Link" wire:model="link">
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" wire:model="newImage">
                        @if($newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" width="120px">
                        @else
                            <img src="{{ asset('assets/images/sliders') }}/{{$image}}" alt="" width="120">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" wire:model="status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>