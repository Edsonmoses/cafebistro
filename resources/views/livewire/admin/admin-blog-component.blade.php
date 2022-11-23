<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.addblog')}}" type="button" class="btn btn-success">Add Blog</a>
                <a href="{{route('admin.blog')}}" type="button" class="btn btn-info">All Blogs</a>
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
                        @foreach ($blogs as $blog )
                        <tr>
                            <td>
                                @if (!empty($blog->image))
                                    <img src="{{asset('assets/frontend/img')}}/{{ $blog->image }}" width="60"/>
                                @endif
                            </td>
                             <td>{{ $blog->name }}</td>
                            <td class="col-md-6">{{ $blog->desc }}</td>
                            <td>{{ $blog->created_at->diffForHumans() }}</td>
                            <td>
                                    <a href="{{ route('admin.editblog',['slug'=>$blog->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this blog') || event.stopImmediatePropagation()" wire:click.prevent="deleteProperty({{ $blog->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
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

