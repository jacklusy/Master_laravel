@extends('dashboard')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">

                    <!-- // Start Col md 3 menu -->

                    @php
                        $route = Route::current()->getName();
                    @endphp
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "   href="{{route('dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'user.order.page')? 'active':  '' }} "  href="{{route('user.order.page')}}"  ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "   href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "   href="#address"  ><i class="fi-rs-marker mr-10"></i>My Address</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'user.account.page')? 'active':  '' }} "   href="{{route('user.account.page')}}"  ><i class="fi-rs-user mr-10"></i>Account details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'user.change.password')? 'active':  '' }} "  href="{{route('user.change.password')}}"  ><i class="fi-rs-user mr-10"></i>Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "  href="{{route('user.logout')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- // End Col md 3 menu -->



                    <!-- // Start Col md 9  -->
                    <div class="col-md-9">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Shipping Details</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                            <tr>
                                                <th>Shipping Name:</th>
                                                <th>{{ $order->name }}</th>
                                            </tr>

                                            <tr>
                                                <th>Shipping Phone:</th>
                                                <th>{{ $order->phone }}</th>
                                            </tr>

                                            <tr>
                                                <th>Shipping Email:</th>
                                                <th>{{ $order->email }}</th>
                                            </tr>

                                            <tr>
                                                <th>Shipping Address:</th>
                                                <th>{{ $order->adress }}</th>
                                            </tr>


                                            <tr>
                                                <th>State :</th>
                                                <th>{{ $order->state->state_name }}</th>
                                            </tr>

                                            <tr>
                                                <th>Post Code :</th>
                                                <th>{{ $order->post_code }}</th>
                                            </tr>

                                            <tr>
                                                <th>Order Date :</th>
                                                <th>{{ $order->order_date }}</th>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                            </div>
                            <!-- // End col-md-6  -->


                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Order Details
                                            <span class="text-danger">Invoice : {{ $order->invoice_no }} </span>
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                            <tr>
                                                <th> Name :</th>
                                                <th>{{ $order->user->name }}</th>
                                            </tr>

                                            <tr>
                                                <th>Phone :</th>
                                                <th>{{ $order->user->phone }}</th>
                                            </tr>

                                            <tr>
                                                <th>Invoice:</th>
                                                <th class="text-danger">{{ $order->invoice_no }}</th>
                                            </tr>

                                            <tr>
                                                <th>Order Amonut:</th>
                                                <th>${{ $order->amount }}</th>
                                            </tr>

                                            <tr>
                                                <th>Order Status:</th>
                                                <th><span class="badge rounded-pill bg-warning">{{ $order->status
                                                        }}</span></th>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                            </div>
                            <!-- // End col-md-6  -->

                        </div><!-- // End Row  -->




                    </div>
                    <!-- // End Col md 9  -->


                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" style="font-weight: 600;">
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <label>Image </label>
                            </td>
                            <td class="col-md-2">
                                <label>Product Name </label>
                            </td>
                          
                            <td class="col-md-2">
                                <label>Product Code </label>
                            </td>
                            <td class="col-md-1">
                                <label>Color </label>
                            </td>
                            <td class="col-md-1">
                                <label>Size </label>
                            </td>
                            <td class="col-md-1">
                                <label>Quantity </label>
                            </td>

                            <td class="col-md-3">
                                <label>Price </label>
                            </td>

                        </tr>


                        @foreach($orderItem as $item)
                        <tr>
                            <td class="col-md-1">
                                <label><img src="{{ asset($item->product->product_thambnail) }}"
                                        style="width:50px; height:50px;"> </label>
                            </td>
                            <td class="col-md-2">
                                <label>{{ $item->product->product_name }}</label>
                            </td>
                           

                            <td class="col-md-2">
                                <label>{{ $item->product->product_code }} </label>
                            </td>
                            @if($item->color == NULL)
                            <td class="col-md-1">
                                <label>.... </label>
                            </td>
                            @else
                            <td class="col-md-1">
                                <label>{{ $item->color }} </label>
                            </td>
                            @endif

                            @if($item->size == NULL)
                            <td class="col-md-1">
                                <label>.... </label>
                            </td>
                            @else
                            <td class="col-md-1">
                                <label>{{ $item->size }} </label>
                            </td>
                            @endif
                            <td class="col-md-1">
                                <label>{{ $item->qty }} </label>
                            </td>

                            <td class="col-md-3">
                                <label>for one predict = ${{ $item->price }} <br> Total = ${{ $item->price * $item->qty }} </label>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>







@endsection