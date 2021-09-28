<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FluxController extends Controller
{
    

    public function getFLux(){
        
        $rss = simplexml_load_file('https://www.lemonde.fr/rss/une.xml');
        return $rss;
    }

    public function index()
    {
        return view('home');
    }
    public function flux()
    {
       
        $rss = $this->getFLux();  
        $result=array();
        $max_articles=20;

        // cas où le nombre maximal d'articles est supérieur au nombre d'articles dans le flux, 
        // on prend ce dernier dans ce cas
        if(count($rss->channel->item) < $max_articles){
            $max_articles =count($rss->channel->item);
        }

        for($i = 0; $i < $max_articles; $i++){
            //on recupere les champs de chaque articles
            $arrayArticle['title']= (string)$rss->channel->item[(int)$i]->title;
            $arrayArticle['description']= (string)$rss->channel->item[(int)$i]->description;
            $arrayArticle['media']= (string)$rss->channel->item[(int)$i]->children( 'media', True )->content->attributes()['url'];
            //$arrayArticle['date']= (string)$rss->channel->item[(int)$i]->pubDate;
            $result[$i]=$arrayArticle;
        }
        
        //envoie dans la vue du tableau comportant les informations de chaque article
        return response()->json([
            "status" => 200,
            "data" =>  json_encode($result)
        ]);
        
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSingle($id)
    {
        
        $rss = $this->getFLux();  
        if(count($rss->channel->item) < $id   ||  !is_numeric($id)){
            //redirection sur la page d'accueil si une url est appelée alors qu'elle n'existe pas dans le flux (chiffre trop grand) // ou mauvais chiffrement
            return redirect('/');
        }else{
            //envoie dans la vue les informations de l'article voulu
            return view('singleArticle')->withData($id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fluxSingle($id)
    {
       
        $rss = $this->getFLux();  
        
        $result=[];
        $result['title']= (string)$rss->channel->item[(int)$id]->title;
        $result['description']= (string)$rss->channel->item[(int)$id]->description;
        $result['media']= (string)$rss->channel->item[(int)$id]->children( 'media', True )->content->attributes()['url'];
        $result['date']= (string)$rss->channel->item[(int)$id]->pubDate;
        
        return response()->json([
            "status" => 200,
            "data" =>  json_encode($result)
        ]);
    }

}