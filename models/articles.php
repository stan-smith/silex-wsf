<?php

//Ma requete SQL
$sql = 'SELECT
            articles.id,
            title,
            content,
            tag.name
        FROM
            articles,
            articles_tag,
            tag
        WHERE
            articles.id = articles_tag.id_articles
        AND
            articles_tag.id_tag = tag.id';

//Execution de la requete
$articles = mysql_query($sql) or die(mysql_error());


//traitement des résultats
$result = array();
while ($row = mysql_fetch_array($articles, MYSQL_ASSOC)) {
   $result[$row['id']]['title'] = $row['title'];
   $result[$row['id']]['content'] = $row['content'];
   $result[$row['id']]['tags'][] = $row['name'];
}
