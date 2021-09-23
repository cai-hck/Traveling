@extends('admin.layout.default')


@section('content')
{{-- Tables --}}
<div class="row">
    <!-- With Action-->
    <div class="col s12">
        <div class="card-panel">
            <div class="row box-title">
                <div class="col s12">
                    <h5 class="content-headline">Area Table</h5>
                    <p>You can Create, Edit and Delete.</p>
                </div>
                <a class="btn-floating btn-large waves-effect waves-light red goodmodel" href="#modal1" data-target="modal1"><i class="material-icons">add</i></a>
                <!-- Modal Structure -->
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="datatable-wrapper">
                        <table class="datatable-badges display cell-border" style="text-align:center">
                            <thead>
                            <tr>
                                <th>Package Reference ID</th>
                                <th>Provider</th>
                                <th>boughter</th>
                                <th>NU of Adult</th>
                                <th>NU of Child</th>
                                <th>NU of Infant</th>
                                <th>NU of Child with Bed</th>
                                <th>Adult Money</th>
                                <th>Child Money</th>
                                <th>Infant Money</th>
                                <th>Child Bed Money</th>
                                <th>Singal Money</th>
                                <th>Total Money</th>
                                <th>Created Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{$appointment->package_id }}</td>
                                        <td>{{$appointment->travel_agency_name }}</td>
                                        <td>{{$appointment->name }}</td>
                                        <td>{{$appointment->adult}}<?php if($appointment->single == 'on') { echo'(Single)';} ?></td>
                                        <td>{{$appointment->child}}</td>
                                        <td>{{$appointment->infant}}</td>
                                        <td>{{$appointment->childbed}}</td>
                                        <td>{{$appointment->price_adult}}</td>
                                        <td>{{$appointment->price_child}}</td>
                                        <td>{{$appointment->price_infant}}</td>
                                        <td>{{$appointment->price_childbed}}</td>
                                        <td>{{$appointment->price_single}}</td>
                                        <?php 
                                        $money1 = $appointment->adult *  $appointment->price_adult; 
                                        $money1 += $appointment->child *  $appointment->price_child; 
                                        $money1 += $appointment->infant *  $appointment->price_infant; 
                                        $money1 += $appointment->childbed *  $appointment->price_childbed;
                                        if($appointment->single == 'on') 
                                            $money1 = $appointment->price_single; 
                                        ?>
                                        <td>{{$money1}}</td>
                                        <td>{{Carbon\Carbon::parse($appointment->created_at)->format('d-m-Y H:i:s')}}</td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsPostApp')        

<script>
    $(document).ready(function() {
		$('select[name=DataTables_Table_0_length]').show();
	});
    $('.datatable-badges').DataTable({
        columnDefs: [{
            width: '5%',
            targets: [0]
        }, {
            width: '10%',
            targets: [1]
        },{
            width: '10%',
            targets: [2]
        },{
            width: '5%',
            targets: [3]
        },{
            width: '5%',
            targets: [4]
        },{
            width: '5%',
            targets: [5]
        },{
            width: '5%',
            targets: [6]
        },{
            width: '5%',
            targets: [7]
        },{
            width: '5%',
            targets: [8]
        },{
            width: '5%',
            targets: [9]
        },{
            width: '5%',
            targets: [10]
        },{
            width: '5%',
            targets: [11]
        },{
            width: '5%',
            targets: [12]
        },{
            width: 'auto',
            targets: [13]
        }]
    });
</script>
@endsection
