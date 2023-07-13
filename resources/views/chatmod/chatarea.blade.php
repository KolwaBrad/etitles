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
    
    <p class="chattitle">Notifications</p>
    
    
    

                <div id="chat-container">
                    @foreach (session('mergedData') as $message)
                        @if ($message['sender_id'] != session('anyUserId') && $message['receiver_id'] == session('anyUserId'))
                            


                                                         
                        
                                <div class="message" id="receivermessage">
                                    <p class="chatname">{{ $message->user->firstName }} {{ $message->user->lastName }}</p>
                                        <span class="message-text">&nbsp&nbsp{{ $message->created_at->format('H:i') }}&nbsp :</span>
                                        <span class="message-text">&nbsp{{ $message->text_message }}</span>
                                    </div>
                               
                     
                            </div>
                            </div>
                            @endif
                    @endforeach
   

    
</div>


</main>
    </body>
    </html>
