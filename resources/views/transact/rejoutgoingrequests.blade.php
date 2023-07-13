<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
           <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'> 
          <link rel="stylesheet" href="{{ asset('css/market.css') }}">
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
                    <br><br>
                <div class="searchbar">
                    <input type="text" placeholder="Search..." />
                </div>
             

            </header>
            <main>
            <br><br> 
            <div class="reqtable">
             <h1>Rejected Outgoing Requests</h1>   
            <table>
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Bidder Name</th>
                        <th>Date</th>

                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alltransactions') as $transaction)
                            @if($transaction->owner_approve == "2" && $transaction->bidder_id == session('anyUserId'))
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->bidder_fname }} {{ $transaction->bidder_lname }}</td>
                                <td>{{ $transaction->updated_at }}</td>
                            </tr>
                            @endif
                        @endforeach    
                        </tbody>
                </table>
</div>
</main>
</body>
</html>