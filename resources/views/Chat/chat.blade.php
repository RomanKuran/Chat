@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="container-messages">
                @foreach($messages as $message)
                    @if(Auth::id() === $message->id_user)
                        <div class="my-message">
                            <div class="container-message">
                                <div class="message-body">{{ $message->message_body }}</div>
                                <div class="date">{{ $message->created_at }}</div>
                            </div>
                        </div>
                    @else
                        <div class="alien-message">
                            <div class="container-message">
                                <div class="message-body">{{ $message->message_body }}</div>
                                <div class="date">{{ $message->created_at }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
                

            </div>
            <div class="js-list-messages"></div>
            <input type="hidden" name="" class="js-token" value="{{ csrf_token() }}">
            <!-- <input type="text" name="" class="js-message-body"> -->
            <div class="input-contaner">
                <textarea name="" class="js-message-body" id="" cols="90" rows="2"></textarea>
                <button class="js-send-message">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection
