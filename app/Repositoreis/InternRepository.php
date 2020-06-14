<?php
    namespace App\Repositoreis;

    use App\Models\intern_version;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $userName = Auth::user()->name;
            $query = intern_version::select('name','created_at','guid')->get();
            $count = count($query);
            $pages = $count/5;
            if(!is_integer($pages)){
                $pages = (int)$pages + 1;
            }
            $option = [
                'key_search' => ' ',
                'page' => 1,
                'pages' => $pages,
                'take' => 5,
                'user-name' => $userName,
                'count' => $count,
            ];

            //get
            $get = intern_version::skip(0)->take(5)->select('name', 'created_at', 'guid')->get();
            // result
            $result = [
                'option' => $option,
                'data' => $get
            ];
            return $result;
        }

        // select
        function Select(){
            $repo = intern_version::first();
            return $repo;
        }

        // getTake
        function getTake($data){
            $userName = Auth::user()->name;
            // khoi tao key_search
            $key_search = isset($data->key_search) ? $data->key_search : '';
            $page = isset($data->page) && $data->page > 0 ? $data->page : 1;
            // neu khong ton tai take thi la 5
            $take = isset($data->take) && $data->take > 0 ? $data->take : 5;
            // neu khong ton tai p thi mac dinh la trang 1
            $skip = ($page - 1)*$take;
            // $skip = 0;
            // khoi tao p
            $pages = 0;
            // khoi tai $get
            $get = '';
            // khoi tao count
            $count = 0;
            // query builder/ search
            if( $key_search == '' || $key_search == ' '){
                $query = intern_version::all();
                $count = count($query);
                $pages = $count/$take;
                // neu khong thuoc integer thi
                if(!is_integer($pages)){
                    $pages = (int)$pages + 1;
                }
                //
                if($page > $pages){
                    $skip = ($pages-1)*$take;
                }
                $get = intern_version::skip($skip)->take($take)->select('name', 'created_at', 'guid')->get();
            }else{
                $search = $data->key_search;
                $query = intern_version::where('name', 'like', '%'.$search.'%')->get();
                $count = count($query);
                $pages = $count/$take;
                // neu khong thuoc integer thi
                if(!is_integer($pages)){
                    $pages = (int)$pages + 1;
                }
                if($page > $pages){
                    $skip = ($pages-1)*$take;
                }
                $get = intern_version::where('name', 'like', '%'.$key_search.'%')->skip($skip)->take($take)->select('name', 'created_at', 'guid')->get();
            }
            $option = [
                'key_search' => $key_search,
                'page' => $page,
                'pages' => $pages,
                'take' => $take,
                'user-name' => $userName,
                'count' => $count
            ];
            // result
            $result = [
                'option' => $option,
                'data' => $get
            ];
            return $result;
        }

        // update
        function Update($req){
            $repo =intern_version::where('guid',$req->_id)->first();
            $repo->name = $req->_name;
            $repo->save();
        }

        // add
        function Add($req){
            $add = new intern_version;
            $add->password = Hash::make($req->_password);
            $add->name = $req->_name;
            $add->guid = $this->guidv4();
            $add->created_at = date('Y-m-d H:i:s',time());
            $add->save();
        }

        //delete
        function Delete($guid){
            intern_version::where('guid', $guid)->delete();
        }

        // search
        function Search($search){
            $like = $search->like;
            $skip = $search->skip;
            $take = $search->take;
            // dd($skip);
            $search = intern_version::where('name', 'like', '%'.$like.'%');
            if($skip !== null){
                $search = $search->skip($skip);
            }else{
                $search = $search->skip(0);
            }

            // take
            if($take !== null){
                $search = $search->take($take);
            }else{
                $search = $search->take(5);
            }
            // $search = $search->get();
            $search = $search->Select('name','created_at','guid')->get();
            // $search = $search->pluck('name');
            return $search;
        }
    }

?>