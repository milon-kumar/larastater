<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.backups.index');
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $files = $disk->files(config('backup.backup.name'));

        $backups = [];

        foreach ($files as $key => $file){
            if (substr($file,-4) == '.zip' && $disk->exists($file)){
                $file_name = str_replace(config('backup.backup.name').'/','',$file);
                $backups[]=[
                  'file_path'=>$file,
                    'file_name'=>$file_name,
                    'file_size'=>$this->bytesForHumans($disk->size($file)),
                    'created_at'=>Carbon::parse($disk->lastModified($file))->diffForHumans(),
//                    'download_link'=>action([BackupController::class,'Download']),
                ];
            }
        }
//        Array The Revers
        $backups = array_reverse($backups);
        return view('layouts.backend.backup.index',compact('backups'));
    }

    private function bytesForHumans($bytes){
        $unist = ['B','Kib','Mib','Gib','Tib','Pib'];
        for ($i = 0 ; $bytes > 1024; $i++){
            $bytes /= 1024;
        }
        return round($bytes,2).' '.$unist[$i];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Gate::authorize('app.backups.create');
        Artisan::call('backup:run');
        notify()->success('Backup Created Successfully','Success');
        return back();
    }

    public function Download($file_name){
        return $file_name;
        Gate::authorize('app.backups.download');
        $file = config('backup.backup.name').'/'. $file_name;
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists($file)){
            $fs = Storage::disk(config('backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream){
                fpassthru($stream);
            },200,[
                'Content-Type'=>$fs->getMimetype($file),
                'Content-Length'=>$fs->getSize($file),
                'Content-description'=>"attachment;filename=\"".basename($file)."\"",
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
