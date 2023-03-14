<p>Главная страница и пока тут ничего нет.</p>


<?php 
if (isset($articles)){
   foreach ($articles as $article) {
      echo $article->title . '<br>';
   }
}
?>