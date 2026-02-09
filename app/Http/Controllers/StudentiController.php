<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Students;
use Carbon\Carbon;
class StudentiController extends Controller
{
    //prilikom inserta, pokazati će se i popis zadnjih pet unesenih studenata
    //trebamo zadnjih pet znači sortirano od najvećeg datuma prema najmanjem
    public function pokaziFormuZaUnos():View{
            $studenti=Students::orderBy('created_at', 'desc')->limit(5)->get();
            return view('studenti/unos',[
                'studenti'=>$studenti,
            ]);
    }
    public function create(Request $request){
        $validated=$request->validate(
            ['ime'=>['required','string','min:2','max:50'],
            'prezime'=>['required','string','min:2','max:50'],
            'status'=>['required','string','in:redovni,izvanredni'],
            'godiste'=>['required','numeric','between:1980,'.Carbon::now()->year.''],
            'prosjek'=>['required','numeric','between:1.00,5.00'],
            ]);
            Students::create($validated);
            return redirect()->route('studenti.popis')->with('status','Dodan novi student.');
    }
    public function popisSvihStudenata():View{
        $studenti=Students::orderBy('id')->paginate(5); 
        //vrati broj redovnih i vanrednih
        $brojRedovnihIVanrednih=Students::selectRaw('status, COUNT(*) as broj')->groupBy('status')->orderBy('status','desc')->get();
        $prosjekOcjena=Students::selectRaw('avg(prosjek) as prosjek')->get();
        return view('studenti/popis',[
                'studenti'=>$studenti,
                'brojRedovnih'=>$brojRedovnihIVanrednih[0]["broj"],
                'brojVanrednih'=>$brojRedovnihIVanrednih[1]["broj"],
                'prosjek'=>$prosjekOcjena[0]["prosjek"],
            ]);
    }
    public function dohvatiFormuZaAzuriranje(Students $student){
        return view("studenti/edit",['student'=>$student]);
    }

    public function update(Request $request,Students $student){
          $validated=$request->validate(
            ['ime'=>['required','string','min:2','max:50'],
            'prezime'=>['required','string','min:2','max:50'],
            'status'=>['required','string','in:redovni,izvanredni'],
            'godiste'=>['required','numeric','between:1980,'.Carbon::now()->year.''],
            'prosjek'=>['required','numeric','between:1.00,5.00'],
            ]);
            $student->update($validated);
            return redirect()->route('studenti.popis')->with('status','Student je uspješno ažuriran.');
    }
    public function brisiStudenta(Students $student){
        $student->delete();
        return redirect()->route('studenti.popis')->with('status','Student je uspješno izbrisan.');
    }
}
