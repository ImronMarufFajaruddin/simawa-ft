<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Admin\Lpj;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LpjComposer
{
  /**
   * Bind data to the view.
   *
   * @param  \Illuminate\View\View  $view
   * @return void
   */
  public function compose(View $view)
  {
    $user = Auth::user();
    $jumlahLpjMenunggu = 0;

    if ($user) {
      if (Gate::allows('superadmin-only', $user)) {
        $jumlahLpjMenunggu = Lpj::where('status', 'menunggu')->count();
      } elseif (Gate::allows('admin-only', $user)) {
        $jumlahLpjMenunggu = Lpj::where('user_id', $user->id)
          ->where('status', 'menunggu')
          ->count();
      }
    }

    $view->with('jumlahLpjMenunggu', $jumlahLpjMenunggu);
  }
}
