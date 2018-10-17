<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\User;

use App\Role;

use App\Http\Requests;
use App\Http\Controllers\Controller;

Class Testing extends Controller{
    
    public $user1;
    public $user2;
    public $user3;
    
    function __construct ($value) {
    }
    
    
    public function name(){
        $data = $user1;
        return $data;
    }
    
    
    
}