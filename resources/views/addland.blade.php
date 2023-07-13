<!DOCTYPE html>
<html>
    <head>
        <title>e-Titles</title>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>

    <body>
        
        <div class="container">
            <div class="mytitle">
                <h1 class="maintitle">e-Titles</h1>
            </div>    
            <br><br>
            <h1>Add land</h1>

            <form action="{{route('addTitle')}}" method="post" enctype="multipart/form-data">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="title_id">Title id</label>
                    <input type="text" class="form-control" id="title_id" name="title_id" required>
                </div>

                <div class="form-group">
                    <label for="titledeed">Title Deed</label>
                    <input type="file" class="form-control" id="titledeed" name="titledeed" required>
                </div>

                <div class="form-group">
                    <label for="photograph">Photograph</label>
                    <input type="file" class="form-control" id="photograph" name="photograph" required>
                </div>

                <div class="form-group">
                    <label for="county">County:</label>
                        <select id="county" name="county" onchange="updateSubcounties()">
                            <option value="">Select a county</option>
                            <option value="001">Mombasa</option>
                            <option value="002">Kwale</option>
                            <option value="003">Kilifi</option>
                            <option value="004">Tana River</option>
                            <option value="005">Lamu</option>
                            <option value="006">Taita Taveta</option>
                            <option value="007">Garissa</option>
                            <option value="008">Wajir</option>
                            <option value="009">Mandera</option>
                            <option value="010">Marsabit</option>
                            <option value="011">Isiolo</option>
                            <option value="012">Meru</option>
                            <option value="013">Tharaka-Nithi</option>
                            <option value="014">Embu</option>
                            <option value="015">Kitui</option>
                            <option value="016">Machakos</option>
                            <option value="017">Makueni</option>
                            <option value="018">Nyandarua</option>
                            <option value="019">Nyeri</option>
                            <option value="020">Kirinyaga</option>
                            <option value="021">Murang'a</option>
                            <option value="022">Kiambu</option>
                            <option value="023">Turkana</option>
                            <option value="024">West Pokot</option>
                            <option value="025">Samburu</option>
                            <option value="026">Uasin Gishu</option>
                            <option value="027">Trans-Nzoia</option>
                            <option value="028">Elgeyo-Marakwet</option>
                            <option value="029">Nandi</option>
                            <option value="030">Baringo</option>
                            <option value="031">Laikipia</option>
                            <option value="032">Nakuru</option>
                            <option value="033">Narok</option>
                            <option value="034">Kajiado</option>
                            <option value="035">Kericho</option>
                            <option value="036">Bomet</option>
                            <option value="037">Kakamega</option>
                            <option value="038">Vihiga</option>
                            <option value="039">Bungoma</option>
                            <option value="040">Busia</option>
                            <option value="041">Siaya</option>
                            <option value="042">Kisumu</option>
                            <option value="043">Homa Bay</option>
                            <option value="044">Migori</option>
                            <option value="045">Kisii</option>
                            <option value="046">Nyamira</option>
                            <option value="047">Nairobi</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="subcountyid">Sub County:</label>
                        <select id="subcountyid" name="subcountyid"></select>
                </div>

                <div class="form-group">
                    <label for="location_name">Location</label>
                    <input type="text" class="form-control" id="location_name" name="location_name" required>
                </div>

                <div class="form-group">
                    <label for="approximate_area">Approximate Area</label>
                    <input type="text" class="form-control" id="approximate_area" name="approximate_area" required>
                </div>

                <div class="form-group">
                    <label for="owner_id">Owner id</label>
                    <input type="text" class="form-control" id="owner_id" name="owner_id" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            <script>
  // Define subcounty options based on the selected county
  function updateSubcounties() {
    var countySelect = document.getElementById("county");
    var subcountySelect = document.getElementById("subcountyid");


    // Clear previous options
    subcountySelect.innerHTML = "";

    var selectedCounty = countySelect.value;

    // Populate city options based on the selected country
    if (selectedCounty === "001") {
      var mombasaSubcounties = ["Changamwe", "Jomvu", "Kisauni", "Likoni", "Mvita", "Nyali"];
      populateOptions(subcountySelect, mombasaSubcounties);
    

    } else if (selectedCounty === "002") {
      var kwaleSubcounties = ["Msambweni", "Lungalunga", "Matuga", "Kinango"];
      populateOptions(subcountySelect, kwaleSubcounties);

    } else if (selectedCounty === "003") {
      var kilifiSubcounties = ["Kilifi North", "Kilifi South", "Kaloleni", "Rabai", "Ganze", "Malindi"];
      populateOptions(subcountySelect, kilifiSubcounties);

    }  else if (selectedCounty === "004") {
      var tanariverSubcounties = ["Bura", "Galole", "Garsen"];
      populateOptions(subcountySelect, tanariverSubcounties);

    } else if (selectedCounty === "005") {
      var lamuSubcounties = ["Lamu East", "Lamu West"];
      populateOptions(subcountySelect, lamuSubcounties);

    } else if (selectedCounty === "006") {
      var taitatavetaSubcounties = ["Taita", "Taveta", "Mwatate"];
      populateOptions(subcountySelect, taitatavetaSubcounties);

    } else if (selectedCounty === "007") {
      var garissaSubcounties = ["Balambala", "Lagdera", "Dadaab", "Fafi", "Ijara"];
      populateOptions(subcountySelect, garissaSubcounties);

    } else if (selectedCounty === "008") {
      var wajirSubcounties = ["Tarbaj", "Wajir East", "Wajir West", "Wajir South"];
      populateOptions(subcountySelect, wajirSubcounties);

    } else if (selectedCounty === "009") {
      var manderaSubcounties = ["Banissa", "Mandera East", "Mandera West", "Mandera North", "Lafey"];
      populateOptions(subcountySelect, manderaSubcounties);

    } else if (selectedCounty === "010") {
      var marsabitSubcounties = ["Moyale", "North Horr", "Saku", "Laisamis"];
      populateOptions(subcountySelect, marsabitSubcounties);

    } else if (selectedCounty === "011") {
      var isioloSubcounties = ["Isiolo", "Merti", "Garbatulla"];
      populateOptions(subcountySelect, isioloSubcounties);

    } else if (selectedCounty === "012") {
      var meruSubcounties = ["Igembe North", "Igembe South", "Imenti North", "Imenti South", "Buuri", "Tigania East", "Tigania West", "North Imenti", "South Imenti"];
      populateOptions(subcountySelect, meruSubcounties);

    } else if (selectedCounty === "013") {
      var tharakanithiSubcounties = ["Tharaka North", "Tharaka South", "Maara"];
      populateOptions(subcountySelect, tharakanithiSubcounties);

    } else if (selectedCounty === "014") {
      var embuSubcounties = ["Manyatta", "Runyenjes", "Mbeere North", "Mbeere South"];
      populateOptions(subcountySelect, embuSubcounties);

    } else if (selectedCounty === "015") {
      var kituiSubcounties = ["Kitui West", "Kitui Rural", "Kitui Central", "Kitui East", "Kitui South", "Mwingi North", "Mwingi West", "Mwingi Central"];
      populateOptions(subcountySelect, kituiSubcounties);

    } else if (selectedCounty === "016") {
      var machakosSubcounties = ["Mavoko", "Machakos Town", "Mwala", "Yatta", "Kangundo"];
      populateOptions(subcountySelect, machakosSubcounties);

    } else if (selectedCounty === "017") {
      var makueniSubcounties = ["Makueni", "Kibwezi East", "Kibwezi West"];
      populateOptions(subcountySelect, makueniSubcounties);

    } else if (selectedCounty === "018") {
      var nyandaruaSubcounties = ["Kinangop", "Kipipiri", "Ol'Kalou", "Ol'Jorok"];
      populateOptions(subcountySelect, nyandaruaSubcounties);

    } else if (selectedCounty === "019") {
      var nyeriSubcounties = ["Tetu", "Kieni", "Mathira", "Othaya", "Mukurwe-ini", "Nyeri Town"];
      populateOptions(subcountySelect, nyeriSubcounties);

    } else if (selectedCounty === "020") {
      var kirinyagaSubcounties = ["Kirinyaga Central", "Kirinyaga East", "Kirinyaga West", "Mwea East", "Mwea West"];
      populateOptions(subcountySelect, kirinyagaSubcounties);

    } else if (selectedCounty === "021") {
      var murangaSubcounties = ["Gatanga", "Kigumo", "Kandara", "Maragua", "Kangema", "Mathioya"];
      populateOptions(subcountySelect, murangaSubcounties);

    } else if (selectedCounty === "022") {
      var kiambuSubcounties = ["Ruiru", "Thika Town", "Juja", "Gatundu North", "Gatundu South", "Githunguri", "Kiambu", "Kiambaa", "Kabete", "Kikuyu", "Limuru", "Lari"];
      populateOptions(subcountySelect, kiambuSubcounties);

    } else if (selectedCounty === "023") {
      var turkanaSubcounties = ["Turkana North", "Turkana West", "Turkana Central", "Loima", "Turkana South"];
      populateOptions(subcountySelect, turkanaSubcounties);

    } else if (selectedCounty === "024") {
      var westpokotSubcounties = ["Kapenguria", "Kacheliba", "Sigor"];
      populateOptions(subcountySelect, westpokotSubcounties);

    } else if (selectedCounty === "025") {
      var samburuSubcounties = ["Samburu West", "Samburu North", "Samburu East"];
      populateOptions(subcountySelect, samburuSubcounties);

    } else if (selectedCounty === "026") {
      var transnzoiaSubcounties = ["Kwanza", "Endebess", "Saboti", "Kiminini"];
      populateOptions(subcountySelect, transnzoiaSubcounties);

    } else if (selectedCounty === "027") {
      var uasingishuSubcounties = ["Kapseret", "Kesses", "Moiben", "Turbo" , "Soy"];
      populateOptions(subcountySelect, uasingishuSubcounties);

    } else if (selectedCounty === "028") {
      var elgeyomarakwetSubcounties = ["Marakwet East", "Marakwet West", "Keiyo North", "Keiyo South"];
      populateOptions(subcountySelect, elgeyomarakwetSubcounties);

    } else if (selectedCounty === "029") {
      var nandiSubcounties = ["Chesumei", "Emgwen", "Nandi Hills", "Tinderet", "Aldai"];
      populateOptions(subcountySelect, nandiSubcounties);

    } else if (selectedCounty === "030") {
      var baringoSubcounties = ["Tiaty", "Baringo Central", "Baringo North", "Baringo South", "Mogotio", "Eldama Ravine"];
      populateOptions(subcountySelect, baringoSubcounties);

    } else if (selectedCounty === "031") {
      var laikipiaSubcounties = ["Laikipia West", "Laikipia East", "Laikipia North" , "Laikipia Central"];
      populateOptions(subcountySelect, laikipiaSubcounties);

    } else if (selectedCounty === "032") {
      var nakuruSubcounties = ["Njoro", "Naivasha", "Nakuru Town West", "Nakuru Town East", "Gilgil", "Kuresoi North", "Kuresoi South", "Molo"];
      populateOptions(subcountySelect, nakuruSubcounties);

    } else if (selectedCounty === "033") {
      var narokSubcounties = ["Narok North", "Narok East", "Narok South" , "Narok West"];
      populateOptions(subcountySelect, narokSubcounties);

    } else if (selectedCounty === "034") {
      var kajiadoSubcounties = ["Kajiado Central", "Kajiado East", "Kajiado North", "Kajiado West", "Kajiado South"];
      populateOptions(subcountySelect, kajiadoSubcounties);

    } else if (selectedCounty === "035") {
      var kerichoSubcounties = ["Ainamoi", "Bureti", "Kipkelion East", "Kipkelion West"];
      populateOptions(subcountySelect, kerichoSubcounties);

    } else if (selectedCounty === "036") {
      var bometSubcounties = ["Sotik", "Chepalungu", "Bomet Central", "Konoin"];
      populateOptions(subcountySelect, bometSubcounties);

    } else if (selectedCounty === "037") {
      var kakamegaSubcounties = ["Lugari", "Likuyani", "Malava", "Lurambi", "Navakholo", "Mumias East", "Mumias West", "Matungu", "Butere", "Khwisero", "Shinyalu", "Ikolomani"];
      populateOptions(subcountySelect, kakamegaSubcounties);

    } else if (selectedCounty === "038") {
      var vihigaSubcounties = ["Vihiga", "Sabatia", "Hamisi", "Luanda" , "Emuhaya"];
      populateOptions(subcountySelect, vihigaSubcounties);

    } else if (selectedCounty === "039") {
      var bungomaSubcounties = ["Mt. Elgon", "Sirisia", "Kimilili", "Kanduyi", "Webuye East", "Webuye West", "Bumula", "Kabuchai", "Tongaren", "Mt. Butsa"];
      populateOptions(subcountySelect, bungomaSubcounties);

    } else if (selectedCounty === "040") {
      var busiaSubcounties = ["Teso North", "Teso South", "Nambale", "Matayos", "Butula", "Funyula", "Budalangi"];
      populateOptions(subcountySelect, busiaSubcounties);

    } else if (selectedCounty === "041") {
      var siayaSubcounties = ["Ugenya", "Ugunja", "Alego Usonga", "Gem", "Bondo", "Rarieda" , "Rarieda East" , "Rarieda West" , "Uyoma" , "West Asembo" , "South East Asembo" , "North East Asembo" , "West Yimbo" , "Central Sakwa" , "North Sakwa"];
      populateOptions(subcountySelect, siayaSubcounties);

    } else if (selectedCounty === "042") {
      var kisumuSubcounties = ["Kisumu East", "Kisumu West", "Kisumu Central", "Seme", "Nyando", "Muhoroni" , "Nyakach"];
      populateOptions(subcountySelect, kisumuSubcounties);

    } else if (selectedCounty === "043") {
      var homabaySubcounties = ["Kabondo Kasipul", "Suba South", "Suba North" , "Karachuonyo", "Rangwe", "Homa Bay Town", "Ndhiwa", "Mbita"];
      populateOptions(subcountySelect, homabaySubcounties);

    } else if (selectedCounty === "044") {
      var migoriSubcounties = ["Rongo", "Awendo", "Suna East", "Suna West", "Uriri" , "Nyatike", "Kuria West", "Kuria East" , "Kuria North" , "Rongo South"];
      populateOptions(subcountySelect, migoriSubcounties);

    } else if (selectedCounty === "045") {
      var kisiiSubcounties = ["Bonchari", "South Mugirango", "Bomachoge Borabu", "Bobasi", "Bomachoge Chache", "Dagoretti" , "Kitutu Chache North", "Kitutu Chache South" , "Bobasi Chache"];
      populateOptions(subcountySelect, kisiiSubcounties);

    } else if (selectedCounty === "046") {
      var nyamiraSubcounties = ["West Mugirango", "North Mugirango", "Borabu", "South Mugirango Nyamira"];
      populateOptions(subcountySelect, nyamiraSubcounties);

    } else if (selectedCounty === "047") {
      var nairobiSubcounties = ["Westlands", "Dagoretti North", "Dagoretti South", "Lang'ata", "Kibra", "Roysambu", "Kasarani", "Ruaraka", "Embakasi South", "Embakasi North", "Embakasi Central", "Embakasi East", "Embakasi West" , "Makadara" , "Kamukunji" , "Starehe" , "Mathare"];
      populateOptions(subcountySelect, nairobiSubcounties);

    }
}
  // Populate options in a select element
  function populateOptions(selectElement, options) {
    for (var i = 0; i < options.length; i++) {
      var option = document.createElement("option");
      option.text = options[i];
      option.value = options[i];
      selectElement.add(option);
    }

  }
</script>
        </div>
    </body>
</html>