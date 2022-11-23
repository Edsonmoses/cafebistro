<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.addteam')}}" type="button" class="btn btn-success">Add Team</a>
            </div>
            <div class="col-md-12">
                <table class="table" style="margin-top: 2.5em">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team )
                        <tr>
                            <td>
                                @if (!empty($team->image))
                                    <img src="{{asset('assets/frontend/img/team')}}/{{ $team->image }}" width="60"/>
                                @endif
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->created_at->diffForHumans() }}</td>
                            <td>
                                    <a href="{{ route('admin.editteam',['slug'=>$team->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this team') || event.stopImmediatePropagation()" wire:click.prevent="deleteteam({{ $team->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                    @if ($team->status == 1)
                                    <a href="#" onclick="confirm('Ara you sure, You want to deactive this team') || event.stopImmediatePropagation()" wire:click.prevent="dectStatus({{ $team->id }})"><i class="fa fa-toggle-off fa-1x text-danger"></i></a>
                                    @else
                                      <a href="#" onclick="confirm('Ara you sure, You want to active this team') || event.stopImmediatePropagation()" wire:click.prevent="updateStatus({{ $team->id }})"><i class="fa fa-toggle-on fa-1x text-success"></i></a>  
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

