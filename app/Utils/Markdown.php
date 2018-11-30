<?php
namespace App\Utils;

class Markdown extends \Parsedown
{
//    protected function fetchText($Text)
//    {
//        return trim(strip_tags($this->line($Text)));
//    }
//    protected function createAnchorID($Text)
//    {
//        return  urlencode($this->fetchText($Text));
//    }
//    #
//    # contents list
//    #
//    function contentsList($Return_as = 'string')
//    {
//        if ('string' === strtolower($Return_as)) {
//            $result = '';
//            if (! empty($this->contentsListString)) {
//                $result = $this->text($this->contentsListString);
//            }
//            return $result;
//        } elseif ('json' === strtolower($Return_as)) {
//            return json_encode($this->contentsListArray);
//        } else {
//            return $this->contentsListArray;
//        }
//    }
//    #
//    # Setters
//    #
//    protected function setContentsList($Content)
//    {
//        $this->setContentsListAsArray($Content);
//        $this->setContentsListAsString($Content);
//    }
//    protected function setContentsListAsArray($Content)
//    {
//        $this->contentsListArray[] = $Content;
//    }
//    protected $contentsListArray = array();
//    protected function setContentsListAsString($Content)
//    {
//        $text  = $this->fetchText($Content['text']);
//        $id    = $Content['id'];
//        $level = (integer) trim($Content['level'], 'h');
//        $link  = "[${text}](#${id})";
//        if ($this->firstHeadLevel === 0) {
//            $this->firstHeadLevel = $level;
//        }
//        $cutIndent = $this->firstHeadLevel - 1;
//        if ($cutIndent > $level) {
//            $level = 1;
//        } else {
//            $level = $level - $cutIndent;
//        }
//        $indent = str_repeat('  ', $level);
//        $this->contentsListString .= "${indent}- ${link}\n";
//    }
//    protected $contentsListString = '';
//    protected $firstHeadLevel = 0;
    #
    # Header
    #
    protected function blockHeader($Line)
    {
        $headers = parent::blockHeader($Line);
        dump($headers);
//        if (isset($Line['text'][1])) {
//            $Block = parent::blockHeader($Line);
//            $text  = $Block['element']['handler']['argument'];
//            $level = $Block['element']['name'];    //h1,h2..h6
//            $id    = $this->createAnchorID($text);
//            //Set attributes to head tags
//            $Block['element']['attributes'] = [
//                'id'   => $id,
//                'name' => $id,
//            ];
//            $this->setContentsList([
//                'text'  => $text,
//                'id'    => $id,
//                'level' => $level
//            ]);
//            return $Block;
//        }
    }
}
