<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Reference Booking Number</th>
        <th>Company name(Provide)</th>
        <th>Company name(Appointment)</th>
        <th>Date of booking</th>
        <th>Number of persons</th>
        <th>price per persons</th>
        <th>Number of persons(special)</th>
        <th>price per persons</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>
    @foreach($appointments as $row)
        <?php $count++; ?>
        <tr>
            <td>{{$count}}</td>
            <td>{{$row->id}}</td>
            <td>{{$row->travel_agency_name}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->adult}}</td>
            <td>{{$row->cost}}</td>
            <td>{{$row->child}}</td>
            <td>{{$row->cost_1}}</td>
            <td><?php if($row->current == 'on'){echo 'Approved';}else if($row->current == 'not'){echo 'Not_Approved';}else{ echo 'Pending';}?></td>
        </tr>
    @endforeach
     </tbody>
</table>