<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Traits\HasRoles;
use Validator;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
   
class User1Controller extends BaseController
{
    use HasRoles;
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC');
        if(!\Auth::user()->hasRole('Admin')) {
            $data = $data->whereHas('roles', function($q) {
                $q->where('name', '!=', 'Admin');
            });
        }

        $data = $data->paginate(5);
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $role = Role::where('name', 'Author')->first();
        $user->assignRole($role); //assign role to user
        return $user; 
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $product = Product::find($id);
  
    //     if (is_null($product)) {
    //         return $this->sendError('Product not found.');
    //     }
   
    //     return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    // }
    
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Product $product)
    // {
    //     $input = $request->all();
   
    //     $validator = Validator::make($input, [
    //         'name' => 'required',
    //         'detail' => 'required'
    //     ]);
   
    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }
   
    //     $product->name = $input['name'];
    //     $product->detail = $input['detail'];
    //     $product->save();
   
    //     return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    // }
   
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Product $product)
    // {
    //     $product->delete();
   
    //     return $this->sendResponse([], 'Product deleted successfully.');
    // }
}