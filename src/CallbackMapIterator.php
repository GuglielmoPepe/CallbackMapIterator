<?php 

declare(strict_types = 1);

namespace CallbackMapIterator;

class CallbackMapIterator extends \IteratorIterator implements \OuterIterator
{
    private $callback;

    public function __construct(\Iterator $iterator, callable $callback)
    {
        $this->callback = $callback;
        parent::__construct($iterator);
    }

    public function current()
    {
        return call_user_func(
            $this->callback,
            parent::current(),
            parent::key(),
            $this->getInnerIterator()
        );
    }
}

