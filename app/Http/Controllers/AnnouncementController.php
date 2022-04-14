<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories=Category::all();
        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view("form" , compact("categories" , "uniqueSecret"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   /*  public function newAnnouncement(){
        return view("form", compact("uniqueSecret"));

    } */

    public function store(AnnouncementRequest $request)
    {
        $announcement=Auth::user()->announcements()->create([
            'product'=>$request->input("product"),
            'price'=>$request->input("price"),
            'brand'=>$request->input("brand"),
            'description'=>$request->input("description"),
            'user_id'=>Auth::user()->id,
            'category_id'=>$request->input("category"),
        ]);

        $uniqueSecret = $request->input("uniqueSecret");

        $images = session()->get("images.{$uniqueSecret}", []);
        $delete = session()->get("delete.{$uniqueSecret}", []);

        $images=array_diff($images, $delete);

        foreach($images as $image){
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image, $newFileName);

            $i->file=$newFileName;
            $i->announcement_id = $announcement->id;

            $i->save();

            dispatch(new GoogleVisionSafeSearchImage($i->id));
            dispatch(new GoogleVisionLabelImage($i->id));
            dispatch(new GoogleVisionRemoveFaces($i->id));

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 300, 150),
                new ResizeImage ($i->file, 400, 300)
            ])->dispatch($i->id);
        };

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        return redirect(route('createAnnouncement'))->with('message', "Il tuo annuncio e' stato preso in carico dai nostri revisori!");
    }

    public function upload(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage($fileName , 120 , 120));

        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(
            [
                'id'=>$fileName
            ]
        );

    }

    public function delete(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removeimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request){
        $uniqueSecret=$request->input('$uniqueSecret');
        $images=session()->get("images.{$uniqueSecret}", []);
        $delete=session()->get("delete.{$uniqueSecret}", []);
        $images=array_diff($images, $delete);
        $data=[];

        foreach($images as $image){
            $data[]=[
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image , 120 , 120),
            ];
        }
        return response()->json($data);
    }

        public function showAll(Request $request){
            $order = null;
            $price = [0, 10000];
    
            switch($request->order) {
                case 'fromOld':
                    $order = ['price', 'asc'];
                    break;
                case 'fromNew':
                    $order = ['price', 'desc'];
                    break;
                case 'alphaAsc':
                    $order = ['product', 'asc'];
                    break;
                case 'alphaDec':
                    $order = ['product', 'desc'];
                    break;
                default:
                    $order = ['created_at', 'desc'];
            }
    
            switch($request->price) {
                case 'from0To50':
                    $price = [0, 50];
                    break;
                case 'from50To100':
                    $price = [50, 100];
                    break;
                case 'from700To800':
                    $price = [ 100, 10000];
                    break;
            }
    
            $announcements=Announcement::where('category_id', 'LIKE', !$request->category_id ? '%' : $request->category_id)
                ->where('price', '>=', $price[0])
                ->where('price', '<=', $price[1])
                ->orderBy($order[0], $order[1])
                ->paginate(18);
    
            return view('allAnnouncement' , compact('announcements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
