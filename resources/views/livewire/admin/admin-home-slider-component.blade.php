<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-6">
                            All Slide
                        </div>

                        <div class="col-6">
                            <a href="{{ route('admin.add.slider') }}" class="btn btn-success cat-button">Add New Slide</a>
                        </div>
                    </div>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message')}}
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td><img src="{{ asset('assets/images/sliders')}}/{{ $slider->image}}" alt="Slider_image" width="90"></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>{{ $slider->price }}</td>
                                <td>{{ $slider->link }}</td>
                                <td>{{ $slider->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>{{ $slider->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.editSlider',['slider_id'=> $slider->id]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" wire:click.prevent="deleteSlide({{ $slider->id }})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>