<?php

declare(strict_types=1);

namespace Snnick\LaravelFileDownloader\Services;

use Snnick\LaravelFileDownloader\Contracts\FileDownloaderContract;

class FileDownloaderService
{
    private FileDownloaderContract $strategy;

    public function __construct(FileDownloaderContract $strategy)
    {
        $this->strategy = $strategy;
    }

    public function download(): string
    {
        return $this->strategy->download();
    }
}
