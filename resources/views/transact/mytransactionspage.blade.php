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
                            <div><span class = "mylastnav">{{ session('firstName') }}</span>
                                 <span class = "mylastnav">{{ session('lastName') }}</span></div>
                            </div>    
                    </div>
                    

            </header>
            <main>
                <br><br><br>

               
                <div class = "myreports">



                <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img2.jpg') }}">
                        <p>Respond to incoming requests<p>
                        <a href="incomingrequests"><button>Procced</button></a>
                    </div>

                    <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img3.jpg') }}">
                        <p>View outgoing requests<p>
                        <a href="outgoingrequests"><button>Procced</button></a>
                    </div>

                    <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img4.jpg') }}">
                        <p>Approved incoming requests<p>
                        <a href="appincomingrequests"><button>Procced</button></a>
                    </div>

                    <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img5.jpg') }}">
                        <p>Respond to approved aquisition<p>
                        <a href="appoutgoingrequests"><button>Procced</button></a>
                    </div>

                    <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img6.jpg') }}">
                        <p>Continue Finalise purchase<p>
                        <a href="finalisepurchase"><button>Procced</button></a>
                    </div>

                    <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img1.jpg') }}">
                        <p>Rejected outgoing requests<p>
                        <a href="rejincomingrequests"><button>Procced</button></a>
                    </div>

                    <div class="oldnewcardtitle">
                        <img src="{{ asset('css/images/img3.jpg') }}">
                        <p>Rejected purchase requests<p>
                        <a href="rejoutgoingrequests"><button>Procced</button></a>
                    </div>

<!--
                    <a href="incomingrequests"><div class = "mytileone" id="myreq">Incoming Requests</div></a>
                    <a href="outgoingrequests"><div class = "mytileone" id="myreq">Outgoing Requests</div></a>
                    <a href="appincomingrequests"><div class = "mytileone" id="myreq">Approved Incoming Requests</div></a>
                    <a href="appoutgoingrequests"><div class = "mytileone" id="myreq">Approved Outgoing Requests</div></a>
                    <a href="finalisepurchase"><div class = "mytileone" id="myreq">Finalise Purchase</div></a>
                    <a href="rejincomingrequests"><div class = "mytileone" id="myreq">Rejected Incoming Requests</div></a>
                    <a href="rejoutgoingrequests"><div class = "mytileone" id="myreq">Rejected Outgoing Requests</div></a>

-->
                </div>
            </main>
            <footer>
                <p class="endparagraph">Copyright &copy; 2023 eTitles</p>
            </footer>
        </body>
    </html>