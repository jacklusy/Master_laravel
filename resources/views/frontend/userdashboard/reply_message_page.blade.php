@extends('min_dashboard')
@section('UserDach')


<div class="card transparent">
    <div class="table mb-0" >
        <div class="">
            <div class="flexTable2 backtable">
                <div>Your Message</div>
                <div>Reply Message</div>
            </div>
            
        </div>
        <div class="">

            @foreach ($replyMessage as $key=> $reply)
                
                <div class="border2">
                    <div>{{ $reply->created_at }}</div>
                </div>
                <div class="flexTable2 borderTable marginTable">

                    <p>{{ $reply->message }}</p>
                    <p>{{ $reply->replymessage }}</p>
                    
                </div>
            @endforeach
            
        </div>
    </div>
</div>




@endsection


