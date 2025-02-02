<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class UserController extends Controller
{
    public function tabel(Request $request)
{
    $keyword = $request->input('keyword');
    

    try {
        $users = User::where('level', 'user')
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        $admins = User::where('level', 'admin')
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

    } catch (\Exception $e) {
        dd($e->getMessage());
    }

    return view('pages.Users.UserManagement', compact('users', 'admins'));
}



    public function count()
    {
        $admins = ModelsUser::where('level', 'admin')->get();
        return view('UserManagement', compact('admin'));
    }


    public function destroy($id)
    {
        $blog = User::where('id', $id)->delete();

        return redirect('/UserManagement');
    }
    public function insertAdminUser(Request $request)
    {
        // Validate the input data, including the file
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'alamat' => 'nullable|string',
            'password' => 'required|string',
            'photo' => 'nullable',
            // Adjust the file size as needed
        ]);
        $files = $request->file('photo');
        $fileName = time() . '.' . $files[0]->getClientOriginalName();
        $filePath = 'assets/img/profile';
        $files[0]->move(public_path($filePath), $fileName); // Move the file to the specified directory

        // Save the file path in the database
        $photoPath = $filePath . '/' . $fileName; // Update the photo path

        // Create a new user record
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->alamat = $validatedData['alamat'];
        $user->email_verified_at = "2024-03-09 15:58:04";
        $user->password = Hash::make($validatedData['password']);
        $user->level = 'admin';
        $user->photo = $fileName; // Save the file path in the database

        $user->save();
        // Redirect or return a response as needed
        return redirect('/UserManagement')->with('success', 'Admin user created successfully');
    }

    public function updateAdminUser(Request $request, $id)
    {
        // Validate the input data, including the file
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'alamat' => 'nullable|string',
            // Adjust the file size as needed
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect('/admin-profile')->with('error', 'Admin user not found');
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->alamat = $validatedData['alamat'];

        $user->save();

        return back()->with('success', 'Admin user updated successfully');
    }

    public function updateAdminUserPhoto(Request $request)
    {
        // Find the user by ID
        $user = User::find($request->id_user);

        if (!$user) {
            return redirect('/admin-profile')->with('error', 'Admin user not found');
        }

        // Check if a new photo was uploaded
        $files = $request->file('photo');
        $fileName =  time() . '.' . $files[0]->getClientOriginalName();
        $filePath = 'assets/img/profile';
        $files[0]->move(public_path($filePath), $fileName); // Move the file to the specified directory
        $user->photo = $fileName;
        $user->save();

        return back()->with('success', 'Admin user updated successfully');
    }
}
