<?php

    // convert $input_title to array, split array
    // capitalize first letter of each word
    // join words into new array

    class TitleCaseGenerator
    {
        function makeTitleCase($input_title)
        {
            $designated_words = array('a', 'an', 'the', 'at', 'by', 'for', 'in', 'of', 'on', 'to', 'up', 'and', 'as', 'but', 'or', 'nor');
            $input_title = (strtolower($input_title));
            $input_array_of_words = explode(" ", $input_title);
            $output_titlecased = array();
            foreach ($input_array_of_words as $word) {
                if (in_array($word, $designated_words)) {
                    array_push($output_titlecased, $word);
                } else {
                    array_push($output_titlecased, ucfirst($word));
                }
            }
            $final_title = implode(" ", $output_titlecased);
            return ucfirst($final_title);
            //return implode(" ", $output_titlecased);
        }
    }

?>
