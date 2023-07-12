<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
          <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </head>
        <body>

            <header>
                <div class = "blankdiv"></div>
               
                    <div class = "topnav">
                        <div class="maintitle"><a href="#">eTitles</a></div>

                        <div class = "centernav">
                            <div><a class = "mycenternav" href="dashboard">Home</a></div>
                            <div><a class = "mycenternav" href="#">Counties</a></div>
                            <div><a class = "mycenternav" href="#">Contacts</a></div>
                            <div><a class = "mycenternav" href="#">Support</a></div>
                        </div>
                         
                        <div class = "lastnav">
                            <div><a class = "mylastnav" href="logout">Log out</a></div>
                            <div>
                                
                                <span class = "mylastnav">{{ session('firstName') }}</span>
                                 <span class = "mylastnav">{{ session('lastName') }}</span></div>
                            </div>    
                    </div>
                    

            </header>
            <br><br><br>
<main>
<div class="fullchat">
    <br>
    <p class="chattitle">Chat</p>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="chat-container">
                    @foreach (session('mergedData') as $message)
                        @if (($message['sender_id'] == session('anyUserId') && $message['receiver_id']) ||
                             ($message['sender_id'] && $message['receiver_id'] == session('anyUserId')))

                             @once
                             
                             <p class="chatname">{{ $message->user->firstName }} {{ $message->user->lastName }}</p>
                             @endonce

                            
                             
                            <div id="chat-messages">
                                <!-- Display chat messages for the specific combination of receiver_id and sender_id -->
                                @if ($message['sender_id'] == session('anyUserId'))
                                    <div class="message" id="sendermessage">
                                        <span class="message-text">{{ $message->text_message }}&nbsp</span>
                                        <span class="message-text">: &nbsp{{ $message->created_at->format('H:i') }}&nbsp&nbsp</span>
                                    </div>
                                @else
                                    <div class="message" id="receivermessage">
                                        <span class="message-text">&nbsp&nbsp{{ $message->created_at->format('H:i') }}&nbsp :</span>
                                        <span class="message-text">&nbsp{{ $message->text_message }}</span>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <form id="chat-form" action="{{ route('storemessage') }}" method="POST">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif    
        @csrf
        <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
        <button type="submit">Send</button>
    </form>
    <br>
</div>

</main>
    </body>
    </html>
