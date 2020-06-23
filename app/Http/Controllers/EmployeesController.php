<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class EmployeesController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$employees = Employee::orderBy('created_at', 'DESC')->paginate(1);
		return view('employees.index', compact('employees'));
    }
    
    /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$companies = Company::get();
		return view('employees.create', compact('companies'));
    }
    
    /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreEmployeeRequest $request)
	{
		try {
            DB::beginTransaction();
            $employee = Employee::create($request->all());
            DB::commit();
            $response = $employee->first_name . ' has been created!';
		} catch (\Throwable $t) {
            DB::rollback();
			return redirect()->back()->withInput($request->all())->withErrors(['error' => $t->getMessage()]);
		}

		return redirect()->route('employees.index')->withSuccess($response);
    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Employee $employee)
	{
        $companies = Company::get();
		return view('employees.show', compact('employee', 'companies'));
	}

    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Employee $employee)
	{
		$companies = Company::get();
		return view('employees.edit', compact('employee', 'companies'));
    }
    
    /**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateEmployeeRequest $request, Employee $employee)
	{
		$employee->update($request->all());
		return redirect()->route('employees.index')->withSuccess($employee->first_name . ' has been updated!');
	}
    

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Employee $employee)
	{
		$message = $employee->first_name . $employee->last_name . " deleted!";
		$employee->delete();

		return redirect()->route('employees.index')->withSuccess($message);
	}
}
