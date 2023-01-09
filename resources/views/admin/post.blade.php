<x-master_admin>
    
    <h2 class="mt-4 ms-4 mb-4">All Posts</h2>
 
 <!-- message -->
 @if(session()->has('message'))
 <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
 @elseif(session()->has('error'))
 <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
 @endif
 <!-- end-message -->
 
 <div class="card mb-4">
     <div class="card-header d-flex justify-content-between">
         <span>
         </span>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post">Create New Post</button>
         <!-- Modal -->
         <div class="modal fade" id="post" tabindex="-1" aria-labelledby="postLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="postLabel">Create New post</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <!-- add form -->
                     <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
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
                                     <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                 </div>
                                 <div class="col-12">
                                    <label class="form-label">post Category</label>
                                   <select name="category_id" class="form-control">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{  $category->name  }}</option>
                                    @endforeach
                                   </select>
                                </div>
 
                                 <div class="col-12">
                                     <label class="form-label">Description</label>
                                     <textarea class="form-control" name="description" cols="30" rows="4" required>{{ old('description') }}</textarea>
                                 </div>
                                 <div class="form-group mb-2">
                                    <label for="thumbnail" class="form-label">Post Image</label>
                                    <input type="file" accept="image/*" class="form-control" name="thumbail" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="status" class="form-label">
                                        <input type="checkbox" value="1" name="status" id="status"> Status
                                    </label>
                                </div>
 
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Submit now</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- table -->
     <div class="card-body">
         <table id="datatablesSimple">
             <thead>
                 <tr>
                     <th>SN</th>
                     <th>Post Title</th>
                     <th>Post Category</th>
                     <th>Description</th>
                     <th>Post Image</th>
                     <th>Status</th>
                     <th>Action</th>
                 </tr>
             </thead>
 
             <tbody>
                 @forelse ($posts as $key=>$post)
                 <tr>
                     <td>{{ $key+1 }} </td>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->category->name }}</td>
                     <td>{{ $post->description }}</td>
                     <td>
                        <img src="{{ asset('thumbail_image/' .$post->thumbail)  }}" alt="image" style="width: 5rem">
                     </td>
                     <td>{{ $post->status }}</td>
 
                     <td>
                         <a class="btn btn-success" href="{{ route('post.edit', $post->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                         <a class="btn btn-success" href="{{ route('post.show', $post->id) }}" style="font-size:13px"><i class="fa fa-eye" aria-hidden="true"></i></a>
                         <a class="btn btn-danger" href="{{ route('post.delete',$post->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                 </tr>
                 @empty
                 <p class="text-danger text-center">No post available</p>
                 @endforelse
             </tbody>
         </table>
     </div>
 </div>
 
 </x-master_admin>