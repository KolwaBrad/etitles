<!DOCTYPE html>
<html>

    <head>
        <title>e-Titles</title>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/myadmin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admindash.css') }}">

        <script src="{{ asset('js/myadmin.js') }}"></script>
    

    </head>

    <body>

    <div class="everythinginadmin">
        <div class="topbar">
          <div class="adminname">
          <span class ="mylastnav">{{ session('anyUserfname') }}</span>
          <span class ="mylastnav">{{ session('anyUserlname') }}</span>
        </div>
        <div>
          <span><a href="adminlogout">Log out</a></span>
        </div>  
        </div>  

        <div id="mySidebar" class="sidebar">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <br> <br> <br>
          <a href="#dashboard">Dashboard</a>
          <a href="#statistics">Statistics</a>
          <a href="#transact">Transact</a>
         <!-- <a href="#messages">Messeges</a> -->
          <a href="#blockside">Blockside</a>
          <a href="adminlogout">Log out</a>
        </div>

        <div id="main">
          <button class="openbtn" onclick="openNav()">&#9776;</button>


          <div id="newmain">
  <section id="dashboard">
    <br>
    <span><a href="proccedadmin"><button class="myrefreshbutton">Refresh</button></a></span>
    <span><h2 class="adminmaintitle">Admin Dashboard</h2></span>
    
    <div class="dashboard">

        <div class="tile" id="mytileone" onclick="animateTile(this)">  
          <div class="admindatetime">
            <p class="date" id="date"></p>
            <p class="time" id="time"></p>
          </div>
              <script>
                function updateDateTime() {
                  var dateElement = document.getElementById("date");
                  var timeElement = document.getElementById("time");
      
                  var currentDate = new Date();
                  var date = currentDate.toLocaleDateString();
                  var time = currentDate.toLocaleTimeString();
      
                  dateElement.textContent = "Today " + date;
                  timeElement.textContent = "" + time;
    }
    
                  // Update date and time every second
                  setInterval(updateDateTime, 1000);
              </script>
        </div>

    <a href="#pendingapprovals"><div class="tile" onclick="animateTile(this)">Pending Requests</div></a>
    <a href="#pendingtransfers"><div class="tile" onclick="animateTile(this)">Pending Transfers</div></a>
    <a href="#rejectedtransfers"><div class="tile" onclick="animateTile(this)">Rejected Transfers</div></a>
    <br>
    <a href="#deniedapprovals"><div class="tile" onclick="animateTile(this)">Denied Approvals</div></a>
    <a href="#statistics"><div class="tile" onclick="animateTile(this)">Statistics</div></a>
    <!-- <a href="#messages"><div class="tile" onclick="animateTile(this)">Messages</div></a> -->
    <a href="#blockside"><div class="tile" onclick="animateTile(this)">Blockside</div></a>
    <a href="addland"><div class="tile" onclick="animateTile(this)">Add Title</div></a>
    <br>
    <br>

  </div>
  <script>
    function animateTile(tile) {
      tile.classList.add('animated');
      setTimeout(function() {
        tile.classList.remove('animated');
      }, 1000);
    }
  </script>
      <br>
    <br>
    <br>
    <br>
    <br>
  </section>

  <section id="statistics">
    <h2>Statistics</h2>
    <p>This is a list of statistics.</p>
    <div class="transaction_numbers">
  <p>Transactions Statistics</p>
    <div class="chart">
  <div class="bar" id="bar1" style="height: {{ session('pendingapprovalcount') }}0%"></div>
  <div class="bar" id="bar2" style="height: {{ session('pendingtransferscount') }}0%"></div>
  <div class="bar" id="bar3" style="height: {{ session('rejectedtransfercount') }}0%"></div>
  <div class="bar" id="bar4" style="height: {{ session('completedtransfercount') }}0%"></div>
  <div class="bar" id="bar5" style="height: {{ session('rejectedapprovalcount') }}0%"></div>
  <div class="bar" id="bar6" style="height: {{ session('approvedtransfercount') }}0%"></div>
  </div>

</div class="chartindex">
    <div class="bar1">Pending Approvals - {{ session('pendingapprovalcount') }}</div>
    <div class="bar2">Pending Transfers - {{ session('pendingtransferscount') }}</div>
    <div class="bar3">Rejected Transfers - {{ session('rejectedtransfercount') }}</div>
    <div class="bar4">Completed Transfers - {{ session('completedtransfercount') }}</div>
    <div class="bar5">Rejected Approvals - {{ session('rejectedapprovalcount') }}</div>
    <div class="bar6">Approved Transfers - {{ session('approvedtransfercount') }}</div>
<div>
  </div>

  

  </section>

  <section id="transact">
    <h2>Transact</h2>
    <div class="mytransacttable">
    <h1 id="pendingapprovals">Pending approvals</h1>   
            <table class="smalltable">
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Bidder Name</th>
                        <th>Owner Name</th>
                        <th>Date</th>
                        <th>Approve</th>

                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alladmintransactions') as $transaction)
                            @if($transaction->owner_approve == "1" && $transaction->bidder_approve == "1" && $transaction->admin_approve == 0)
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->bidder_fname }} {{ $transaction->bidder_lname }}</td>
                                <td>{{ $transaction->owner_fname }} {{ $transaction->owner_lname }}</td>
                                <td>{{ $transaction->updated_at }}</td>
                                <td>
                                <form action="{{ route('adminapproverequest') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $transaction->title_id }}">
                            <input type="hidden" name="bidder_id" value="{{ $transaction->bidder_id }}">
                            <input type="hidden" name="created_at" value="{{ $transaction->created_at }}">
                            <select id="admin_approve" name="admin_approve">
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
  </div>

      <div class="mytransacttable">
    <h1 id="pendingtransfers">Pending Transfers</h1>   
            <table class="smalltable">
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Bidder Name</th>
                        <th>Owner Name</th>
                        <th>Date</th>
                        <th>Transfer</th>

                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alladmintransactions') as $transaction)
                            @if($transaction->owner_approve == "1" && $transaction->bidder_approve == "1" && $transaction->admin_approve == "1" && $transaction->admin_id == session('anyUserId')  && $transaction->transfer == "0" && !is_null($transaction->bank_statement))
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->bidder_fname }} {{ $transaction->bidder_lname }}</td>
                                <td>{{ $transaction->owner_fname }} {{ $transaction->owner_lname }}</td>
                                <td>{{ $transaction->updated_at }}</td>
                                <td>
                                <form action="{{ route('transferapproverequest') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $transaction->title_id }}">
                            <input type="hidden" name="bidder_id" value="{{ $transaction->bidder_id }}">
                            <input type="hidden" name="created_at" value="{{ $transaction->created_at }}">
                            <select id="transfer" name="transfer">
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
  </div>

  <div class="mytransacttable">
    <h1 id="rejectedtransfers">Rejected Transfers</h1>   
            <table class="smalltable">
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Bidder Name</th>
                        <th>Owner Name</th>
                        <th>Date</th>
                        

                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alladmintransactions') as $transaction)
                            @if($transaction->transfer == "2")
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->bidder_fname }} {{ $transaction->bidder_lname }}</td>
                                <td>{{ $transaction->owner_fname }} {{ $transaction->owner_lname }}</td>
                                <td>{{ $transaction->updated_at }}</td>

                            </tr>
                            @endif
                        @endforeach    
                        </tbody>
                </table>
  </div>

  <div class="mytransacttable">
    <h1 id="deniedapprovals">Denied Approvals</h1>   
            <table class="smalltable">
                <thead>
                    <tr>
                        <th>Land</th>
                        <th>Bidder Name</th>
                        <th>Owner Name</th>
                        <th>Date</th>
                        

                    </tr>
                </thead>
                <tbody> 
                        @foreach (session('alladmintransactions') as $transaction)
                            @if($transaction->admin_approve == "2")
                            <tr>
                                <td>{{ $transaction->location_name }}</td>
                                <td>{{ $transaction->bidder_fname }} {{ $transaction->bidder_lname }}</td>
                                <td>{{ $transaction->owner_fname }} {{ $transaction->owner_lname }}</td>
                                <td>{{ $transaction->updated_at }}</td>

                            </tr>
                            @endif
                        @endforeach    
                        </tbody>
                </table>
  </div>
  </section>

  <section id="messages">
    <h2>Messages</h2>
    <p>This is our complaint section.</p>
  </section>

  <section id="blockside">
    <h2>Blockside</h2>
    <p>This is our blockside.</p>

    <h1><a href="getblocks">View All blocks</a></h1>
    <h1><a href="viewlands">View All Titles</a></h1>
  </section>
</div>
        </div>

    </body>
</html>
