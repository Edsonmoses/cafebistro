<div>
    <section>
      <div class="container">
        <div class="row" style="padding: 20px 0">
              <div class="col-md-12">
                 <a class="btn btn-info pull-right" style="margin: 10px 0 0 0" href="{{ route('admin.testimonil') }}">All Testimonils</a>
               @if (Session::has('message'))
                    <div class="alert alert-success col-md-7" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <!-- Forms-->
           <div class="col-md-12">
                 
                <form>
                    <div class="form-group col-md-6" style="margin-left: -15px">
                        <label for="image">Background Image</label>
                        <input type="file" id="image" required wire:model="image">
                        @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default" wire:click.prevent="addBgImage()" style="margin-left: -24%; margin-top: 2.7%;">Add</button>
                </form>
            </div>
            <div class="col-md-6">
                 
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" required wire:model="name" wire:keyup="generateSlug">
                    </div>
                    
                    <div class="form-group">
                        <label for="position">City</label>
                        <input type="text" class="form-control" id="position" placeholder="Position" required wire:model="position"/>
                    </div>
                    <button type="submit" class="btn btn-default" wire:click.prevent="addtestimonils()">Submit</button>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" placeholder="Description" rows="5"  required wire:model="desc"></textarea>
                    </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

