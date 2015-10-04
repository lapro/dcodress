<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Role;
use Datatables;

class UsersController extends Controller
{
    //
    public $column = [
    	'Name',
        'Email',
    	"Role",
    ];

    public $no = 0;

    public function getIndex(){

    	return view("backoffice.user_role.index")
    	->with('column',$this->column);
    }

    public function getDatatables(Request $request){
        
        $datas = User::select([
                'id',
                'name',
                'email',
            ]);

       //penomoran saat paging
       $this->no = $request->get('start')+1;
       
       return Datatables::of($datas)
            ->addColumn('aksi', function ($data) {
                    return '
                    <a href="'.url("backoffice/users/role/$data->id").'" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#remote-modal-sm"><i class="glyphicon glyphicon-edit"></i> Role</a>
                    <a href="'.url("adm/products/$data->id").'" data-method = "DELETE" data-confirm="yakin untuk menghapus?" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Suspend</a>
                    ';
                })
            ->addColumn('no', function ($data){
                    return $this->no++;
                })
             ->addColumn('role', function ($data){
                    $roles = "";
                    $label = "";
                    foreach($data->roles as $v){
                    	switch ($v->id) {
                    		case 1:
                    			$label = "success";
                    			break;
                    		case 4:
                    			$label = "default";
                    			break;
                            case 2:
                                $label = "warning";
                            break;
                            case 3:
                                $label = "info";
                            break;
                    	}
                    	$roles.="<span class='label label-$label' style='font-size:12;margin-left:5px'>$v->name</span>";
                    }
                    return $roles;
                })
            ->removeColumn('id')
            ->make(true);
    
    }

    public function getRole($id){

    	$user = User::find($id);
    	$role = Role::all();
    	return view("backoffice.user_role.role_modal")
        ->with("role",$role)
        ->with("user",$user);
    
    }

    public function postRole($id, Request $request){
        
        $user = User::find($id)->roles()->sync($request->get("roles"));
        return redirect(url("backoffice/users"));
    }

}//end of class
