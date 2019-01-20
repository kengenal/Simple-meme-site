<?php

namespace App\Http\Services\Memes;

class Reddit
{
	private $url;
	private $json_api;
	private $urlMeme;
	private $title;
	private $format;

	public function setVariable($url)
	{
		$this->url = $url;
		$this->json_api = $url.'name.json';
	}

	public function setMeme()
	{
		$json = file_get_contents($this->json_api);
		$obj = json_decode($json, true);
		$small_array = $obj[0]['data']['children'][0]['data'];
		$this->urlMeme = $small_array['url'];
		$formatArr = explode('.', $this->urlMeme);
		$this->format = end($formatArr);
		$this->title = $small_array['title'];
	}
	public function getMeme()
	{
		$meme = [
			'title' => $this->title,
			'url' 	=> $this->urlMeme,
			'type'  => 'img',
			'errors'=> false,
			'format' => $this->format,
		];

		return $meme;
	}
}