<?php
namespace App\Utils;

class Markdown extends \Parsedown
{

    protected $toc = [];

    public function getToc()
    {
        collect($this->toc)->split();
    }

    protected function blockHeader($Line)
    {
        $header = parent::blockHeader($Line);
        $header['element']['attributes']['id'] = urlencode(trim(strip_tags($this->line($header['element']['text']))));
        $this->toc[] = [
            'id' => $header['element']['attributes']['id'],
            'text' => $header['element']['text'],
            'level' => $header['element']['name'],
        ];
        return $header;
    }
}
