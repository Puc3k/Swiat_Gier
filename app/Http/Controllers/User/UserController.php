<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile(){

        return view('me.profile',[
            'user'=> Auth::user(),
        ]);
    }
    public function edit()
    {

        return view('me.edit',[
            'user'=> Auth::user(),
        ]);
    }
    public function update(UpdateUserProfile $request)
    {
        $this->userRepository->updateModel(
            Auth::user(), $request->validated()
        );
        return redirect()
            ->route('me.profile')
            ->with('status','Profil został zaaktualizowany');
    }


}
