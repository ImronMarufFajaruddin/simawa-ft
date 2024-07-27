<?php
// app/Http/ViewComposers/ProposalComposer.php
namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Admin\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProposalComposer
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
    $jumlahProposalMenunggu = 0;

    if ($user) {
      if (Gate::allows('superadmin-only', $user)) {
        $jumlahProposalMenunggu = Proposal::where('status', 'menunggu')->count();
      } elseif (Gate::allows('admin-only', $user)) {
        $jumlahProposalMenunggu = Proposal::where('user_id', $user->id)
          ->where('status', 'menunggu')
          ->count();
      }
    }

    $view->with('jumlahProposalMenunggu', $jumlahProposalMenunggu);
  }
}
