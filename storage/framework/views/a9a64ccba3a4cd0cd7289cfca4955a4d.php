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
                            <div><a class = "mycenternav" href="index.php">Home</a></div>
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
                    <a href="markettitles"><div class = "mytileone">Buy Land</div></a>
                    <a href="#"><div class = "mytileone">Sell Land</div></a>
                    <a href="#"><div class = "mytileone">My Titles</div></a>
                    <a href="getmessages"><div class = "mytileone">My Chats</div></a>
                </div>
            </main>
            <footer>
                <p class="endparagraph">Copyright &copy; 2023 eTitles</p>
            </footer>
        </body>
    </html><?php /**PATH C:\xampp\htdocs\etitles\resources\views/dashboard.blade.php ENDPATH**/ ?>