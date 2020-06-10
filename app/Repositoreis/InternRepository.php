<?php
    namespace App\Repositoreis;

    use App\Models\intern_version;
    use Illuminate\Http\Request;

    class InternRepository{

        // guidv4
        function guidv4()
        {
            if (function_exists('com_create_guid') === true)
                return trim(com_create_guid(), '{}');

            $data = openssl_random_pseudo_bytes(16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }

        // all
        function SelectAll(){
            $repo = intern_version::all();
            return collect($repo);
        }

        // select
        function Select(){
            $repo = intern_version::first();
            return collect($repo);
        }

        // edit
        // function Edit($id){
        //     $repo = intern_version::where('guid', $id);
        //     return collect($repo);
        // }

        // update
        function Update($req,$guid){
            $repo =intern_version::where('guid',$guid)->first();
            $repo->name = $req->name;
            $repo->save();
        }

        // add
        function Add($req){
            $add = new intern_version;
            $add->name = $req->_name;
            $add->guid = $this->guidv4();
            $add->created_at = date('Y-m-d H:i:s',time());
            $add->save();
        }

        //delete
        function Delete($guid){
            intern_version::where('guid', $guid)->delete();


        }
    }

?>