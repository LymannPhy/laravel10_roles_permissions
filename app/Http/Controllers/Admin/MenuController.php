<?php
    
namespace App\Http\Controllers\Admin;
    
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MenuController extends Controller
{ 
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:menu-list|menu-create|menu-edit|menu-delete');
         $this->middleware('permission:menu-list', ['only' => ['index','show']]);
         $this->middleware('permission:menu-create', ['only' => ['create','store']]);
         $this->middleware('permission:menu-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = DB::
        table("permissions")
        ->paginate(5);
        return view('backend.menu.index',compact('menu'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::
       table("permissions")
        ->insert([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
    
        return redirect()->route('menus.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = DB::
        table("permissions")
        ->where('id','=', $id)
        ->first();
        return view('backend.menu.show',compact('menu'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = DB::
        table("permissions")
        ->where('id','=', $id)
        ->first();
        return view('backend.menu.edit',compact('menu'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //  request()->validate([
        //     'name' => 'required',
        //     'guard_name' => 'required',
        // ]);

        DB::
        table("permissions")
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
    
        return redirect()->route('menus.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('menus.index')
                        ->with('success','Product deleted successfully');
    }
}