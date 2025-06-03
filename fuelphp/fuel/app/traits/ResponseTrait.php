<?php

namespace Traits;

use Fuel\Core\Response;
use SimpleXMLElement;

trait ResponseTrait
{
    /**
     * Return a standardized JSON response.
     * 
     * @return Response
     */
    public static function jsonResponse(?array $data = [], string $message = 'Success', int $statusCode = 200, array $headers = [])
    {
        $body = [
            'status'  => $statusCode,
            'message' => $message,
            'data'    => $data,
        ];

        return Response::forge(
            json_encode($body, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
            $statusCode,
            $headers
        )->set_header('Content-Type', 'application/json');
    }

    /**
     * Return a standardized XML response.
     * 
     * @return Response
     */
    public static function xmlResponse(?array $data = [], string $message = 'Success', int $statusCode = 200, array $headers = [])
    {
        $responseData = [
            'status'  => $statusCode,
            'message' => $message,
            'data'    => $data,
        ];

        $xml = new SimpleXMLElement('<response/>');
        $this->arrayToXml($responseData, $xml);

        return Response::forge(
            $xml->asXML(),
            $statusCode,
            $headers
        )->set_header('Content-Type', 'application/xml');
    }

    /**
     * Convert array to XML.
     */
    private function arrayToXml(array $data, SimpleXMLElement &$xml)
    {
        foreach ($data as $key => $value) {
            $key = is_numeric($key) ? "item{$key}" : $key;
            if (is_array($value)) {
                $subnode = $xml->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml->addChild($key, htmlspecialchars((string)$value));
            }
        }
    }
}
