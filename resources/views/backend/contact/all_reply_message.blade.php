@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Message</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Admin Name</th>
                            <th>Message</th>
                            <th>Reply Message</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($ReplyMessage as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                
                                <td>{{ $item['User']['name'] }}</td>
                                <td>{{ $item->admin }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->replymessage }}</td>
                                
                                <td>
                                    <a href="{{route('delete.replymessage',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Admin Name</th>
                            <th>Message</th>
                            <th>Reply Message</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection