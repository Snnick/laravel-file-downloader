## Installation

Run the following command to install the latest applicable version of the package:

```sh
composer require snnick/laravel-file-downloader
```

After installation, you can publish the package configuration using the `vendor:publish` command. This command will publish the `file-downloader.php` configuration file to your config directory:

```sh
php artisan vendor:publish --provider="Snnick\LaravelFileDownloader\LaravelFileDownloaderServiceProvider"
```

You may configure the file path in your `.env` file:

```sh
FILE_DOWNLOAD_PATH=app/public/files
```

### Download

You can download files:

```php
$strategy = new PdfDownloader(
            'pdf.invoices',
            'invoices',
            ['calculations' => new CalculationsDTO($calculations)]
        );
$service = new FileDownloaderService($strategy);
$filepath = $service->download();
```