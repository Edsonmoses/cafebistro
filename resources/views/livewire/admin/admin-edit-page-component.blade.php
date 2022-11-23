<div>
    <section>
      <div class="container">
        <div class="row" style="padding: 20px 0">
            <div class="col-md-12">
                 <a class="btn btn-info pull-right" style="margin: 10px 0 0 0" href="{{ route('admin.page') }}">All Pages</a>
                    @if (Session::has('message'))
                            <div class="alert alert-success col-md-7" role="alert">{{ Session::get('message') }}</div>
                        @endif
                </div>
            <!-- Forms-->
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" required wire:model="name" wire:keyup="generateslug">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" placeholder="Sub Title"  required wire:model="title">
                    </div>
                    <div class="form-group">
                        <label for="newimage">Image</label>
                        <input type="file" id="newimage" multiple  required wire:model="newimage">
                        @if($newimage)
                            @foreach ($newimage as $images )
                                <img src="{{ $images->temporaryUrl() }}" width="120"/>
                            @endforeach 
                             @else
                                 @php
                                $images = explode(",",$image);
                                @endphp
                                @if (!empty($images[1]))
                                <img src="{{asset('assets/frontend/img')}}/{{ $images[1] }}" width="120"/>
                                @endif
                            @endif
                            
                       
                    </div>
                    <button type="submit" class="btn btn-default" wire:click.prevent="addPage()">Update</button>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <textarea class="form-control" id="title" placeholder="Name" rows="5"  required wire:model="body"></textarea>
                    </div>
                     <div class="form-group">
                        <label for="newsignature">Signature</label>
                        <input type="file" id="newsignature"  required wire:model="newsignature">
                        @if($newsignature)
                            <img src="{{ $newsignature->temporaryUrl() }}" width="120"/>
                        @else
                            @if ($signature = 'favicon.ico')
                            @else
                                <img src="{{asset('assets/frontend/img')}}/{{ $signature }}" width="120"/>
                            @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Category</label>
                       <select name="category" class="form-control" wire:model="pcategory_id">
                            <option value="" selected>None</option>
                            @foreach ($pcategories as $category )
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>

