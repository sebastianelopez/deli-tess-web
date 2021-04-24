<?php

require_once('id_trait.php');
require_once('commentary.php');

    class CommentCollection implements \ArrayAccess, \IteratorAggregate
{

    private $comments;

    /**
     * @var Comment[]
     */

    public function __construct(array $comments){
        $this->comments = $comments;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->comments);
    }

    public function offsetGet($offset)
    {
        return $this->comments[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->comments[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->comments[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->comments);
    }
}
 

