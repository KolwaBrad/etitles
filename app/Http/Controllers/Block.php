<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Web3\Web3;
use Web3\Contract;
use Web3\Utils;
use App\Models\CBlock;
use App\Models\User;
use App\Models\Title;
use App\Models\Transaction;
use App\Models\Subcounty;
use App\Models\Admin;
use Hash;
use Session;

class Block extends Controller
{
    public $index;
    public $owner_id;
    public $title_id;
    public $previousHash;
    public $hash;

    public function __construct($index, $owner_id, $title_id, $previousHash)
    {
        $this->index = $index;
        $this->owner_id = $owner_id;
        $this->title_id = $title_id;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash()
    {
        return hash('sha256', $this->index . $this->owner_id . $this->title_id . $this->previousHash);
    }

    public function getHash()
    {
        return $this->hash;
    }
  


    // ...

    public function saveToDatabase()
    {

        $cblock = new CBlock();
        $cblock->indexb = $this->index;
        $cblock->owner_id = $this->owner_id;
        $cblock->title_id = $this->title_id;
        $cblock->previousHash = $this->previousHash;
        $cblock->hash = $this->hash;
        $res = $cblock->save();
        
    }




}