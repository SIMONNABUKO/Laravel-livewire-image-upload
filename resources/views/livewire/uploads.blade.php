<div>
    <div class="row">

        <div class="col-md-6 ">
            <h5 class="alert text-success">{{$message}}</h5>
            <form enctype="multipart/form-data">
                <input type="text" wire:model="title" class="form-control" placeholder="Image Title">
                @error('title')<span>{{$message}}</span>@enderror
                <br>

                <input type="file" wire:model="image" class="form-control">
                @error('image')<span>{{$message}}</span>@enderror
                <br>


                <textarea class="form-control" wire:model="desc" id="" cols="30"
                    rows="10">Image description here</textarea>
                @error('desc')<span>{{$message}}</span>@enderror

                <button type="submit" class="btn btn-success" wire:click.prevent="upload">Upload Image</button>
            </form>
        </div>
        <div class="col-md-6 mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>

                    @if($uploads->count() > 0)
                    @foreach($uploads as $img)
                    <tr>
                        <th scope="row">{{$img->id}}</th>
                        <td>{{$img->title}}</td>
                        <td><img src="{{Storage::url($img->image)}}" height="100" width="100" alt="Image"></td>
                        <td>{{$img->desc}}</td>
                    </tr>
                    @endforeach
                    @else
                    <p>No images found!</p>
                    @endif


                </tbody>
            </table>
        </div>
    </div>
</div>