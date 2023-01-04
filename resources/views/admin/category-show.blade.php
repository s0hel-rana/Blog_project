<x-master_admin>
    <section style="padding-top: 60px;">
        <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="panel panel-default">
                         <div class="card-header">
                             <div class="row">
                                 <div class="col-md-6">
                                     <h3 class="btn btn-info">Create Category</h3>
                                 </div>
                                 <div class="col-md-6">
                                     <a href="{{ route('category.index') }}" class="btn btn-success pull-right">All Category</a>
                                 </div>
                             </div>
                         </div>
                         <div class="card-body">
                             <p><b> Category Name : </b>{{ $category->name }}</p>
                             <p><b> Description : </b>{{ $category->description }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </section>
</x-master_admin>