
    <table class="table table-striped" id="events-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Bus Plate No</th>
            <th>Ticket NO</th>
            <th>Date</th>
            <th>Seat No</th>
        </tr>

        </thead>
        <tbody>
        @foreach( $passengers as $passenger)
        <tr>
            
            <td>{!! $loop->iteration !!}</td>
            <td>{!! $passenger->full_name !!}</td>
            <td>{!! $passenger->gender !!}</td>
            <td>{!! $passenger->mobile_phone !!}</td>
            <td>{!! $passenger->origin !!}</td>
            <td>{!! $passenger->destination !!}</td>
            <td>{!! $passenger->bus_plate_number !!}</td>
            <td>{!! $passenger->ticket_id !!}</td>
            <td>{!! \Carbon\Carbon::parse($passenger->created_at)->format('d-M-y H:m') ?? '' !!}</td>
            <td>{!! $passenger->seat_number !!}</td>

            
        </tr>
        @endforeach
        </tbody>
    </table>