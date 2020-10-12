<?php
namespace Framework\Response;

use GuzzleHttp\Psr7\Response;

/**
 * Description of RedirectResponse
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class RedirectResponse extends Response
{
    
    public function __construct(string $url)
    {
         parent::__construct(301, ['location'=>$url]);
    }
}
