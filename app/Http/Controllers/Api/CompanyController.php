<?php

namespace App\Http\Controllers\Api;

use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return CompanyResource::collection($companies, Response::HTTP_OK);
    }
    public function allcomp()
    {
        $companies = Company::all();
        return CompanyResource::collection($companies, Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'email',
            'website' => 'min:6',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        /*if ($request->hasFile('logo')) {
            $path = base_path();
            //$path = str_replace("branditNG", "public_html", $path); // <= This one !
            $destinationPath = $path . '/storage/app/public'; // upload path
            $extension = $request->file('logo')->getClientOriginalExtension(); // getting image extension
            $fileName = $request->file('logo')->getClientOriginalName(); // renameing image
            $request->file('logo')->move($destinationPath, $fileName); // uploading file to given path
            $dbName = '../storage/app/public/'. $fileName;
            $company->logo = $dbName;
        }
        if($request->hasFile('logo')){
            $fileName = $request->file('logo')->getClientOriginalName();
            Storage::putFile('storage/app/public',$request->file('logo'));
            $dbName = $fileName;
            $company->logo = $dbName;
        }*/
        if($request->file('logo')) {
            $fileName = $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('/', $fileName, 'public');

            $company->logo = '/storage/' . $filePath;
        }
        $company->website = $request->website;
        $company->save();

        return response([
            'data' => new CompanyResource($company)
        ],Response::HTTP_CREATED);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email' => 'email',
            'website' => 'min:6',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->save();

        return response([
            'data' => new CompanyResource($company)
        ],Response::HTTP_OK);
    }
    public function destroy($id)
    {
        Company::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
