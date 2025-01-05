<?
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'mahasiswa') {
            return redirect('/mahasiswa/index');
        } elseif ($user->role === 'dosen') {
            return redirect('/dosen/dashboard');
        }

        return redirect('/'); // Redirect default jika role tidak dikenali
    }
}
