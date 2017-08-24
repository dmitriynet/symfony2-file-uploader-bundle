<?php

namespace PunkAve\FileUploaderBundle\Twig;

use Symfony\Component\DependencyInjection\Container;
use Twig_Extension;

class FileExtension extends Twig_Extension
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	/**
	 * @return array
	 */
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('punkave_get_files', [
				$this,
				'getFiles'
			]),
		];
	}

	public function getFiles($folder)
	{
		return $this->container->get('punk_ave.file_uploader')->getFiles(['folder' => $folder]);
	}
}
