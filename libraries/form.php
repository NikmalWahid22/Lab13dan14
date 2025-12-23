<?php

class Form {

    // Input biasa
    public function input($label, $name, $value = "", $type = "text") {
        return "
            <label>$label</label><br>
            <input type='$type' name='$name' value='$value'>
            <br><br>
        ";
    }

    public function textarea($label, $name, $value = "") {
        return "
            <label>$label</label><br>
            <textarea name='$name'>$value</textarea>
            <br><br>
        ";
    }

    public function select($label, $name, $options, $selected = "") {
        $html = "<label>$label</label><br>";
        $html .= "<select name='$name'>";

        foreach ($options as $value => $text) {
            $isSelected = ($value == $selected) ? "selected" : "";
            $html .= "<option value='$value' $isSelected>$text</option>";
        }

        $html .= "</select><br><br>";
        return $html;
    }

    public function submit($text = "Simpan") {
        return "<button type='submit'>$text</button>";
    }
}
