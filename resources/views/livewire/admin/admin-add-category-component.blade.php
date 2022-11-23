<div>
    <section>
      <div class="container">
        <div class="row" style="padding: 20px 0">
             <div class="col-md-12">
                 <a class="btn btn-info pull-right" style="margin: 10px 0 0 0" href="{{ route('admin.category') }}">All Categories</a>
               @if (Session::has('message'))
                    <div class="alert alert-success col-md-7" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <!-- Forms-->
            <div class="col-md-6">
                 
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" required wire:model="name" wire:keyup="generateSlug">
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" required wire:model="image">
                        @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default" wire:click.prevent="addCategory()">Submit</button>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Slug" required wire:model="name"/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Parent category</label>
                       <select name="category" class="form-control" wire:model="category_id">
                            <option value="" selected>None</option>
                            @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

