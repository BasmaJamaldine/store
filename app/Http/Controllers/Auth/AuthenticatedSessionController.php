<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {

        return view('auth.login');
    }
    public function index(): View
    {
        $users = User::where("role", "!=", "admin")->get();
        return view('adminUser', compact('users'));
    }
    public function friends(){
        $users=User::where("id","!=",auth()->user()->id)->get();
        return view('friends',compact('users'));
    }
    public function makeModerator(User $user)
    {
        if ($user->role === 'moderator') {
            $user->role = 'user';
        } else {
            $user->role = 'moderator';
        }
        $user->save();

        return back();
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
    public function destroyUser(User $user)
    {

        $user->delete();

        return back();
    }
    public function addFriend($friendId)
    {
        $user = auth()->user();

        $friend = User::find($friendId);

        if ($friend && !$user->friends->contains($friend)) {
          
            $user->friends()->attach($friendId);
            $friend->friends()->attach($user->id);

        }

        return back();
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
