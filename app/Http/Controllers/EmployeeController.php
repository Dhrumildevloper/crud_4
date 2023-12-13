<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Employee::orderBy('id', 'DESC')->paginate(5);
        return view('employee.list', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'designation' => 'required',
            'department_id' => 'required',
            'image' => 'sometimes|image:jpeg,jpg,png,gif',
        ]);

        if ($validator->passes()) {
            $employee = new Employee($request->only(['name', 'email', 'address', 'designation', 'department_id']));
            $employee->save();


            if ($request->hasFile('image')) {
                $new_file_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('uploads/employee', $new_file_name);
                $employee->image = $new_file_name;
                $employee->save();
            }

            Session::flash('success', 'Employee added successfully.');

            return redirect()->route('employees.index');
        } else {
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {

        $employee = Employee::findorFail($id);
        return view('employee.edit', ['employee' => $employee]);
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'designation' => 'required',
            'department_id' => 'required',
            'image' => 'sometimes|image:jpeg,jpg,png,gif',
        ]);

        if ($validator->passes()) {
            $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->designation = $request->designation;
            $employee->department_id = $request->department_id;
            $employee->save();


            if ($request->image) {
                $oldImage = $employee->image;
                $ext = $request->image->getClientOriginalExtension();
                $new_file_name = time() . '.' . $ext;
                $request->image->move('uploads/employee', $new_file_name);
                $employee->image = $new_file_name;
                $employee->save();


                if ($oldImage) {
                    File::delete('uploads/employee/' . $oldImage);
                }
            }

            return redirect()->route('employees.index')->with('success', 'Employee Data updated successfully.');
        } else {

            return redirect()->route('employees.edit', $id)->withErrors($validator)->withInput();
        }
    }


    public function destroy($id, Request $request)
    {
        $employee = Employee::findorFail($id);
        File::delete('uploads/employee/' . $employee->image);
        $employee->delete();

        Session::flash('success', 'Employee Deleted successfully.');

        return redirect()->route('employees.index');
    }

    public function register()
    {
        return view('employee.register');
    }

    public function registerPost(Request $request)
    {

        $user = new User();

        $user->name = $request->user_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        $user->save();

        return back()->with('success', 'Employee Data Save successfully.');
    }

    public function login()
    {
        return view('employee.login');
    }

    public function loginPost(Request $request)
    {

        $credetails = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetails)) {
            return redirect('employees')->with('success', 'Login Sucessfully');
        }

        return redirect('employees/login')->with('error', 'Email Or Password Does Not Exist');
    }

    public function data()
    {
        $department = department::where('id', 1)->with('data')->first();
        dd($department);
    }
    public function list()
    {
        $employees = Employee::orderBy('id', 'DESC')->paginate(5);
        return view('employee.list', ['employees' => $employees]);
    }
}
