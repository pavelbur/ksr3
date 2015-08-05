<?php

class News_View
{
    public $array;

    function render($arr)
    {//выводит сообщения из массива $arr
        $this->array = $arr;
        foreach ($this->array as $item=>$k) {
            $s = '<div class="post_section"><span class="bottom"></span>';
            $s .= '<h2><a href="blog_post.html">' ."$k[title]".'</a></h2>';
            $s .= '<strong>Date:</strong>'."$k[date]".' | <strong>Author:</strong> Pavel Burak';
            $s .= '<a href="#"><img src="/../views/images/templatemo_image_01.jpg" alt="image 1" /></a>';
            $s .= "<p>$k[text]</p>";
            $s .= '<div class="cleaner"></div>';
            $s .= '<div class="button float_r"><a href="/news/'."$k[id]".'" class="more">Read more</a></div>';
            $s .= '<div class="cleaner"></div>';
            $s .= '<div class="cleaner_h40"></div>';
            $s .= '</div>';
            echo $s;
        }
    }

    function paginator($t)
    {
        for ($i = 1; $i <= $t; $i++) {
            echo '<a href="/news/' . $i . '">' . $i . '</a>&nbsp;';
        }
    }
}
