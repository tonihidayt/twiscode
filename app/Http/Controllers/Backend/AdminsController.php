<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Admins;
use Input;  
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Alert;
use config;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(Request $request, Builder $htmlBuilder)
    {      
        $admins = Admins::all();
        if ($request->ajax()) {
            $ajax = DataTables::of(Admins::query())->escapeColumns([])->make(true);
            return $ajax;
    }
    
       $dataTable = $htmlBuilder
            ->addColumn(['data' => 'admin_id', 'name' => 'admin_id', 'title' => 'ID'])
            ->addColumn(['data' => 'username', 'name' => 'username', 'title' => 'No. Hp', 'render' => function () {
                $editUrl = route('backend.admins.edit', '');
                return "function(data,type,full,meta){ return '<a href=" . $editUrl . "/'+full.admin_id+'>'+data+'</a>'; }";
            }])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Admin Name', 'render' => function () {
                $editUrl = route('backend.admins.edit', '');
                return "function(data,type,full,meta){ return '<a href=" . $editUrl . "/'+full.admin_id+'>'+data+'</a>'; }";
            }])
            ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
            
           ->addAction(['data' => '{{url(assets/images/delete.png)}}' ,'name' => 'action', 'title' => 'Action', 'class' => 'actions-column', 'render' => function () {
             //    $editUrl = route('backend.admins.delete', '');
                 return "function(data,type,full,meta){ return '<a><button class=\'btn btn-danger\' data-toggle=\'modal\' data-target=\'#delete\' onclick=\'conAdmin('+full.admin_id+')\'> Delete</button></a>'; }";
            }])
            ->parameters([ 
                'buttons'     => ['pdf'],
                'ordering'    => false,
                'processing'  => '',
                'autoWidth'   => false,
                'pageLength'  => '15',
                'searchDelay' => '1000',
            ]);

    return view('backend.admin.index', compact('dataTable', 'admins')); 
    }


    public function loadAdmin()
    {
        return Datatables::of(Admins::query())->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:25|unique:admins',
            'email'    => 'required|unique:admins',
            'password' => 'required|confirmed',
        ]);

        $status         = array('status' => $request->has('status') ? 1 : 0);
        $remember_token = array('remember_token' => ''); 
        $data           = array_except(Input::all(), ['_method', '_token', 'status', 'password','password_confirmation']);
        $input          = array_merge($status,$data);
        if (!empty($request->password)) {
            $password   = array('password' => bcrypt($request->password));
            $input      = array_merge($password, $input);
        }        
        Admins::create($input);
        
        return redirect()->route('backend.admins.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $admin = Admins::findOrFail($id);
        return view('backend.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'username' => 'required|max:25|unique:admins,admin_id,' . $id . ',admin_id',
            'email'    => 'required|unique:admins,admin_id,' . $id . ',admin_id',
            'password' => 'required|confirmed',
        ]);

        $status         = array('status' => $request->has('status') ? 1 : 0);
        $remember_token = array('remember_token' => ''); 
        $data           = array_except(Input::all(), ['_method', '_token', 'status', 'password','password_confirmation']);
        $input          = array_merge($status,$data);
        if (!empty($request->password)) {
            $password   = array('password' => bcrypt($request->password));
            $input      = array_merge($password, $input);
        }        

        $admin = Admins::findOrFail($id);
        $admin->update($input);
        
        return redirect()->route('backend.admins.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {  
        $value = Admins::select('username')->find($id);
        $admin = Admins::select('admin_id')->find($id);
        

        if ($value !== 'lala') {
            $admin = Admins::findOrFail($id);
            $admin->delete();
            Alert::success('Delete admin success', 'Success');
            return redirect()->back();
        } 
        elseif ($value == 'lala') {
            Alert::warning('You cannot delete category named ', 'Failed');
            return redirect()->back();
        }
        else {
            Alert::warning('You cannot delete category named ', 'Failed');
            return redirect()->back();
        }
    }
}
