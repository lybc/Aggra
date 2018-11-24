<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use PhpXmlRpc\Value;
use Spatie\ArrayToXml\ArrayToXml;

class XmlRpc
{
    /*
     * @var string
     */
    protected $method;

    public function __construct($content)
    {
        Log::debug('XML RPC REQUEST', ['content' => $content]);
        $res = xmlrpc_decode_request($content, $this->method);
        Log::debug('REQ PARAMS', ['content' => $res]);
    }

    public static function create(string $content)
    {
        return new self($content);
    }

    protected function authenticate($username, $pwd)
    {

    }

    public function distribute()
    {
        $distribute = [
            'blogger.getUsersBlogs' => 'getUsersBlogs',
            'metaWeblog.newPost' => 'createPost'
        ];
        $response = call_user_func([$this, $distribute[$this->method]]);
        return $response;
    }

    public function createPost()
    {

    }


    public function getUsersBlogs()
    {
        Log::debug('called');
        $response = [
            'array' => [
                'data' => [
                    'value' => [
                        'struct' => [
                            [
                                'member' => [
                                    [
                                        'name' => 'url',
                                        'value' => url('/')
                                    ],
                                    [
                                        'name' => 'blogid',
                                        'value' => 1
                                    ],
                                    [
                                        'name' => 'blogName',
                                        'value' => 'caonima'
                                    ],
                                ]
                            ]
                        ]  // struct
                    ]  // value
                ] // data
            ]
        ];
        return $this->responseSuccess($response);
    }

    /**
     * 构造HTTP返回
     * @param $content
     * @return Response
     */
    private function response($content)
    {
        Log::debug('XML RPC RESPONSE', ['content' => $content]);
        return Response::create($content, Response::HTTP_OK, [
            'Connection' => 'close',
            'Content-Length' => strlen($content),
            'Content-Type' => 'text/xml',
            'Date' => date('r')
        ]);
    }

    /**
     * 失败的返回
     * @param $code
     * @param $message
     * @return Response
     */
    public function responseError($code, $message)
    {
        $content = ArrayToXml::convert([
            'fault' => [
                'value' => [
                    'struct' => [
                        'member' => [
                            ['name' => 'faultCode', 'value' => ['int' => $code]],
                            ['name' => 'faultString', 'value' => ['string' => $message]]
                        ],
                    ]
                ]
            ]
        ], 'methodResponse');
        return $this->response($content);
    }

    /**
     * 成功的返回
     * @param $content
     * @return Response
     */
    public function responseSuccess($content)
    {
        $content = ArrayToXml::convert([
            'params' => [
                'param' => [
                    'value' => $content
                ]
            ]
        ], 'methodResponse');
//        $data["methodResponse"]["params"]["param"]["value"] = $content;

        return $this->response($content);
    }
}
