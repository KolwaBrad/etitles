<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
          <!--  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
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
                         
    
                    </div>
                    

            </header>
            <br><br><br>
<main>
    <h1>Reply</h1>
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

</main>
    </body>
    </html>
