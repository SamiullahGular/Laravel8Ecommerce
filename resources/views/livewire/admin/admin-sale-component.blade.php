<div>
    <div class="container p-5 admin-con">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="card-title col-6">
                                Sale Setting
                            </div>

                            <div class="col-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success cat-button">All Products</a>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message')}}
                    </div>
                    @endif
                    <div class="card-body">
                        <form class="form" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sale-date" class="form-label">Sale Date</label>
                                <div class="form-control">
                                    <input type="text" class="sale-date" wire:model="sale_date" disabled>
                                    <input type="datetime-local" class="sale-date float-right" wire:model="sale_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>