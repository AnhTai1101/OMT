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
    public function __construct(InternRepository $repo)
    {
        $this->repo = $repo;
    }

    function all(){
        $repo = $this->repo->SelectAll();
        // return collect($this->repo->SelectAll());
        return view('index', compact('repo'));
    }

    function getAll(){
        $getAll = $this->repo->SelectAll();
        return collect($getAll);
    }

    // select
    function select(){

        return collect($this->repo->Select());
    }

    // post new
    function add(Request $req){
        $this->repo->Add($req);
        $data = $this->repo->SelectAll();
        return collect($data);

        // return redirect(route('home1'));
    }

    //del
    function del(Request $guid){
        $guid = $guid->_id;
        $this->repo->Delete($guid);
        $data = $this->repo->SelectAll();
        return collect($data);

    }

    // update
    function update(Request $req){
        $this->repo->Update($req);
        $data = $this->repo->SelectAll();
        return collect($data);

    }

    //search
    function search(Request $search){
        $data =  $this->repo->Search($search);
        return collect($data);
        // return json_encode($data[0]->created_at);
    }

    //search2
    function search2(Request $search2){
        $result = $this->repo->getTake($search2);
        return collect($result);
    }

    // test
    function test(){
        return view('tai.test.test');
    }
    //post-test
    function postTest(Request $search){
        $result = $this->repo->getTake($search);
        return collect($result);
    }
}
