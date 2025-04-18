﻿<?php
class cls_Html {
    /**
     * Genera una etiqueta de script para un archivo JavaScript
     * @param string $script_path Ruta al archivo JavaScript
     * @return string Etiqueta script
     */
    public function html_js_header(string $script_path): string {
        return "<script defer src='{$script_path}'></script>\n";
    }
    
    /**
     * Genera una etiqueta de enlace para un archivo CSS
     * @param string $css_path Ruta al archivo CSS
     * @param string $media Tipo de media
     * @return string Etiqueta link para CSS
     */
    public function html_css_header(string $css_path, string $media): string {
        return "<link rel='stylesheet' type='text/css' href='{$css_path}' media='{$media}'>\n";
    }
    
    /**
     * Genera una etiqueta form de apertura
     * @param string $id ID del formulario
     * @param string $class Clase CSS del formulario
     * @param string $action Acción del formulario
     * @param string $method Método del formulario
     * @return string Etiqueta form de apertura
     */
    public function html_form_tag(string $id, string $class, string $action, string $method): string {
        return "<form id='{$id}' class='{$class}' action='{$action}' method='{$method}'>\n";
    }
    
    /**
     * Genera una etiqueta form de cierre
     * @return string Etiqueta form de cierre
     */
    public function html_form_end(): string {
        return "</form>\n";
    }
    
    /**
     * Genera un área de texto
     * @param int $rows Número de filas
     * @param int $cols Número de columnas
     * @param string $name Nombre del área de texto
     * @param string $id ID del área de texto
     * @param string $class Clase CSS del área de texto
     * @param string $attributes Atributos adicionales
     * @param string $required Si es requerido o no
     * @return string Elemento textarea
     */
    public function html_textarea(int $rows, int $cols, string $name, string $id, string $class, string $attributes, string $required): string {
        return "<textarea name='{$name}' id='{$id}' rows='{$rows}' cols='{$cols}' class='{$class}' {$attributes} {$required}></textarea>\n";
    }
    
    /**
     * Genera un botón de entrada
     * @param string $type Tipo de botón
     * @param string $name Nombre del botón
     * @param string $id ID del botón
     * @param string $class Clase CSS del botón
     * @param string $value Valor del botón
     * @param string $onclick Evento onclick
     * @param string $attributes Atributos adicionales
     * @return string Elemento input button
     */
    public function html_input_button(string $type, string $name, string $id, string $class, string $value, string $onclick, string $attributes): string {
        return "<button type='{$type}' name='{$name}' id='{$id}' class='{$class}' {$onclick} {$attributes}>{$value}</button>\n";
    }


}
?>