<?php

namespace Proprios\Utils;

class ResponseUtil
{
    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeResponse($message, $data)
    {
        $res = [
            'success' => true,
            'message' => $message,
        ];

        // Check if $data is not paginated
        if (!isset($data['current_page'])) {
            $data = [
                'total' => count($data),
                'data' => $data
            ];
        }

        return array_merge($res, $data);
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public static function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }
}
