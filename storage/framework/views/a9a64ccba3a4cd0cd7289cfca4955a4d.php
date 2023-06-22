<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
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
                            <div><span class = "mylastnav"><?php echo e($data->firstName); ?></span>
                                 <span class = "mylastnav"><?php echo e($data->lastName); ?></span></div>
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
                    <div class = "mytileone"></div>
                    <div class = "mytiletwo"></div>
                    <div class = "mytilethree"></div>
                </div>
            </main>
            <footer>
                <p class="endparagraph">Copyright &copy; 2023 eTitles</p>
            </footer>
        </body>
    </html><?php /**PATH C:\xampp\htdocs\etitles\resources\views/dashboard.blade.php ENDPATH**/ ?>