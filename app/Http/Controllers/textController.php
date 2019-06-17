<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class textController extends Controller
{


    public function insert(Request $request)
    {
        $succ = DB::table('text')->insert([
            'text' => $request->text
        ]);
        if ($succ) {
            return redirect('/result');
        }
    }



    public function open(Request $request)
    {
        $get_data = Text::all()->last();

        $text = str_replace(","," ", $get_data['text']);
        $text = preg_replace("/[\n\r]/","", $text);
        $text = str_replace(".","", $text);
        $text = preg_replace("/[\]]/","", $text);
        $text = preg_replace("/[\[]/","", $text);
        $text = preg_replace("/[\(]/","", $text);
        $text = preg_replace("/[\)]/","", $text);
        $text = preg_replace("/[\:]/","", $text);
        $text = str_replace("\t"," ", $text);
        $text = preg_split("/ /", $text);
        $text= array_diff($text, array(""));
        $text =  array_map('strtolower', $text);

        foreach($text as $key=>$value) {
            $value = strtolower($value);
            $collection[$key] = $value;

        }

        $predlog = array('by','for','in','on','at','at','to','a','with','about');

        $textx =  array_unique($collection);

        $col =  array();

        foreach (array_count_values($collection) as $key=>$val) {


                    if ( $val > 3) {
                        if (!array_search($key,$predlog)) {

                            $col[] = array("y" => $val, "label" => $key);
                        }

                }




            }



        //

        if (!empty($col)) {
            $get_data['canvas'] =  $col;
        } else {
            $get_data['canvas'] = array(array("y" => 0, "label" => "Слов нет"));
        }


        $get_data['repWord'] = $predlog;

        return view('result')->with('data', $get_data);
    }
}
