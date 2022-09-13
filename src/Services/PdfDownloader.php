<?php

declare(strict_types=1);

namespace Snnick\LaravelFileDownloader\Services;

use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade;
use Snnick\LaravelFileDownloader\Contracts\FileDownloaderContract;

class PdfDownloader extends Downloader implements FileDownloaderContract
{
    public function download(): string
    {
        $filename = !empty($this->entity) ?
            $this->entity . '-' . date('Y-m-d_h-i-s') . '.pdf' :
            date('Y-m-d_h-i-s') . '.pdf';

        $filepath = $this->getFilepath($filename);

        $pdf = Facade::loadView($this->view, $this->data);
        $resource = $pdf->download($filename);

        Storage::disk(config('filesystems.default'))->put(
            $filepath,
            $resource
        );

        return $filepath;
    }
}
