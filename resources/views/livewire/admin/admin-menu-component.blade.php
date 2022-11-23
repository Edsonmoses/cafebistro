<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.addmenu')}}" type="button" class="btn btn-success">Add Menu</a>
                <a href="{{route('admin.menu')}}" type="button" class="btn btn-info">All Menus</a>
            </div>
            <div class="col-md-12">
                <table class="table" style="margin-top: 2.5em">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Descriptions</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu )
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>
                                @if (!empty($menu->image))
                                    <img src="{{asset('assets/frontend/img/menu')}}/{{ $menu->image }}" width="60"/>
                                @endif
                            </td>
                            <td>{{ $menu->name }}</td>
                            <td class="col-md-4">{{ $menu->desc }}</td>
                            <td class="col-md-2">{{ $menu->sub->name }}</td>
                             <td class="col-md-1">{{ $menu->created_at->diffForHumans() }}</td>
                            <td>
                                    <a href="{{ route('admin.editmenu',['slug'=>$menu->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this special') || event.stopImmediatePropagation()" wire:click.prevent="deleteMenu({{ $menu->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                    @if ($menu->status == 1)
                                    <a href="#" onclick="confirm('Ara you sure, You want to deactive this menu') || event.stopImmediatePropagation()" wire:click.prevent="dectStatus({{ $menu->id }})" style="margin:0 10px 0 10px"><i class="fa fa-toggle-off fa-1x text-danger"></i></a>
                                    @else
                                      <a href="#" onclick="confirm('Ara you sure, You want to active this menu') || event.stopImmediatePropagation()" wire:click.prevent="updateStatus({{ $menu->id }})" style="margin:0 10px 0 10px"><i class="fa fa-toggle-on fa-1x text-success"></i></a>  
                                    @endif
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $menus->links()}}
                <br/><br/>
            </div>
        </div>
      </div>
    </section>
</div>

