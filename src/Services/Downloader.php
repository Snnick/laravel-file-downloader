<?php

declare(strict_types=1);

namespace Snnick\LaravelFileDownloader\Services;

class Downloader
{
    public function __construct(
        public string $view,
        public string $entity = '',
        public array  $data = [],
    ) {
    }

    protected function getFilepath($filename): string
    {
        if (!empty($this->entity)) {
            return sprintf(
                "{$this->entity}/%s/%s/%s",
                date('Y'),
                date('m'),
                $filename
            );
        }

        return config('file-downloader.file-download-path') . '/' . $filename;
    }
}
