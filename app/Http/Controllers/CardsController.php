<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\Photo;
use App\Models\Category;
use App\Models\User;

class CardsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, User $user, Request $request)
    {
        $cards = Card::getCards($category, $user, $request);

        return view('index', compact('cards', 'category', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        $card = auth()->user()->publish(
            new Card($request->all())
        );

        if($request->photo)
        {
            if(is_array($request->photo))
            {
                foreach ($request->photo as $photo) {
                    $this->addPhoto($card, $photo);
                }
            } 
            else   
                $this->addPhoto($card, $request->photo);
        }

        flash()->success('Успешно!', 'Объявление отправлено');

        return redirect()->route('toCard', [$card->category->id, $card->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $id)
    {
        $card = Card::where(compact('id'))->firstOrFail();

        return view('cards.show', compact('card'));
    }

    public function uploadPhotos(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = Photo::uploadPhotos($request->file('photo'));

        return $photo;
    }    

    public function addPhoto(Card $card, $name)
    {
        $photo = Photo::where(compact('name'))->firstOrFail();

        $card->addPhoto($photo);
    }

    public function favorite(Card $card)
    {
        auth()->user()->toggleFavorite($card);

        return $this->isFavorited($card);
    }

    public function isFavorited(Card $card)
    {
        if($card->hasBeenFavoritedBy(auth()->user()))
            return response()->json([
                'value' => 'Убрать из избранного'
            ]);
        else
            return response()->json([
                'value' => 'Добавить в избранное'
            ]);
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
        //
    }
}
