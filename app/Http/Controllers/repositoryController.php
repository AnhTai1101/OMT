<?php

namespace App\Http\Controllers;

use App\Models\intern_version;
use App\Repositoreis\InternRepository;
use Illuminate\Http\Request;

class repositoryController extends Controller
{
    /**
     * Class constructor.
     */
    protected $repo;
    public function __construct()
    {
        $this->repo = new InternRepository;
    }

    function all(){
        $repo = $this->repo->SelectAll();
        // return collect($this->repo->SelectAll());
        return view('index', compact('repo'));
    }

    // select
    function select(){

        return collect($this->repo->Select());
    }

    // post new
    function add(Request $req){
        $this->repo->Add($req);
        $this->repo->SelectAll();
        return redirect(route('home'));
    }

    //del
    function del($guid){
        $this->repo->Delete($guid);
        return redirect(route('home'));
    }

    // update
    function update(Request $req){
        $guid = $req->guid;
        $this->repo->Update($req,$guid);
        return redirect(route('home'));

    }
}
