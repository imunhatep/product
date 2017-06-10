<?php
namespace Product\Response;

class Response
{
    private $status;
    private $content;
    private $contentType;

    function __construct(string $content, int $status = 200)
    {
        $this->status = $status;
        $this->content = $content;
        $this->contentType = 'text/html';
    }

    function __toString()
    {
        header(sprintf("HTTP/1.1 %d Ok", $this->status));
        header('Content-Type: '. $this->contentType = 'text/html');

        return $this->content;
    }
}
