# Cloud Storage Setup

## DropBox
    - Install Dropbox driver
    ```php
        // from https://github.com/benjamincrozat/laravel-dropbox-driver
        composer require benjamincrozat/laravel-dropbox-driver
    ```
    
    - Create account on dropbox

    - Create an app and get a token
    ```
        https://www.dropbox.com/developers/apps
    ```

    - Save token in .env 
    ```php
        DROPBOX_TOKEN=your_token_here
    ```

    - config/app.php -> providers
    ```php
        // Dropbox provider
        BC\Laravel\DropboxDriver\ServiceProvider::class,
    ```

    - config/filesystem.php -> disks
    ```php
        'dropbox' => [
            'driver' => 'dropbox',
            'token' => env('DROPBOX_TOKEN'),
        ],
    ```

## Google Drive Integertion

    - create a service provider
    ```php
        php artisam make:provider GoogleDriveServiceProvider

        // add this in config/app.php ->providers
        App\Providers\GoogleDriveServiceProvider::class,
    ```

    - Install packages
    ```php
        https://github.com/googleapis/google-api-php-client
        composer require google/apiclient

        https://github.com/nao-pon/flysystem-google-drive
        composer require nao-pon/flysystem-google-drive:~1.1
    ```

    - File System and env settings
    ```php
        'google' => [
        'driver' => 'google',
        'clientId' => env('GOOGLE_CLIENT_ID'),
        'clientSecret' => env('GOOGLE_CLIENT_SECRET'),
        'refreshToken' => env('GOOGLE_REFRESH_TOKEN'),
        'folderId' => env('GOOGLE_DRIVE_FOLDER_ID'),
        ],
    ```

    - Setup google app
    ```php
        https://console.developers.google.com
        
    ```