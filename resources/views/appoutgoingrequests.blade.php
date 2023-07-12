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
 
             <h1>Approved Outgoing Requests</h1>   
            <table>
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Seller Name</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alltransactions') as $transaction)
                            @if($transaction->owner_approve == "1" && $transaction->bidder_id == session('anyUserId'))
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->owner_fname }} {{ $transaction->owner_lname }}</td>
                                <td>{{ $transaction->updated_at }}</td>
                                <td>
                                <form action="{{ route('completerequest') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $transaction->title_id }}">
                            <input type="hidden" name="owner_id" value="{{ $transaction->owner_id }}">
                            <input type="hidden" name="created_at" value="{{ $transaction->created_at }}">
                            <select id="bidder_approve" name="bidder_approve" onchange="togglePriceValuationInput()">
                                <option value="2">Reject</option>
                                <option value="1">Accept</option>
                                
                            </select>
                            <div id="price_valuation_input" style="display: none;">
                            <label for="cost">Price Valuation</label>
                            <input type="text" class="form-control" id="cost" name="cost" >
                            </div>
                            <button type="submit">Confirm</button>
                            </form>

<script>
    function togglePriceValuationInput() {
        var bidderApprove = document.getElementById('bidder_approve');
        var priceValuationInput = document.getElementById('price_valuation_input');
        if (bidderApprove.value == '1') {
            priceValuationInput.style.display = 'block';
        } else {
            priceValuationInput.style.display = 'none';
        }
    }
</script>
                                </td>
                            </tr>
                            @endif
                        @endforeach    
                        </tbody>
                </table>
</main>
</body>
</html>