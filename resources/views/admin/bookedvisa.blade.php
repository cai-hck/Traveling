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
                                <th>Country</th>
                                <th>NU of Person</th>
                                <th>Person Money</th>
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
                                        <td>{{$appointment->country}}</td>
                                        <td>{{$appointment->adult}}</td>
                                        <td>{{$appointment->cost}}</td>
                                        <?php 
                                        $money1 = $appointment->adult *  $appointment->price_adult; 
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
            width: '10%',
            targets: [0]
        }, {
            width: '20%',
            targets: [1]
        },{
            width: '20%',
            targets: [2]
        },{
            width: '10%',
            targets: [3]
        },{
            width: '10%',
            targets: [4]
        },{
            width: '10%',
            targets: [5]
        },{
            width: '10%',
            targets: [6]
        },{
            width: 'auto',
            targets: [7]
        }]
    });
</script>
@endsection
