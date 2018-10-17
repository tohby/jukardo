@extends('layouts.master') 
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">All Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1">Unread</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu2">Read</a>
            </li>
        </ul>

        <div class="card mt-3">
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container-fluid tab-pane active p-3"><br>
                    @if (count($messages) > 0)
                       @foreach ($messages as $message)
                        <div class="media p-3 @if ($message->status == "read") read-lb @else unread-lb @endif mb-3">
                            <span class="badge badge-secondary mr-3 mt-1" style="width:60px;"><h2> {{substr($message->firstname, 0, 1)}} </h2></span>
                             <div class="media-body">
                               <h3>{{$message->firstname}} <small> <i> {{$message->lastname}} </i></small></h3><h5 class="lead @if ($message->status == "unread") font-weight-bold @else font-weight-light @endif">{{$message->subject}}</h5>
                             </div>
                             <p>{{$message->created_at->diffForHumans()}}</p>
                        </div>  
                       @endforeach 
                    @else
                        No messages!
                    @endif
                </div>
                <div id="menu1" class="container-fluid tab-pane fade"><br>
                    @if (count($unreadMessages) > 0)
                        @foreach ($unreadMessages as $unreadMessage)
                            <div class="media p-3 unread-lb mb-3">
                                <span class="badge badge-secondary mr-3 mt-1" style="width:60px;"><h2> {{substr($unreadMessage->firstname, 0, 1)}} </h2></span>
                                 <div class="media-body">
                                   <h3>{{$unreadMessage->firstname}} <small> <i> {{$unreadMessage->lastname}} </i></small></h3><h5 class="lead font-weight-bold">{{$unreadMessage->subject}}</h5>
                                 </div>
                                 <p>{{$unreadMessage->created_at->diffForHumans()}}</p>
                            </div>  
                        @endforeach
                    @else
                        Wow! you're so up to date, you read all your messages.
                    @endif
                </div>
                <div id="menu2" class="container-fluid tab-pane fade"><br>
                    @if (count($readMessages) > 0)
                        @foreach ($readMessages as $readMessage)
                            <div class="media p-3 read-lb mb-3">
                                <span class="badge badge-secondary mr-3 mt-1" style="width:60px;"><h2> {{substr($readMessage->firstname, 0, 1)}} </h2></span>
                                 <div class="media-body">
                                   <h3>{{$readMessage->firstname}} <small> <i> {{$readMessage->lastname}} </i></small></h3><h5 class="lead font-weight-light">{{$readMessage->subject}}</h5>
                                 </div>
                                 <p>{{$readMessage->created_at->diffForHumans()}}</p>
                            </div>  
                        @endforeach
                    @else
                        Oops! this could be tough, you haven't read any of your messages, or you don't have any.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection