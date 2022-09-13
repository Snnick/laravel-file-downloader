<?php

declare(strict_types=1);

namespace Snnick\LaravelFileDownloader\Contracts;

interface FileDownloaderContract
{
    public function download(): string;
}
