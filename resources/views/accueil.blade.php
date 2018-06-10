
@extends('templates.base')

@section('content')

    <!-- Container -->
    <div class="container" style="background: #fff;box-shadow: 1px 0px 1px 1px lightgrey;margin-top: 10px;padding: 45px;">

      <div style="padding: 10px;">@include('flash::message')</div>

      <br>

      <div class="row">

        <div class="content-homepage">
          
          <h3 style="font-family: 'Montserrat', sans-serif;text-align: center;margin-top: 5px;" class="title-presentation">Bienvenue dans TheGreatComputing.fr.nf</h3>
          <p style="text-align: center;">Bienvenue dans mon blog sur la programmation, sécurité informatique et les systèmes d'exploitation</p>


          @if(auth()->check()) 
                <h4 style="font-family: 'Roboto Condensed', sans-serif;color: red;margin: 0;text-align: center;">Vous devez avoir le role créateur pour créer des articles, voir plus <a href="inscription">ici...</a></h4>
         @endif


          <br>

          

         <!-- Nouveautés et Articles -->

         <div style="display: inline;">
           <h3 style="font-family: 'Montserrat', sans-serif;margin: 0px 5px;" class="last-articles">Dernier article:</h3>


           <h3 style="font-family: 'Montserrat', sans-serif;float: right;padding: 0px 112px;margin-top: -18px;" class="news-infos">Nouveautés du site:</h3>
         </div>

         <div style="padding: 20px;position: absolute;" class="content-last-article">

            <h5 style="font-family: 'Roboto Condensed', sans-serif;">{{ ucfirst($article->created_at->formatLocalized('%A %d %B %Y à %H h %M min')) }}</h5>

            <h5 style="font-family: 'Roboto Condensed', sans-serif;"><b>Publié par:</b> <a href="profile/{{ $article->redactor_pseudo }}">{{ $article->redactor_pseudo }}</h5></a>

            <h5 style="font-family: 'Roboto Condensed', sans-serif;">Catégorie:

            @if($article->type_articles == 'Programmation')
              <i class="fas fa-code"></i>
            @elseif($article->type_articles == 'Sécurité Informatique')
              <i class="fas fa-lock"></i>
            @elseif($article->type_articles == 'Systemes d\'exploitation')
              <i class="fas fa-laptop"></i>
            @else
              <i class="fas fa-asterisk"></i>
            @endif

            {{ $article->type_articles }}</h5>

            <a href="articles/{{ $article->slug }}" style="text-decoration: none;"><h3 style="font-family: 'Raleway', sans-serif;">{{ $article->titre }}</h3></a>
    
            
            <img src="/storage/{{ $article->miniature }}" width="500" class="img-responsive" style="border: 1px solid black">
          </div>
          </div>

          <br>
          <br>
          <br>


        <div style="float: right;" class="nouveautes">

         <div class="col-md-12 col-xs-12 col-sm-12">

         <div class="nouveaute-1" style="padding: 10px">
              <h4 style="font-family: 'Source Sans Pro', sans-serif;">Un nouveau blog ? Ou ca ?</h4>
              <p>Le blog TheGreatComputing vient d'ouvrir ! ... <br><a href="/articles/{{ $article->slug }}">Cliquez ici pour plus d'informations</a></p>
         </div>

         <br>

         <div class="nouveaute-2"  style="padding: 10px">
              <h4 style="font-family: 'Source Sans Pro', sans-serif;">Encore un autre site a presenter ? Lequel ?</h4>
              <p>Je vous presente mon site DevHack <br> ou je presente mon serveur Discord... <br><a href="https://devhack.fr.nf">Cliquez ici pour plus d'informations</a></p>
         </div>

         <br>

         <div class="nouveaute-2"  style="padding: 10px">
              <h4 style="font-family: 'Source Sans Pro', sans-serif;">TheGreatComputing open-source ?</h4>
              <p>En effet le site est open-source c'est un projet Laravel <br> un tres bon framework php pour moi... <br><a href="https://github.com/mortim59/" target="_blank">Cliquez ici pour consulter le github</a></p>
         </div>

  

       </div>

     </div>

     </div>

     <a href="last-article" id="button-last-articles" class="btn button-all-more center-block">Voir les derniers articles</a>

   </div>

   <br>



 </div>


    

  


@endsection