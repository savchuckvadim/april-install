<?php

declare(strict_types=1);

use App\Services\BxAuthService;


require_once __DIR__ . '/../../vendor/autoload.php';

$B24 = BxAuthService::getBitrix();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/app.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <title>B24PhpSDK local-app demo</title>
</head>

<body class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 text-small">
            <h2>Request and profile data</h2>
            <p>Application is working with auth tokens from Bitrix24:</p>
            <pre>
    <?php
    print_r($_REQUEST);
    ?>    
</pre>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h2>Deals</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <?php
                $deals = $B24;

                foreach ($deals as $deal) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $deal->ID; ?></th>
                        <td><?php echo $deal->TITLE; ?></td>
                        <td><?php echo $deal->OPPORTUNITY; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
    </div>
    <script src="//api.bitrix24.com/api/v1/"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            BX24.init(function() {
                console.log('bx24.js initialized', BX24.isAdmin());
            });
        });
    </script>
</body>

</html>