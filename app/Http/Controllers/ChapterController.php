<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Author;

class ChapterController extends Controller
{
    public function index()
    {
        $comics = Comic::latest()->paginate(10);
        // compact: trả biến ra view với dạng array 
        return view('admin.chapters.index',compact('comics'))->with('i', (request()->input('page', 1) - 1) * 5); // phân trang
    }
    public function create(Request $request)
    {
        if ($request->isMethod('get')){ // nếu là method get thì sẽ lấy ra tất cả giá trị của class comic và đc gán vào biến $comics
            $comics = Comic::all();
            return view('admin.chapters.create', compact('comics')); // trả về lại view {route} với array comic đc gán ở trên
        }
        $add_chapter = [
            "number" => $request->chapter_number,  
            // request trỏ đến giá trị của chapternumber từ giao diện
            "comic_id" => $request->comic_name,
        ];
        $chapter = Chapter::create($add_chapter); // trỏ đến hàm create của class chapter với giá trị là add chapter
        if($request->chapter_image){
            foreach ($request->chapter_image as $fileItem):
                $fileNameItem = $fileItem->getClientOriginalName(); // tên file
                $pathNameItem =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'.$fileItem->getClientOriginalExtension(); // nối chuỗi, đuôi của file
                $pathImg = $fileItem->move(public_path().'/uploads/comics/', $pathNameItem);  // move file ảnh 
                $chapter_image = $chapter->chapter_images()->create([ // trỏ đến hàm chapter_image
                    'image' => $pathNameItem // lấy ra đc id của truyện và để biết đc chapter đó thuộc về comic nào
                ]);
            endforeach;
        }
        return redirect()->route('admin.chapters.index')->with('message', 'Add chapter for comic ' . $chapter->comic->name .' successfully');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $comic = Comic::findOrFail($id); 
            $prev = Comic::Where('id', '>', $id)->orderBy('id', 'DESC')->limit(1)->get();
            // lấy ra bản ghi trước của truyện
            $next = Comic::Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();

            return view('admin.chapters.detail', compact('comic', 'prev', 'next'));
        }
        $comic = Comic::findOrFail($id);
        return redirect()->route('admin.chapters.edit', $id)->with('message', 'Update chapter successfully');
    }

    public function show($slug="", $number="", $id="")
    {
        $comic = Comic::Where('slug', '=', $slug)->first();
        // lấy ra tên truyện 
        $chapter = Chapter::find($id); // lấy ra chapter thuộc truyện vừa lấy 
        if ($chapter){ // check xem có chapter ko
            $id = $chapter->id; // lấy đc ra id của chapter
            $comic = Comic::find($comic->id);
            $chapter = Chapter::find($chapter->id);
            $history = session()->has('history') ? session()->get('history') : null;
            if(isset($history[$comic->id])){
                if (!in_array($chapter->id, $history[$comic->id]['chapter_ids'])) {
                    $history[$comic->id]['chapter_ids'][] = $chapter->id;
                    $history[$comic->id]['chapter_name'] = $chapter->number;
                    $history[$comic->id]['chapter_slug'] = route('chapter', [$comic->slug, $chapter->number, $chapter->id]);
                }
                $history[$comic->id]['created_at'] = date('Y-m-d H:i:s');
            } else {
                $history[$comic->id] = [
                    'comic_id' => $comic->id,
                    'comic_name' => $comic->name,
                    'comic_title' => $comic->title,
                    'chapter_ids' => [$chapter->id],
                    'chapter_name' => $chapter->number,
                    'image' => $comic->image,
                    'comic_slug' => route('comic', $comic->slug),
                    'chapter_slug' => route('chapter', [$comic->slug, $chapter->number, $chapter->id]),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            session()->put('history', $history);
            $next = Chapter::Where('comic_id', '=', $chapter->comic->id)->Where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->get();
            // check xem chapter đó thuộc comic nào và tiến lùi theo id của chapter
            $prev = Chapter::Where('comic_id', '=', $chapter->comic->id)->Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
            return view('website.chapter.index', compact('chapter', 'next', 'prev'));
        }
        return abort(404);
    }
}