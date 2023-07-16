<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
            <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
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
                            <div><span class = "mylastnav"><?php echo e(session('firstName')); ?></span>
                                 <span class = "mylastnav"><?php echo e(session('lastName')); ?></span></div>
                            </div>    
                    </div>
                    

            </header>
            <main>
                <br><br><br>
                <div class="searchbar">
                    <input type="text" placeholder="Search..." />
                </div>
                <br><br><br><br><br><br><br>
                <div class = "mytiles">




                    <div class="newcardtitle">
                        <img src="<?php echo e(asset('css/images/handshake_3829916.png')); ?>">
                        <p>View and acquire titles on sale<p>
                        <a href="markettitles"><button>Market</button></a>
                    </div>

                    <div class="newcardtitle">
                        <img src="<?php echo e(asset('css/images/contract_826021.png')); ?>">
                        <p>View owned titles<p>
                        <a href="mytitles"><button>My Titles</button></a>
                    </div>

                    <div class="newcardtitle">
                        <img src="<?php echo e(asset('css/images/tip_10237215.png')); ?>">
                        <p>View and respond to requests<p>
                        <a href="mytransactions"><button>Requests</button></a>
                    </div>

                    <div class="newcardtitle">
                        <img src="<?php echo e(asset('css/images/email_10474681.png')); ?>">
                        <p>View Notifications<p>
                        <a href="getmessages"><button>Notifications</button></a>
                    </div>
                    
                  <!--  
                    <a href="markettitles"><div class = "mytileone" id="buyland">Buy</div></a>
                    <a href="mytitles"><div class = "mytileone" id="mytitles">My Titles</div></a>
                    <a href="mytransactions"><div class = "mytileone" id="myrequests">Requests</div></a>
                    <a href="getmessages"><div class = "mytileone"  id="mynotifications">Notifications</div></a>
                </div>
            -->
            </main>
            <footer>
                <p class="endparagraph">Copyright &copy; 2023 eTitles</p>
            </footer>
        </body>
    </html><?php /**PATH C:\xampp\htdocs\etitles\resources\views/dashboard.blade.php ENDPATH**/ ?>