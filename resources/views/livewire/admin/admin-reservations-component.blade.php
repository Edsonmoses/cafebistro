<div>
    <section>
      <div class="container">
        <div class="row">
            <!-- Tables demo-->
            <div class="col-md-12 text-right mt-5"  style="margin-top: 2.5em">
                <a href="{{route('admin.reservations')}}" type="button" class="btn btn-info">All Reservations</a>
            </div>
            <div class="col-md-12">
                <table class="table" style="margin-top: 2.5em">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Email</th>
                            <th>Guest</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation )
                        <tr>
                            <td>
                                {{ $reservation->datepicker }}
                            </td>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->timepicker }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->guests }}</td>
                            <td>
                                    <a href="{{ route('admin.editreservations',['slug'=>$reservation->name]) }}"><i  class="fa fa-eye fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this reservation') || event.stopImmediatePropagation()" wire:click.prevent="deleteProperty({{ $reservation->id }})" style="margin:0 10px 0 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
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

