<?php
namespace App\Http\Controllers;


use App\Services\XmlRpc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpXmlRpc\Server;

class XmlRpcController extends Controller
{
    public function index()
    {
        $xmlRpc = XmlRpc::create(\request()->getContent());
        return $xmlRpc->distribute();
    }
}
