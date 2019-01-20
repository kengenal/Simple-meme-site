<?php

namespace App\Http\Services\Memes;

class NineGag
{
	private $id_meme;
	private $memUrl;
	private $url;
	private $title;
	private $type;
	private $errors;
	private $format;

	public function setVariable($urlArray, $url)
	{
		$this->id_meme = explode("/",$urlArray['path'])[2];
		$this->url = $url;
		$gif = '_460svvp9.webm';
		$image = '_700b.jpg';
		$urlImg =  "https://img-9gag-fun.9cache.com/photo/{$this->id_meme}_700b.jpg";
		$urlGif =  "https://img-9gag-fun.9cache.com/photo/{$this->id_meme}_460svvp9.webm";
		$file_gif = @get_headers($urlGif);
		$image = @get_headers($urlImg);
		if ((!$file_gif || $file_gif[0] == 'HTTP/1.1 404 Not Found'))
		{
			$this->memUrl = $urlImg;
			$this->type = 'img';
			$this->format = 'jpg';
		}
		elseif (($file_gif || $file_gif[0] != 'HTTP/1.1 404 Not Found'))
		{
			$this->memUrl = $urlGif;
			$this->type = 'gif';
			$this->format = 'webm';
		}
		else
		{
			$this->errors = true;
		}
	}

	public function nineParse()
	{
		if (!$this->errors)
		{
			$memeCotext = file_get_contents($this->url);
			$dom = new \DOMDocument();
			@$dom->loadHTML($memeCotext);
			$this->title = explode(' - ',$dom->getElementsByTagName('title')[0]->textContent)[0];
		}
	
	}

	public function getMeme()
	{
		$meme = [
			"title"  => $this->title,
			"url" 	 => $this->memUrl,
			"type"   => $this->type,
			"errors" => $this->errors,
			"format" => $this->format,
		];
		return $meme;
	}
}