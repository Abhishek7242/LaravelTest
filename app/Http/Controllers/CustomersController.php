<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

use function Laravel\Prompts\search;

class CustomersController extends Controller
{
    //
    public function index()
    {
        $url = url('/customers');
        $customer = [];
        $title= 'Registration form';
$data =compact('url','title','customer');
        return view('form')->with($data);
    }

    public function store(Request $request)
    // 
    {
        
       //INSERT QUERY
    //    p($request->all());
    //    die;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers',
            // 'gender' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'dob' => 'required|date',
            'password' => 'required|string|min:6',
        ]);
        try {
            // Create a new customer instance and fill it with validated data
            $customer = new Customers;
            $customer->name = $validatedData['name'];
            $customer->email = $validatedData['email'];
            $customer->gender = $request['gender'];
            $customer->address = $validatedData['address'];
            $customer->country = $validatedData['country'];
            $customer->state = $validatedData['state'];
            $customer->dob = $validatedData['dob'];
            $customer->password = md5($validatedData['password']); // Note: Consider using bcrypt for password hashing

            // Save the customer to the database
            $customer->save();

            // Debug: Check if the customer is saved
            echo 'Customer saved successfully!';
        } catch (\Exception $e) {
            // Handle any errors
            echo 'Error saving customer: ' . $e->getMessage();
        }
        return redirect('customers/view');
    }
    public function view(Request $request)
    {
        $search =$request['search']??'';
        if ($search!='') {
            # code...
            $customers = Customers::where('name', 'LIKE', "%$search%")->orWhere('country', 'LIKE', "%$search%")->get();


        } else {
            # code...
            $customers =Customers::paginate(15);
        }
        
        $data = compact('customers','search');
        return view('CustomerView')->with($data);
    }

    public function trash()
    {
        $customers = Customers::onlyTrashed()->get();
        $search = ''; // Or null, false, '', or any non-empty string

        $data = compact('customers','search');
        return view('trash')->with($data);
    }
    public function delete($id)
    {
   $customers = Customers::find($id);
   if (!is_null($customers)) {
            $customers->delete();
            }
        return redirect('customers/view');

    }
    public function forceDelete($id)
    {
        $customers = Customers::withTrashed()->find($id);

   if (!is_null($customers)) {
            $customers->forceDelete();
            }
        return redirect('customers/trash');

    }
    public function restore($id)
    {
   $customers = Customers::withTrashed()->find($id);
   if (!is_null($customers)) {
            $customers->restore();
            }
        return redirect('customers/trash');

    }
    
    public function edit($id)
    {
   $customer = Customers::find($id);
   if (is_null($customer)) {
        return redirect('customers/view');
            }else{
                $url =url('/customer/update').'/'.$id;
        $title='Update form';

                $data= compact('customer','url','title');
                return view('form')->with($data);
            }

    }
    public function update($id,Request $request)
    {
   $customer = Customers::find($id,);
   if (is_null($customer)) {
        return redirect('customers/view');
            }else{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                // 'gender' => 'required|string',
                'address' => 'required|string',
                'country' => 'required|string',
                'state' => 'required|string',
                'dob' => 'required|date',
            ]);
            try {
                // Create a new customer instance and fill it with validated data
                $customer->name = $validatedData['name'];
                $customer->email = $validatedData['email'];
                $customer->gender = $request['gender'];
                $customer->address = $validatedData['address'];
                $customer->country = $validatedData['country'];
                $customer->state = $validatedData['state'];
                $customer->dob = $validatedData['dob'];

                // Save the customer to the database
                $customer->save();

                // Debug: Check if the customer is saved
                echo 'Customer saved successfully!';
            } catch (\Exception $e) {
                // Handle any errors
                echo 'Error saving customer: ' . $e->getMessage();
            }
            return redirect('customers/view');
            }

    }

}
