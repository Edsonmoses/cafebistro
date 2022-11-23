<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.addpage')}}" type="button" class="btn btn-success">Add Page</a>
            </div>
            <div class="col-md-12">
                <table class="table" style="margin-top: 2.5em">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Descriptions</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page )
                        <tr>
                            <td>
                                @php
                                    $images = explode(",",$page->image);
                                @endphp
                                @if (!empty($images[1]))
                                    <img src="{{asset('assets/frontend/img')}}/{{ $images[1] }}" width="60"/>
                                @endif
                            </td>
                            <td>{{ $page->name }}</td>
                            <td class="col-md-6">{{ $page->body }}</td>
                            <td>{{ $page->created_at->diffForHumans()}}</td>
                            <td>
                                    <a href="{{ route('admin.editpage',['slug'=>$page->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this page') || event.stopImmediatePropagation()" wire:click.prevent="deleteProperty({{ $page->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
</div>

