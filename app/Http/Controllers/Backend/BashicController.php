<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BashicController extends Controller
{
    public function index(){
        return view('thi sia  asjlkf;hasdfj');
    }

    public function deleteRole($id){

        Gate::authorize('app.roles.destroy');
        Role::find($id)->delete();
        notify()->success("Role Deleted Successfully","Success","topRight", "Success");
        return redirect()->route('app.role.index');
    }

    public function deleteUser($id){
        Gate::authorize('app.users.destroy');
//        return User::find($id);
        User::find($id)->delete();
        notify()->success("Role Deleted Successfully","Success","topRight", "Success");
        return redirect()->route('app.user.index');
    }

    public function deleteBackup($id){
        Gate::authorize('app.backups.destroy');
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists(config('backup.backup.name').'/'.$id)){
            $disk->delete(config('backup.backup.name').'/'.$id);
        }
        notify()->success('Backup Deleted','Success');
        return back();
    }

    public function DeletePage($id)
    {
        Gate::authorize('app.page.destroy');
        $page = Page::find($id);
        $page->delete();
        notify()->success('Page Data Deleted Successfully','Success');
        return redirect()->route('app.Page.index');
    }
}
