<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Supplier::latest()->paginate(5);
        return view('supplier.index',compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sorderid' => 'required|min:3|max:255',
            'type' => 'required|min:3|max:255',
            'date' => 'required',
            'rcvq' => 'required',
            'amount' => 'required|min:3|max:255',
            'supid' => 'required|min:3|max:255',
            'supname' => 'required|min:3|max:255',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $input = $request->all();
        Supplier::create($input);
        return redirect()->route('suppliers.index')->with('success','Supplier details created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier.show',compact('supplier'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit',compact('supplier'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'sorderid' => 'required|min:3|max:255',
            'type' => 'required|min:3|max:255',
            'date' => 'required',
            'rcvq' => 'required',
            'amount' => 'required|min:3|max:255',
            'supid' => 'required|min:3|max:255',
            'supname' => 'required|min:3|max:255',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $input = $request->all();
        $supplier->update($input);
        return redirect()->route('suppliers.index')->with('success','Supplier details updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')
        ->with('success','Supplier details deleted successfully');
    }
}
