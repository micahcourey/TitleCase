<?php

    // convert $input_title to array, split array
    // capitalize first letter of each word
    // join words into new array

    class TitleCaseGenerator
    {
        function makeTitleCase($input_title)
        {
            $designated_words = array('a', 'an', 'the', 'at', 'by', 'for', 'in', 'of', 'on', 'to', 'up', 'and', 'as', 'but', 'or', 'nor');

            // convert all words to lowercase
            $input_title = (strtolower($input_title));
            // splits string into array
            $input_array_of_words = explode(" ", $input_title);
            $output_titlecased = array();
            // cycles through each word in array
            foreach ($input_array_of_words as $word) {
                // if word matches designated_word, return in lowercase
                if (in_array($word, $designated_words)) {
                    array_push($output_titlecased, $word);
                // if word does not match designated_word, capitalize first letter
                } else {
                    array_push($output_titlecased, ucfirst($word));
                }
            }
            // combines split array into a string
            $final_title = implode(" ", $output_titlecased);
            // loops through each character [$i] in string
            for ($i = 0; $i <= strlen($final_title); $i++)
            {
                // temporarily set $char to equal value of current $i
                $char = substr($final_title, $i, 1);
                // capitalizes any letter after -
                if ($char == '-') {
                    $final_title[$i + 1] = ucfirst(substr($final_title, $i + 1, 1));
                }
                // capitalizes letters after apostrophe, except s
                if ($char == "'" && $final_title[$i + 1] !== "s") {
                    $final_title[$i + 1] = ucfirst(substr($final_title, $i + 1, 1));
                }
            }

            // properly capitalizes names beginning with Mc
            $pos = strpos($final_title, "Mc");
            if (strpos($final_title, 'Mc') !== false) {
                $final_title[$pos + 2] = ucfirst(substr($final_title, $pos + 2, 1));
            }
            // capitalizes first letter of entire string
            return ucfirst($final_title);
        }
    }

?>
