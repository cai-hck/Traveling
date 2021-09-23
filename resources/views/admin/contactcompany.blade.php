@extends('admin.layout.default')


@section('content')

{{-- Tables --}}
<div class="row">
    <!-- With Action-->
    <div class="col s12">
        <div class="card-panel">
            <div class="row box-title">
                <div class="col s12">
                    <h5 class="content-headline">Contact Us Form Table</h5>
                    <p>You can Delete.</p>
                </div>
                <!-- Modal Structure -->
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="datatable-wrapper">
                        <table class="datatable-badges display cell-border" style="text-align:center">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Name(company)</th>
                                <th>Phone Number(company)</th>
                                <th>Status</th>
                                <th>Created Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactcompanies as $contactcompany)
                                    <tr>
                                        <td>{{$contactcompany->first_name }}</td>
                                        <td>{{$contactcompany->email }}</td>
                                        <td>{{$contactcompany->travel_agency_name }}</td>
                                        <td>{{$contactcompany->travel_agency_phone_number }}</td>
                                        <td>{{$contactcompany->status }}</td>
                                        <td>{{Carbon\Carbon::parse($contactcompany->created_at)->format('d-m-Y H:i:s')}}</td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="btn-floating warning-bg makemodal2" href="#modal2" data-target="modal2">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <input type="hidden" value="{{$contactcompany->id}}">
                                                <input type="hidden" value="{{$contactcompany->message}}">
                                                <a class="btn-floating error-bg" onclick="return confirm('Are you sure?')" href="{{ url('/admin/deletecontactcompany/'.$contactcompany->id)}}">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
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

<div id="modal2" class="modal modal-fixed-footer" style="height: 500px;">
    <form action="{{ url('admin/editcontactcompany') }}" method="POST">
        <div class="modal-content">
            <h4>Text</h4>
            <input type="hidden" id="editid" name="id" placeholder="" requried>
            <div class="input-field informatic-input col s12">
                <textarea class="validate" type="text" id="editcontactus"  style="height:330px" requried>
                </textarea>
            </div>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">Checked</button>
        </div>
    </form>
</div>
@endsection

@section('jsPostApp')        

<script>
    $(document).ready(function() {
		$('select[name=DataTables_Table_0_length]').show();
	});
    $('.makemodal2').on('click',function(){
        $('#editid').val($(this).next().val());
        $('#editcontactus').val($(this).next().next().val());
    });
    $('.modal').modal();
    $('.datatable-badges').DataTable({
        columnDefs: [{
            width: '15%',
            targets: [0]
        }, {
            width: '15%',
            targets: [1]
        },{
            width: '15%',
            targets: [2]
        },{
            width: '15%',
            targets: [3]
        },{
            width: '15%',
            targets: [4]
        },{
            width: '15%',
            targets: [5]
        },{
            width: 'auto',
            targets: [6]
        }]
    });
</script>
@endsection
