<?php

namespace App\Http\Controllers\Api;

use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return EmployeeResource::collection($employees, Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'company_id' => 'required',
            'email' => 'email',
        ]);

        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return response([
            'data' => new EmployeeResource($employee)
        ],Response::HTTP_CREATED);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'company_id' => 'required',
            'email' => 'email',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return response([
            'data' => new EmployeeResource($employee)
        ],Response::HTTP_OK);
    }
    public function destroy($id)
    {
        Employee::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
