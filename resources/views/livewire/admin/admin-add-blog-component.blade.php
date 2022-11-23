<div>
    <section>
      <div class="container">
        <div class="row" style="padding: 20px 0">
            <!-- Forms-->
            <div class="col-md-12">
                  @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
            </div>
            <div class="col-md-12 text-right mt-5"  style="margin-bottom: 1em;">
                <a href="{{route('admin.blog')}}" type="button" class="btn btn-info">All Blogs</a>
            </div>
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
                    <button type="submit" class="btn btn-default" wire:click.prevent="addBlog()">Submit</button>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="subtitle">Category</label>
                        <select name="PartySize" class="form-control" wire:model="bcategory_id">
                            <option selected>Select category</option>
                             @foreach($bcategory as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Description</label>
                        <textarea class="form-control" id="desc" placeholder="Description" rows="5"  required wire:model="desc"></textarea>
                    </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

