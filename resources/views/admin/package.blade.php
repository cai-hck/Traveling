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
                                <th>Company Name</th>
                                <th>Package Reference ID</th>
                                <th>Days</th>
                                <th>Money</th>
                                <th>Created Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{$package->travel_agency_name }}</td>
                                        <td>{{$package->id }}</td>
                                        <td>{{$package->day }}</td>
                                        <?php if($package->special == 'special'){
                                                    if($package->day == 'one')
                                                    {
                                                        $money1 = 5;
                                                    }
                                                    else if($package->day == 'two')
                                                    {
                                                        $money1 = 8;
                                                    }
                                                    else if($package->day == 'three')
                                                    {
                                                        $money1 = 12;
                                                    }
                                        }?>
                                        <td>{{$money1}}</td>
                                        <td>{{Carbon\Carbon::parse($package->created_at)->format('d-m-Y H:i:s')}}</td>
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
            width: '20%',
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
            width: 'auto',
            targets: [4]
        }]
    });
</script>
@endsection
