<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Reference Booking Number</th>
        <th>Package ID</th>
        <th>Company name(Provide)</th>
        <th>Company name(Appointment)</th>
        <th>Date of booking</th>
        <th>Name of persons</th>
        <th>Sex</th>
        <th>Person type</th>
        <th>Price</th>
        <th>Passport Number</th>
        <th>DOB</th>
        <th>Airline</th>
        <th>Airline</th>
        <th>Airport</th>
        <th>Destination Country</th>
        <th>Destination City</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>
    @foreach($appointments as $row)
        <?php $count++; ?>
        <tr>
            <td>{{$count}}</td>
            <td>{{$row->id}}</td>
            <td>{{$row->package_id}}</td>
            <td>{{$row->travel_agency_name}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->first_name}} / {{$row->ln}}</td>
            <td>{{$row->sex}}</td>
            <td>{{$row->type}}</td>
            <?php if($row->type == 'adult'){?>
            <td>{{$row->adult}}</td>
            <?php }else if($row->type == 'child'){?>
            <td>{{$row->child}}</td>
            <?php }else if($row->type == 'infant'){?>
            <td>{{$row->infant}}</td>
            <?php }else if($row->type == 'room'){?>
            <td>{{$row->room}}</td>
            <?php }else if($row->type == 'single'){?>
            <td>{{$row->single}}</td>
            <?php }else if($row->type == 'child&bed'){?>
            <td>{{$row->childbed}}</td>
            <?php }else if($row->type == 'adult&business'){?>
            <td>{{$row->o_adult_b}}</td>
            <?php }else if($row->type == 'child&business'){?>
            <td>{{$row->o_child_b}}</td>
            <?php }else{?>
            <td>0</td>
            <?php }?>
            <td>{{$row->pssport_no}}</td>
            <td>{{$row->day_of_birth}}</td>
            <td>{{$row->airline}}</td>
            <td>{{$row->airline_1}}</td>
            <td>{{$row->o_country}} / {{$row->o_city}}</td>
            <td>{{$row->country}}</td>
            <td>{{$row->city}}</td>
        </tr>
    @endforeach
     </tbody>
</table>