<x-master_admin>
    <h2 class="mt-4 mb-4 ms-4">Edit Post</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<!-- add form -->
<form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="message">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <div class="border p-3 rounded">
            <div class="col-12">
                <label class="form-label">Post Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="col-12">
                <label class="form-label">post Category</label>
               <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif >{{  $category->name  }}</option>
                @endforeach
               </select>
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" cols="30" rows="4" required>{{ $post->description }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Post Image</label>
                <input type="file" accept="image/*" class="form-control" name="thumbail">
                <input type="hidden" name="old_thumbail" value="{{ $post->thumbail }}">
            </div>
            <div class="form-group mb-2">
                <label for="status" class="form-label">
                    <input type="checkbox" value="1" name="status" id="status" @if ($post->status = 1) checked @endif> Status
                </label>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-info">Update now</button>
    </div>
</form>
</x-master_admin>