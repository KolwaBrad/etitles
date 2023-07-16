<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Block;
use App\Models\CBlock;
use App\Models\User;
use App\Models\Title;
use App\Models\Transaction;
use App\Models\Subcounty;
use App\Models\Admin;
use Hash;
use Session;


class Blockchain extends Block
{
    private $chain;
    private $difficulty;

    public function __construct()
    {
        $this->chain = [$this->createGenesisBlock()];
        $this->difficulty = 2;
    }

    public function createGenesisBlock()
    {
        return new Block(0, 'Genesis Block', 'Exodus Block', '0');
    }

    public function getLatestBlock()
    {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock($newBlock)
    {
        $newBlock->previousHash = $this->getLatestBlock()->getHash();
        $newBlock->hash = $newBlock->calculateHash();
        $this->chain[] = $newBlock;
        $newBlock->saveToDatabase();
    }

    public function isChainValid()
    {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->getHash() !== $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->getHash()) {
                return false;
            }
        }

        return true;
    }

    public function addblocks($mytitledata){
        $blockchain = new Blockchain();
        $newowner_id = $mytitledata['oid'];
        $newtitle_id = $mytitledata['tid'];
        // Add some blocks
        $blockchain->addBlock(new Block(1, $newowner_id, $newtitle_id, ''));


        

    }
    /*
    public function addmoreblocks(){
        $blockchain = new Blockchain();

        // Add some blocks
        $blockchain->addBlock(new Block(1, 'Data 1', 'Brain', ''));
        $blockchain->addBlock(new Block(2, 'Data 2', 'Brain', ''));
        $blockchain->addBlock(new Block(3, 'Data 3', 'Brain', ''));
        
        // Check if the blockchain is valid
        if ($blockchain->isChainValid()) {
            echo "Blockchain is valid.\n";
        } else {
            echo "Blockchain is not valid.\n";
        }
    }
    */


    public function updateblocks($myblocktitledata){
        $newowner_id = $myblocktitledata['oid'];
        $newtitle_id = $myblocktitledata['tid'];   


// Retrieve the latest block's index from the database
//$maxIndex = DB::table('blocks')->max('indexb');
$maxIndex = CBlock::where('title_id', $newtitle_id)
->max('indexb');


// Create a new instance of the Blockchain
$blockchain = new Blockchain();

$tableName = "blocks";
// Fetch existing blocks from the database

$blocks = CBlock::where('title_id', $newtitle_id)
    ->orderBy('indexb', 'asc')
    ->get();
function deleteAllRowsN($newtitle_id) {
//DB::table('blocks')->delete();
$blocks = CBlock::where('title_id', $newtitle_id)->get();
$blocks->each->delete();

echo "Data deleted successfully.";  
}
// Check if the blockchain is valid
if ($blockchain->isChainValid()) {
    deleteAllRowsN($newtitle_id);
    echo "Blockchain is valid.\n";
} else {
    echo "Blockchain is not valid.\n";
}


// Iterate through the rows and add the blocks to the blockchain


// Iterate through the rows and add the blocks to the blockchain
foreach ($blocks as $row) {
    
    $block = new Block($row->indexb, $row->owner_id, $row->title_id, $row->previousHash);
    $block->hash = $row->hash;
    $blockchain->addBlock($block);
}


// Create a new block
$newIndex = $maxIndex + 1;
$newBlock = new Block($newIndex, $newowner_id, $newtitle_id, $blockchain->getLatestBlock()->getHash());


function deleteAllRows($newtitle_id) {
   // $blocks = DB::table('blocks')->orderBy('indexb', 'asc')->get();
   $blocks = CBlock::where('title_id', $newtitle_id)
   ->orderBy('indexb', 'asc')
   ->get();

if ($blocks->count() > 0) {
   // DB::table('blocks')->delete();
   $blocks = CBlock::where('title_id', $newtitle_id)->get();
   $blocks->each->delete();
    echo "Data ";
    
} else {
    echo "No data found.";
}
}









$initialblockchain = $blockchain;


// Add the new block to the blockchain
// $blockchain->addBlock($newBlock);

// Store the new block in the database




// Check if the blockchain is valid
if ($blockchain->isChainValid()) {


    $cblock = new CBlock();
    $cblock->indexb = $newBlock->index;
    $cblock->owner_id = $newBlock->owner_id;
    $cblock->title_id = $newBlock->title_id;
    $cblock->previousHash = $newBlock->previousHash;
    $cblock->hash = $newBlock->hash;
    $res = $cblock->save();
    
    echo "Blockchain is valid.\n";
    return view('transact.completedtransfer');
} else {
    echo "Blockchain is not valid.\n";
}

    }
    public function getblocks()
{
    // Retrieve the blocks from the blockchain
    //$blocks = DB::table('blocks')->orderBy('indexb', 'asc')->get();
    // $blocks = CBlock::orderBy('title_id', 'asc')
    //->orderBy('indexb', 'asc')
    //->get();

    $blocks = CBlock::orderBy('created_at', 'desc')
    ->orderBy('title_id', 'asc')
    ->orderBy('indexb', 'asc')
    ->get();

    session(['allblocks' => $blocks]);

    // Pass the blocks data to the view
    return view('blockstuff.allblocks');
}

public function blockchainindex(){
    return view("blockchainindex");
}
public function blockcommands(){
    return view("blockcommands");
}
public function alllands(){
    return view("alllands");   
}
/*
public function landadded(){
return view("landadded");
}
*/
public function addland(){
return view("addland");
}

public function viewlands(){
    // Get the products from the database
$title = Title::all();


return view('alllands', compact('title'));

}

public function landadded(){
    return view("landadded");
}

public function addTitle(Request $request)
{
$title = new Title();
$title->title_id = $request->input('title_id');
$title->titledeed = $request->file('titledeed');

if ($request->hasFile('titledeed')) {
    $titledeed = $request->file('titledeed');
    $titledeedName = time() . '.' . $titledeed->getClientOriginalExtension();
    $titledeed->storeAs('title_titledeeds', $titledeedName);
    $title->titledeed = 'title_titledeeds/' . $titledeedName;
}

if ($request->hasFile('photograph')) {
    $photograph = $request->file('photograph');
    $photographName = time() . '.' . $photograph->getClientOriginalExtension();
    $photograph->storeAs('title_photographs', $photographName);
    $title->photograph = 'title_photographs/' . $photographName;
}

    $title->countycode = $request->input('county');


       // Get the user from the database
      $sbb = Subcounty::where('subcountyname','=',$request->subcountyid)->first();
       if($sbb){
     
    $title->subcountyid = $sbb->id;
        }  else {


            echo "The user does not exist";
            
          
          }
          


$title->location_name = $request->input('location_name');
$title->approximate_area = $request->input('approximate_area');
$title->owner_id = $request->input('owner_id');
$title->price = $request->input('price');

$title->save();

if($title) {
    $title = Title::where('location_name','=',$request->location_name)->first();

    $newowner_id = $request->input('owner_id');
    $newtitle_id = $request->input('title_id');
    $mytitledata = [
        'oid' => $newowner_id,
        'tid' => $newtitle_id,
    ];
    $result = $this->addblocks($mytitledata);

    return view('landadded', ['result' => $result]);

} else {
return back()->with('fail','Something went wrong');
}
}

public function transferapproverequest(Request $request) {

    $titleId = $request->input('title_id');
    $bidderId = $request->input('bidder_id');
    $createdAt = $request->input('created_at');
    $transfer = $request->input('transfer');

    
    
    $transaction = Transaction::where('title_id', $titleId)
        ->where('bidder_id', $bidderId)
        ->where('created_at', $createdAt)
        ->first();
    
    if ($transaction) {

        $transaction->transfer = $transfer;
        $transaction->save();

        $title = Title::where('title_id','=',$titleId)->first();
        if($title){

            $title->owner_id = $bidderId;
            $title->save();
        }

        $newowner_id = $request->input('bidder_id');
        $newtitle_id = $request->input('title_id');

        $myblocktitledata = [
            'oid' => $newowner_id,
            'tid' => $newtitle_id,
        ];
        $blockresult = $this->updateblocks($myblocktitledata);

        // $result = $this->admintransacts();
        return $blockresult;

    } else {
        return back()->with('fail','An error Occurred');   
    }

}

}


