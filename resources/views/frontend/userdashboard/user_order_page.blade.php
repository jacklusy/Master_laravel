@extends('min_dashboard')
@section('UserDach')
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Your Orders</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" style="background:#ddd;font-weight: 600;" >
                <thead>
                    <tr>
                        <th>Sl</th>
                            <th>Date</th>
                            <th>Totaly</th>
                            <th>Invoice</th>
                            <th>Status</th>
                            <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $key=> $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>${{ $order->amount }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>
                                @if($order->status == 'pending')

                                    <span class="badge rounded-pill bg-warning">Pending</span>

                                @elseif($order->status == 'deliverd')

                                    <span class="badge rounded-pill bg-success">Deliverd</span>
                                
                                @if($order->return_order == 1)
                                <span class="badge rounded-pill " style="background:red;">Return</span>
                                @endif
                                
                                @endif
                                
                            </td>

                            <td>
                                <a href="{{ url('user/order_details/'.$order->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
                                <a href="#" class="btn-sm btn-danger"><i class="fa fa-download"></i> Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


