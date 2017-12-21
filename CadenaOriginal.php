<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-csd
 * @version 0.1.0
 */

namespace ktaris\cadenaoriginal;

class CadenaOriginal
{
    public static function obtener($xml)
    {
        // Se carga el xsl, en base al xslt original, con cadenas para incluir los archivos
        // de los demás xslt desde archivos locales, a través de una sustitución de cadena
        // con PHP, y se entrega ee archivo al processamiento de xslt posteriormente.
        $basePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'xslt'.DIRECTORY_SEPARATOR;
        $xslFileName = $basePath.'cadenaoriginal_3_3.xsl';
        $xslFile = file_get_contents($xslFileName);
        $xslFile = str_replace('{$PATH}', $basePath, $xslFile);

        // XSL
        $xsl = new \DOMDocument();
        $xsl->loadXML($xslFile);

        // CFDI
        $cfdi = new \SimpleXMLElement($xml);

        $xslt = new \XSLTProcessor();

        // Realmente, no sé por qué al quitar el "@" tenemos la advertencia siguiente:
        //     XSLTProcessor::importStylesheet(): compilation error: line 2 element stylesheet
        // pero, la cadena original se genera correctamente si ignoramos tal advertencia.
        @$xslt->importStylesheet($xsl);

        $newdom = $xslt->transformToDoc($cfdi);

        return $newdom->textContent;
    }
}
