<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
           <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'> 
          <!-- <link rel="stylesheet" href="{{ asset('css/market.css') }}">-->
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
                    <br><br><br>
                <div class="searchbar">
                    <input type="text" placeholder="Search..." />
                </div>
                <br><br> 

            </header>
            <main>
 
             <h1>Incoming Requests</h1>   
            <table>
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Bidder Name</th>
                        <th>Date</th>
                        <th>Accept/Reject</th>
                    
                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alltransactions') as $transaction)
                            @if($transaction->owner_approve == "0" && $transaction->owner_id == session('anyUserId'))
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->bidder_fname }} {{ $transaction->bidder_lname }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>
                                <form action="{{ route('respondrequest') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $transaction->title_id }}">
                            <input type="hidden" name="bidder_id" value="{{ $transaction->bidder_id }}">
                            <input type="hidden" name="created_at" value="{{ $transaction->created_at }}">
                            <select id="owner_approve" name="owner_approve">
                            <option value="1">Accept</option>
                            <option value="2">Reject</option>
                            </select>
                            <button type="submit">Confirm</button>
                        </form>

                                </td>
                            </tr>
                            @endif
                        @endforeach    
                        </tbody>
                </table>
</main>
</body>
</html>