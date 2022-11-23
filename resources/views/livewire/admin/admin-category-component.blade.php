<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.addcategory')}}" type="button" class="btn btn-success">Add Category</a>
            </div>
            <div class="col-md-12">
                <table class="table" style="margin-top: 2.5em">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $category )
                        <tr>
                            <td>
                                @if (!empty($category->image))
                                    <img src="{{asset('assets/frontend/img')}}/{{ $category->image }}" width="60"/>
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <ul>
                                    @foreach ($category->subCategories as $scategory )
                                        <li><i class="fa fa-caret-right"></i>{{ $scategory->name }}<a href="{{ route('admin.editcategory',['slug'=>$category->slug,'scategory'=>$scategory->slug]) }}" style="padding-left: 10px;"><i  class="fa fa-edit fa-1x"></i></a><a href="#" onclick="confirm('Ara you sure, You want to delete this subcategory') || event.stopImmediatePropagation()" wire:click.prevent="deleteScategory({{ $scategory->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                            @if ($scategory->status == 1)
                                            <a href="#" onclick="confirm('Ara you sure, You want to deactive this menu') || event.stopImmediatePropagation()" wire:click.prevent="dectStatus({{ $scategory->id }})" ><i class="fa fa-toggle-off fa-1x text-danger"></i></a>
                                            @else
                                            <a href="#" onclick="confirm('Ara you sure, You want to active this menu') || event.stopImmediatePropagation()" wire:click.prevent="updateStatus({{ $scategory->id }})"><i class="fa fa-toggle-on fa-1x text-success"></i></a>  
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>
                                    <a href="{{ route('admin.editcategory',['slug'=>$category->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this category') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                    @if ($category->status == 1)
                                    <a href="#" onclick="confirm('Ara you sure, You want to deactive this menu') || event.stopImmediatePropagation()" wire:click.prevent="dectStatus({{ $category->id }})"><i class="fa fa-toggle-off fa-1x text-danger"></i></a>
                                    @else
                                      <a href="#" onclick="confirm('Ara you sure, You want to active this menu') || event.stopImmediatePropagation()" wire:click.prevent="updateStatus({{ $category->id }})"><i class="fa fa-toggle-on fa-1x text-success"></i></a>  
                                    @endif
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

