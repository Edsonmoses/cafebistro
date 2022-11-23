<div>
    <section>
      <div class="container">
        <div class="row" style="padding: 20px 0">
           <div class="col-md-12">
              <a class="btn btn-info pull-right" style="margin: 10px 0 0 0" href="{{ route('admin.menu') }}">All Menus</a>
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
                        <label for="category">Category</label>
                        <select name="category" class="form-control" wire:model="subcategory_id">
                            <option selected>Select category</option>
                             @foreach($scategories as $scategory)
                                <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" required wire:model="newimage">
                        @if($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                        @else
                            <img src="{{asset('assets/frontend/img/menu')}}/{{ $image }}" width="120"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default" wire:click.prevent="updateMenu()">Update</button>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Price"  required wire:model="price">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" placeholder="Description" rows="5"  required wire:model="desc"></textarea>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

