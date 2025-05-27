<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keyword;
use Illuminate\Http\Request;

/**
 * Ukázka KeywordsControlleru v administrační části blogu
 * Controller spravuje základní možnosti ohledně klíčových slov
 */

class KeywordsController extends AdminController
{
    public function index()
    {
        // Výpis dvaceti klíčových slov na jednu stránku k možné editaci, úpravě nebo odstranění
        $keywords = Keyword::paginate(20);

        return view('admin.keywords.index', compact('keywords'));
    }

    public function create()
    {
        // Formulář pro vytváření kláčového slova, odkazující na store request

        return view('admin.keywords.create');
    }

    public function store(Request $request)
    {
        // Validace kláčového slova, nesmí být kratší jak 3 znaky
        $request->validate([
            'keyword' => 'required|min:3'
        ]);

        Keyword::create([
            'keyword' => $request->get('keyword')
        ]);

        // Přesměrování po úspěšném přidání s "success" zprávou
        return redirect()->route('admin.keywords.index')
            ->with('success', 'Klíčové slovo bylo úspěšně přidáno');
    }

    public function edit(Keyword $keyword)
    {
        // Formulář pro úpravu existujícího klíčového slova
        return view('admin.keywords.edit', compact('keyword'));
    }

    public function update(Request $request, Keyword $keyword)
    {
        $request->validate([
            'keyword' => 'required|min:3'
        ]);

        /**
         * Pokud request obsahuje položku "duplicate" jedná se o požadavek o duplikaci klíčového slova.
         * To zde na blogu mám hlavně z důvodu "línosti" psát delší klíčová slova znovu. Takto lehce pomocí jednoho liknutí
         * přidám nové klíčové slovo, které pak nemusím celé psát znovu
         */

        if($request->has('duplicate')) {
            Keyword::create([
                'keyword' => $request->get('keyword')
            ]);

            return redirect()->route('admin.keywords.index')
                ->with('success', 'Klíčové slovo bylo úspěšně přidáno');
        } else {
            $keyword->update([
                'keyword' => $request->get('keyword')
            ]);

            return redirect()->route('admin.keywords.index')
                ->with('success', 'Klíčové slovo bylo úspěšně upraveno');
        }
    }
}
