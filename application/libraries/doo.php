<?php

class Doo {

    public static function capitalize($string) {

        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $string = mb_convert_encoding((string)$string, 'UTF-8', mb_list_encodings());

        $char_map = array(
            // Latin symbols
            '©' => '(c)',

            // Greek
            'Ά' => 'Α', 'Έ' => 'Ε', 'Ί' => 'Ι', 'Ό' => 'Ο', 'Ύ' => 'Υ', 'Ή' => 'Η', 'Ώ' => 'Ω', 'Ϊ' => 'Ι',
            'Ϋ' => 'Υ',

            'α' => 'Α', 'β' => 'Β', 'γ' => 'Γ', 'δ' => 'Δ', 'ε' => 'Ε', 'ζ' => 'Ζ', 'η' => 'Η', 'θ' => 'Θ',
            'ι' => 'Ι', 'κ' => 'Κ', 'λ' => 'Λ', 'μ' => 'Μ', 'ν' => 'Ν', 'ξ' => 'Ξ', 'ο' => 'Ο', 'π' => 'Π',
            'ρ' => 'Ρ', 'σ' => 'Σ', 'τ' => 'Τ', 'υ' => 'Υ', 'φ' => 'Φ', 'χ' => 'Χ', 'ψ' => 'Ψ', 'ω' => 'Ω',
            'ά' => 'Α', 'έ' => 'Ε', 'ί' => 'Ι', 'ό' => 'Ο', 'ύ' => 'Υ', 'ή' => 'Η', 'ώ' => 'Ω', 'ς' => 'Σ',
            'ϊ' => 'Ι', 'ΰ' => 'Υ', 'ϋ' => 'Υ', 'ΐ' => 'Ι',
        );

        // Transliterate characters to ASCII
        $string = str_replace(array_keys($char_map), $char_map, $string);

        return strtoupper($string);
    }

    public static function convert_latin($string) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $string = mb_convert_encoding((string)$string, 'UTF-8', mb_list_encodings());

        $char_map = array(
            // Latin symbols
            '©' => '(c)',

            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

            // Russian
            'А'=>'A','Б'=>'B','В'=>'V','Г'=>'G','Д'=>'D','Е'=>'E','Ж'=>'J','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K',
            'Л'=>'L','М'=>'M','Н'=>'N','О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H',
            'Ц'=>'TS','Ч'=>'CH','Ш'=>'SH','Щ'=>'SCH','Ъ'=>'','Ы'=>'YI','Ь'=>'','Э'=>'E','Ю'=>'YU','Я'=>'YA',

            'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k',
            'л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h',
            'ц'=>'ts','ч'=>'ch','ш'=>'sh','щ'=>'sch','ъ'=>'y','ы'=>'yi','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',
        );

        // Transliterate characters to ASCII
        $string = str_replace(array_keys($char_map), $char_map, $string);

        // Replace non-alphanumeric characters with our delimiter
        $string = preg_replace('/[^\p{L}\p{Nd}]+/u', '-', $string);

        // Remove duplicate delimiters
        $string = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $string);

        // Remove delimiter from ends
        $string = trim($string, '-');

        return mb_strtolower($string, 'UTF-8');
    }
}
