<?php

class BaseGateway {

    public function process($verb, $id, $body, $parameters) {

        if (!method_exists($this, $verb)) {

            return http_response(404);

        }

        $data = [
            'id' => $id,
            'body' => $body,
            'parameters' => $parameters
        ];

        return call_user_func(array($this, $verb), $data);
    }

    public function has_required_parameters($id, $body) {
         if (is_null($id) || empty($body)) return http_response_code(400);
    }

    public function error_response($response_code, $class, $response_message) {

        $response = [
            "Code" => $response_code,
            "Gateway" => $class,
            "Message" => $response_message
        ];

        return $response;

    }

}