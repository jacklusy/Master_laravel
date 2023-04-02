@extends('min_dashboard')
@section('UserDach')

<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Your Orders</h3>
    </div>
    <div class="card-body">
            <table class="table mb-0" >
                <thead class="table-dark">
                    <tr>
                        <th>Sl</th>
                            <th>Your Message</th>
                            <th>Reply Message</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($replyMessage as $key=> $reply)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <div class="textarea-style mb-30">
                                    <textarea name="message" placeholder="Message" disabled>
                                        {{ $reply->message }}
                                    </textarea>
                                </div>
                            </td>
                            <td>
                                <div class="textarea-style mb-30">
                                    <textarea name="message" placeholder="Message" disabled>
                                        {{ $reply->replymessage }}
                                    </textarea>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
    </div>
</div>

@endsection


