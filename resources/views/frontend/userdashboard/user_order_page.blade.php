@extends('min_dashboard')
@section('UserDach')
    
    <div class="card transparent">
        <div class="table mb-0" >
            <div class="">
                <div class="flexTable backtable">
                    <div>Invoice</div>
                    <div>Totaly</div>
                    <div>Status</div>
                    <div>Order Details</div>
                </div>
                
            </div>
            <div class="">

                @foreach ($orders as $key=> $order)
                    
                    <div class="border2">
                        <div>{{ $order->created_at }}</div>
                        <div><a href="{{ url('user/invoice_download/'.$order->id) }}" class="btn-sm download"><i class="fa fa-download"></i></a></div>
                    </div>
                    <div class="flexTable borderTable marginTable">

                        <div>{{ $order->invoice_no }}</div>
                        <div>${{ $order->amount }}</div>
                        <div>
                            @if($order->status == 'pending')

                                <span class="badge rounded-pill colorView">Pending</span>

                            @elseif($order->status == 'deliverd')

                                <span class="badge rounded-pill text-success">Deliverd</span>
                            
                            @if($order->return_order == 1)
                            <span class="badge rounded-pill " style="background:red;">Return</span>
                            @endif
                            
                            @endif
                            
                        </div>

                        <div>
                            <a href="{{ url('user/order_details/'.$order->id) }}" class="btn-sm colorView"><i class="fa fa-eye"></i> View</a>
                        </div>
                        
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>

@endsection


