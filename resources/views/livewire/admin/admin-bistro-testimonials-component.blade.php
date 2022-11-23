<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.addtestimonil')}}" type="button" class="btn btn-success">Add Testimonil</a>
            </div>
            <div class="col-md-12">
                <table class="table" style="margin-top: 2.5em">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonils as $testimony )
                        <tr>
                            <td>
                               {{$testimony->id}}
                            </td>
                            <td>{{ $testimony->name }}</td>
                            <td>{{ $testimony->created_at->diffForHumans() }}</td>
                            <td>
                                    <a href="{{ route('admin.edittestimonil',['slug'=>$testimony->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this testimony') || event.stopImmediatePropagation()" wire:click.prevent="deletetestimony({{ $testimony->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                    @if ($testimony->status == 1)
                                    <a href="#" onclick="confirm('Ara you sure, You want to deactive this testimony') || event.stopImmediatePropagation()" wire:click.prevent="dectStatus({{ $testimony->id }})"><i class="fa fa-toggle-off fa-1x text-danger"></i></a>
                                    @else
                                      <a href="#" onclick="confirm('Ara you sure, You want to active this testimony') || event.stopImmediatePropagation()" wire:click.prevent="updateStatus({{ $testimony->id }})"><i class="fa fa-toggle-on fa-1x text-success"></i></a>  
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

