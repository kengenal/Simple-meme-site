<?php

namespace App\Http\Services;

use App\Http\Services\Memes\NineGag;
use App\Http\Services\Memes\Reddit;

class Meme 
{
	private $host;
	private $urlArray;
	private $url;
	private $memes;
	private $errors;

	public function getUrl($url)
	{
		$result = parse_url($url);
		$this->urlArray = $result;
		if (isset($result['host']))
		{
			$this->host = $result['host'];
			$this->url = $url;
		}
		else
		{
			$this->errors = true;
			return 0;
		}
	}
	public function getMeme()
	{
		switch ($this->host) {
			case '9gag.com':
				$gag = new NineGag();
				$gag->setVariable($this->urlArray, $this->url);
				$gag->nineParse();
				$this->memes = $gag->getMeme($this->url);
				break;
			
			case 'www.reddit.com':
				$reddit = new Reddit();
				$reddit->setVariable($this->url);
				$reddit->setMeme();
				$this->memes = $reddit->getMeme();
				break;
		}
		return $this->memes;
	}
	public function download($filesystem, $name)
	{
		try 
		{
			$url = $this->memes['url'];
			$arr = explode('.', $url);
			$type = end($arr);
			$img = "{$filesystem}/{$name}.{$type}";
			file_put_contents($img, file_get_contents($url));
		}
		catch(Exception $e)
		{
			$this->errors = true;
		}
		return $this->errors;
	}
}
