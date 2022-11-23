<div>
    <section>
      <div class="container">
        <div class="row" style="padding: 20px 0">
             <div class="col-md-12">
                 <a class="btn btn-info pull-right" style="margin: 10px 0 0 0" href="{{ route('admin.team') }}">All Teams</a>
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
                        <label for="newimage">Image</label>
                        <input type="file" id="newimage" required wire:model="newimage">
                        @if($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                        @else
                        <img src="{{asset('assets/frontend/img/team')}}/{{ $image }}" width="120"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default" wire:click.prevent="updateTeam()">Update</button>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" placeholder="Position" required wire:model="position"/>
                    </div>
                    <div class="form-group">
                        <label for="social">Social</label>
                        <input type="text" class="form-control" id="social" placeholder="Social" required wire:model="social"/>
                    </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

